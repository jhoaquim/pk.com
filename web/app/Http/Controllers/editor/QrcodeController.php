<?php

namespace App\Http\Controllers\editor;

use App\Http\Controllers\Controller;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelHigh;
use Endroid\QrCode\Label\Alignment\LabelAlignmentCenter;
use Endroid\QrCode\Label\Font\NotoSans;
use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeMargin;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class QrcodeController extends Controller
{
    public function generateQrCode()
    {
        $qrCode = new QrCode(
            'https://www.example.com',
            new Encoding('UTF-8'),
            new ErrorCorrectionLevelHigh() // Define o nível de correção no construtor
        );
        $qrCode->setSize(300)
            ->setMargin(10)
            ->setForegroundColor(['r' => 0, 'g' => 0, 'b' => 0, 'a' => 0])
            ->setBackgroundColor(['r' => 255, 'g' => 255, 'b' => 255, 'a' => 0])
            ->setLabel('Visite Example', new NotoSans(16), new LabelAlignmentCenter())
            ->setRoundBlockSizeMode(new RoundBlockSizeModeMargin());
            // ->setLogoPath(public_path('images/laravel_logo.png')) // Opcional: Adicionar logo
            // ->setLogoResizeToWidth(50)
            // ->setLogoResizeToHeight(50);

        $writer = new PngWriter();
        $result = $writer->write($qrCode);

        $name = 'qrcode.png';
        $path = 'qrcodes/' . $name;
        Storage::disk('public')->put($path, $result->getString());

        return view('qrcode', ['qrCodePath' => asset('storage/' . $path)]);
    }

    public function generateQrCodeInline(): Response
    {
        $qrCode = new QrCode(
            'Texto para o QR Code',
            new Encoding('UTF-8'),
            new ErrorCorrectionLevelHigh() // Define o nível de correção no construtor
        );
        $qrCode->setSize(200)
            ->setMargin(5)
            ->setForegroundColor(['r' => 0, 'g' => 0, 'b' => 0, 'a' => 0])
            ->setBackgroundColor(['r' => 255, 'g' => 255, 'b' => 255, 'a' => 0]);

        $writer = new PngWriter();
        $result = $writer->write($qrCode);

        return new Response($result->getString(), 200, ['Content-Type' => $result->getMimeType()]);
    }
}
