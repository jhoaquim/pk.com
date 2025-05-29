<?php

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
