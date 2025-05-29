<?php

namespace App\Logging;

use Monolog\Handler\AbstractProcessingHandler;
use Monolog\LogRecord; // Importa a classe LogRecord
use App\Models\Log;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\DB; // Importe a Facade DB


class DatabaseHandler extends AbstractProcessingHandler
{
    /**
     * Escreve o registro formatado no banco de dados.
     *
     * @param  array  $record
     * @return void

    * protected function write(array $record): void
    */

    protected function write(LogRecord $record): void
    {
            Log::create([
                'level' => $record['level_name'],
                'message' => $record['message'],
                'context' => $record['context'],
                'channel' => $record['channel'],
                'datetime' => $record['datetime'],
                'ip_address' => DB::raw("INET_ATON('" . Request::ip() . "')"), // Usando DB::raw()
            ]);
    }

}
