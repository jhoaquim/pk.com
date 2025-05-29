<?php

namespace App\Services;

use Illuminate\Support\Facades\File;

class ClientDocumentService
{
    public function __construct()
    {
        if (File::exists(storage_path('app/configuracao.json'))) {
            // Carregar configuração do arquivo
        }
    }

    /**
     * Formata um CPF removendo caracteres não numéricos e aplicando a máscara.
     *
     * @param string|null $cpf
     * @return string|null
     */
    public function formatCpf(?string $cpf): ?string
    {
        if (!$cpf) {
            return null;
        }

        $cpf = preg_replace('/\D/', '', $cpf);
        if (strlen($cpf) !== 11) {
            return $cpf; // Retorna sem máscara se não tiver 11 dígitos
        }

        return preg_replace('/(\d{3})(\d{3})(\d{3})(\d{2})/', '$1.$2.$3-$4', $cpf);
    }

    /**
     * Valida um CPF.
     *
     * @param string|null $cpf
     * @return bool
     */
    public function validateCpf(?string $cpf): bool
    {
        if (!$cpf) {
            return false;
        }

        $cpf = preg_replace('/\D/', '', $cpf);
        if (strlen($cpf) !== 11 || preg_match('/^(\d)\1+$/', $cpf)) {
            return false;
        }

        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf[$c] * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf[$c] != $d) {
                return false;
            }
        }

        return true;
    }

    /**
     * Formata um CNPJ removendo caracteres não numéricos e aplicando a máscara.
     *
     * @param string|null $cnpj
     * @return string|null
     */
    public function formatCnpj(?string $cnpj): ?string
    {
        if (!$cnpj) {
            return null;
        }

        $cnpj = preg_replace('/\D/', '', $cnpj);
        if (strlen($cnpj) !== 14) {
            return $cnpj; // Retorna sem máscara se não tiver 14 dígitos
        }

        return preg_replace('/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/', '$1.$2.$3/$4-$5', $cnpj);
    }

    /**
     * Valida um CNPJ.
     *
     * @param string|null $cnpj
     * @return bool
     */
    public function validateCnpj(?string $cnpj): bool
    {
        if (!$cnpj) {
            return false;
        }

        $cnpj = preg_replace('/\D/', '', $cnpj);
        if (strlen($cnpj) !== 14 || preg_match('/^(\d)\1+$/', $cnpj)) {
            return false;
        }

        $b = [6, 5, 4, 3, 2, 9, 8, 7, 6, 5, 4, 3, 2];
        for ($i = 0, $n = 0; $i < 12; $n += $cnpj[$i] * $b[++$i]);
        if (($cnpj[12] != (((($n %= 11) < 2) ? 0 : (11 - $n))))) {
            return false;
        }
        for ($i = 0, $n = 0; $i <= 12; $n += $cnpj[$i] * $b[$i]);
        if (($cnpj[13] != (((($n %= 11) < 2) ? 0 : (11 - $n))))) {
            return false;
        }

        return true;
    }
}
