<?php

namespace App\Http\Controllers\Audios;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\Process\Process as SymfonyProcess;

class AudiosController extends Controller
{
    public function gerarAudio()
    {
        // Caminho completo até o script Python
        $caminhoScript = public_path('audios/gerar_processo.py');

        // Gera um nome de arquivo único para o áudio
        $nomeArquivoAudio = 'audio_' . uniqid() . '.mp3';

        // Caminho completo onde o áudio será salvo pelo script Python
        $diretorioDestinoAudio = public_path('audios/processos');

        // Monta o comando para executar o script Python
        $comando = [
            'python',
            $caminhoScript,
            $nomeArquivoAudio,
            $diretorioDestinoAudio
        ];

        try {
            // Cria o processo
            $process = new SymfonyProcess($comando);

            // EXECUTA o processo → ESSENCIAL!!!
            $process->run();

            if ($process->isSuccessful()) {
                $output = $process->getOutput();
                return response()->json([
                    'message' => 'Áudio gerado com sucesso!',
                    'output' => $output,
                    'file' => asset('audios/processos/' . $nomeArquivoAudio),
                    'command_executed' => implode(' ', $comando) // Para debug
                ]);
            } else {
                $errorOutput = $process->getErrorOutput();
                return response()->json([
                    'message' => 'Erro ao gerar áudio!',
                    'error' => $errorOutput,
                    'command_executed' => implode(' ', $comando)
                ], 500);
            }
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Exceção ao executar comando!',
                'error' => $e->getMessage(),
                'command_executed' => implode(' ', $comando) // Para debug
            ], 500);
        }
    }
}
