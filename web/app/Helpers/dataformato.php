<?php
/*
function formatDateTime($datetimeString, $format = 'Y-m-d H:i:s') {
    // Tenta criar um objeto DateTime a partir da string
    $datetime = DateTime::createFromFormat('Y-m-d H:i:s', $datetimeString);

    // Verifica se a criação do objeto foi bem-sucedida
    if (!$datetime) {
        throw new Exception('Formato de data/hora inválido');
    }

    // Formata a data e hora de acordo com o formato especificado
    return $datetime->format($format);
}
*/
if (! file_exists('dateFormatDatabaseScreen')) {
    function dateFormatDatabaseScreen($param, $formato)
    {
        if ($formato == "screen") {
            $data = substr($param, 8, 2) . '/' . substr($param, 5, 2) . '/' . substr($param, 0, 4);
            $hora = substr($param, 11, 8);
        } else {
            $data = substr($param, 0, 4) . '-' . substr($param, 5, 2) . '-' . substr($param, 8, 2);
        }

        $hora = substr($param, 11, 8);
        return trim($data . " " . $hora);
    }
}
