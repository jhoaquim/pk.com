<?php

namespace App\Helpers;

class DadosPessoais
{
    public static function maskCpfCnpj($doc)
    {
        $doc = preg_replace('/\D/', '', $doc);

        if (strlen($doc) === 11) {
            // CPF
            return substr($doc, 0, 3) . '.***.***-' . substr($doc, -2);
        } elseif (strlen($doc) === 14) {
            // CNPJ
            return substr($doc, 0, 2) . '.***.***/****-' . substr($doc, -2);
        } else {
            return 'Documento inválido';
        }
    }
    public static function maskRg($rg)
    {
        $rg = preg_replace('/\D/', '', $rg);

        if (strlen($rg) < 7) {
            return 'Documento inválido';
        }

        return substr($rg, 0, 2) . '.***.***-' . substr($rg, -1);
    }

    public static function maskNis($nis)
    {
        $nis = preg_replace('/\D/', '', $nis);

        if (strlen($nis) !== 11) {
            return 'NIS inválido';
        }

        return substr($nis, 0, 2) . '.***.***-' . substr($nis, -2);
    }

}
