<?php

if (! file_exists('validaCPF')) {
    function validaCPF($cpf) {
        // Remove qualquer caractere não numérico
        $cpf = preg_replace('/[^0-9]/', '', $cpf);

        // Verifica se possui 11 dígitos
        if (strlen($cpf) != 11) {
            return false;
        }

        // Verifica se não possui todos os dígitos iguais
        if (preg_match('/([0-9])\\1{10}/', $cpf)) {
            return false;
        }

        // Realiza a validação matemática
        $sum = 0;
        for ($i = 0; $i < 9; $i++) {
            $sum += intval($cpf[$i]) * (10 - $i);
        }
        $remainder = $sum % 11;
        $digit1 = ($remainder < 2) ? 0 : 11 - $remainder;

        if ($cpf[9] != $digit1) {
            return false;
        }

        $sum = 0;
        for ($i = 0; $i < 10; $i++) {
            $sum += intval($cpf[$i]) * (11 - $i);
        }
        $remainder = $sum % 11;
        $digit2 = ($remainder < 2) ? 0 : 11 - $remainder;

        return $cpf[10] == $digit2;
    }

}
