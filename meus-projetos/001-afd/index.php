<?php

/**
 * Simulador de um Autômato Finito Determinístico
 * 
 * M = (Alfabeto, Conjunto de Estados, Tabela de Transições, Estado Inicial e Estados Finais)
 * 
 * Essa função determina para um autômato informado através da sua quíntipla se uma palavra 
 * especificada é válida ou não
 */
function afd(
    array $alfabeto,
    array $estados,
    array $transicoes,
    string $inicial,
    array $finais,
    string $palavra
) {
    $atual = $inicial;

    for ($i = 0; $i < strlen($palavra); $i++) {        

        $simbolo = $palavra[$i];

        if (!in_array($simbolo, $alfabeto)) return false;

        $chave = $atual . '-' . $simbolo;

        if (array_key_exists($chave, $transicoes)) {
            $atual = $transicoes[$atual . '-' . $simbolo];
        } else {
            return false;
        }
    }
    return in_array($atual, $finais) ? true : false;
}

var_dump(
    afd(
        ['0', '1'],

        ['q0', 'q1'],

        [
            'q0-0' => 'q0',
            'q0-1' => 'q1',
        ],

        'q0',

        ['q1'],

        '00001'
    )
);
