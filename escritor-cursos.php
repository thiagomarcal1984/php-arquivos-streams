<?php

$arquivo = fopen('cursos-php.txt', 'w');

$curso = "Design Patterns PHP I: Boas práticas de programação";

// A função fwrite escreve em um arquivo o conteúdo do segundo parâmetro.
fwrite($arquivo, $curso);
// fwrite($arquivo, $curso, 10); // Escreve só 10 caracteres.

fclose($arquivo);
