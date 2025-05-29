<?php

namespace App\Http\Controllers\puppeteer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Nesk\Puphpeteer\Puppeteer;

class PuppeteerController extends Controller
{
    public function screenshot()
    {
        $puppeteer = new Puppeteer;
        $browser = $puppeteer->launch();
        $page = $browser->newPage();
        $page->goto('https://example.com');
        $page->screenshot(['path' => public_path('imgs/dados.recebidos/example.png')]);
        $browser->close();

        return response()->file(public_path('imgs/dados.recebidos/example.png'));
    }
}
