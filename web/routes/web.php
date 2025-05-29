<?php

use Illuminate\Support\Facades\Route;

Route::get('/config', function () {
    return response()->json([
        'APP_NAME' => env('APP_NAME'),
        'APP_URL' => env('APP_URL'),
        'APP_TIMEZONE' => env('APP_TIMEZONE'),
        // ... outras constantes
    ]);
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('construcao', function () {
    return view('construcao');
})->name('construir');

Route::get('site', function () {
    return view('site/quemsomos');
})->name('site');

Route::get('estatuto', function () {
    return view('estatuto');
})->name('estatuto');

Route::get('apoio', function () {
    return view('apoio');
})->name('apoio');

Route::group(['prefix' => 'dashboard'], function () {
    Route::get('construcao', function () {return view('construcao');
    Route::get('construcao/btqrcode', [App\Http\Controllers\editor\QrcodeController::class, 'generateQrCode'])->name('btqrcode');

    });
});

Route::group(['prefix' => 'dashboard'], function () {
    Route::get('ops', function () {
        return view('ops');
    })->name('ops');
});


Route::group(['prefix' => 'site'], function () {
    Route::any('quemsomos', [App\Http\Controllers\site\SiteController::class, 'quemsomos']);
    Route::get('curriculum/{param?}', [App\Http\Controllers\site\SiteController::class, 'curriculum']);

    Route::get("curriculum/eddie/construcao", function () {
        return redirect()->route("construir");
    });
    Route::get("modal/{param?}", function ($param = 'default') {
        return view('construcao', compact('param'));
    });
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('dashboard/textos', [App\Http\Controllers\editor\EditorController::class, 'textoslistagem'])->name('listar.textos');
    Route::get('dashboard/textos/pesquisar', [App\Http\Controllers\editor\EditorController::class, 'textoslistagem'])->name('pesquisar.textos');
});

Route::group(['prefix' => 'dashboard/textos'], function () {
    Route::get('/editorModal/{id?}', [App\Http\Controllers\editor\EditorController::class ,'carregatexto']);
    Route::get('/editorModal/{id?}/pessoas', [App\Http\Controllers\Pessoas\PessoasController::class ,'searchpessoas']);
    Route::get('/editorModal/{id?}/cadastros/pessoas/selecionapessoa/{pess?}', [App\Http\Controllers\Pessoas\PessoasController::class ,'selecionapessoa']);
    Route::get('/editorModal/atualizatexto/{id?}', [App\Http\Controllers\editor\EditorController::class ,'atualizatexto']);

})->name('textos');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    //Route::get('estados', [App\Http\Controllers\Pessoas\EstadosController::class ,'index']);
})->name('estados');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    //Route::get('municipios', [App\Http\Controllers\Pessoas\MunicipiosController::class ,'index']);
})->name('municipios');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('dashboard/cadastros', [App\Http\Controllers\Pessoas\PessoasController::class ,'listar'])->name('pessoas.listar');
    Route::get('dashboard/cadastros/requerentes', [App\Http\Controllers\Pessoas\PessoasController::class ,'requerentes'])->name('pessoas.requerentes');
    Route::get('dashboard/cadastros/requerentes/{id?}', [App\Http\Controllers\Pessoas\PessoasController::class ,'requerente']);
    Route::get('dashboard/cadastros/pessoas/adicionar}', [App\Http\Controllers\Pessoas\PessoasController::class ,'create'])->name("pessoas.adicionar");
    Route::post('dashboard/cadastros/pessoas/gravar', [App\Http\Controllers\Pessoas\PessoasController::class ,'store'])->name("pessoas.gravar");
    Route::get('dashboard/cadastros/pessoas/mostrar/{id?}', [App\Http\Controllers\Pessoas\PessoasController::class ,'show'])->name("pessoas.mostrar");
    Route::get('dashboard/cadastros/pessoas/editar/{id?}', [App\Http\Controllers\Pessoas\PessoasController::class ,'edit']);
    Route::get('dashboard/cadastros/pessoas/editar/{id?}/estados', [App\Http\Controllers\estados\EstadosController::class ,'estados'])->name('estados');
    Route::get('dashboard/cadastros/pessoas/editar/{id?}/municipios', [App\Http\Controllers\estados\EstadosController::class ,'municipios'])->name('municipios');
    Route::put('dashboard/cadastros/pessoas/atualizar/{id?}', [App\Http\Controllers\Pessoas\PessoasController::class ,'update'])->name("pessoas.atualizar");
    Route::get('dashboard/cadastros/pessoas/apagar', [App\Http\Controllers\Pessoas\PessoasController::class ,'destroy']);
    Route::get('dashboard/cadastros/pessoas/pesquisar', [App\Http\Controllers\Pessoas\PessoasController::class ,'pesquisar'])->name('pessoas.pesquisar');
    Route::get('dashboard/cadastros/pessoas/mensagem/{var?}', [App\Http\Controllers\Pessoas\PessoasController::class ,'mensagem'])->name('mensagem');
    Route::get('dashboard/cadastros/processos/mostrar/{id?}', [App\Http\Controllers\Processos\ProcessosController::class ,'show'])->name("processos.mostrar");
    Route::get('dashboard/cadastros/processos/adicionar', [App\Http\Controllers\Pessoas\PessoasController::class ,'create'])->name("processos.adicionar");
    Route::get('dashboard/cadastros/pessoas/qrcode/{id?}', [App\Http\Controllers\Pessoas\PessoasController::class ,'gerarQRCode'])->name("pessoas.qrcode");
    Route::get('dashboard/cadastros/requerentes/{id?}/selecionarequerente', [App\Http\Controllers\Pessoas\PessoasController::class ,'selecionaRequerente'])->name('requerente.seleciona');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('dashboard/processos', [App\Http\Controllers\processos\ProcessosController::class, 'listar'])->name('processos');
    Route::get('dashboard/processos/pessoa', [App\Http\Controllers\Pessoas\PessoasController::class ,'listar'])->name('processos.pessoa');
    Route::get('dashboard/processos/geraraudio', [App\Http\Controllers\audios\AudiosController::class, 'gerarAudio'])->name('audio');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('dashboard/fincontri', [App\Http\Controllers\financas\PlanocontasController::class, 'menuFinConTri'])->name('menuFinConTri');
    Route::get('dashboard/financas', [App\Http\Controllers\financas\PlanocontasController::class, 'listaFinancas'])->name('financas');
});


Route::get('municipios', [App\Http\Controllers\estados\EstadosController::class, 'municipios'])->name('municipios');

Route::get('site/pdfler/{param?}', [App\Http\Controllers\pdfs\PdfsController::class, 'pdfler'])->name('pdfler');
Route::get('gerapdf/{param?}', [App\Http\Controllers\pdfs\PdfsController::class, 'gerapdf'])->name('gerapdf');
