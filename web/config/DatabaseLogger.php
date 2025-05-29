<?php

namespace App\Logging;

use App\Models\Log;
use Monolog\Logger;

class DatabaseLogger
{
    /**
     * Cria uma instância do logger personalizado.
     *
     * @param  array  $config
     * @return \Monolog\Logger
     */
    public function __invoke(array $config)
    {
        $handler = new DatabaseHandler();
        return new Logger('database', [$handler]);
    }
}
