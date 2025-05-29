<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\EnderecosController;
use App\Http\Controllers\Api\PessoasController;
use App\Jobs\ResolveWhatsappRequest;

Route::get('/', function (Request $request) {
    return response()->json([
        'retorno' => true
    ]);
});//->middleware('auth:sanctum');

Route::get('enderecos', [EnderecosController::class,'index']);
Route::get('enderecos/{id}', [EnderecosController::class,'show']);
Route::post('enderecos', [EnderecosController::class,'store']);
Route::patch('enderecos/{id}', [EnderecosController::class,'update']);
Route::delete('enderecos/{id}', [EnderecosController::class,'destroy']);

Route::post('webhook', function (Request $request) {
    dispatch(new ResolveWhatsappRequest($request->all()));
    return response()->noContent();
});//->middleware('auth:sanctum');

Route::apiResource('pessoas', PessoasController::class);
//Route::apiResource('enderecos', [App\Http\Controllers\api\EnderecosController::class ,'index']);
