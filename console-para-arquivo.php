<?php

// Conceitos de streams: https://dias.dev/2020-11-03-wraper-de-streams-php/

// O fopen abaixo abre um console para input, leitura.
// O modo do arquivo sempre será r, independente do parâmetro fornecido.
// $teclado = fopen('php://stdin', 'r'); 
// $novoCurso = trim(fgets($teclado)); 
// A função trim vai tirar as quebras de linha.
// A função fgets faz a leitura do "arquivo" $teclado.

// A seguir uma outra forma de obter entrada do teclado:
$novoCurso = trim(fgets(STDIN)); 
// STDIN na verdade substitui a declaração fopen('php://stdin', 'r').

file_put_contents('cursos-php.txt', "\n$novoCurso", FILE_APPEND);
 