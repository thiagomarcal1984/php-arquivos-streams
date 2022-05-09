<?php

$curso = "Design Patterns PHP I: Boas práticas de programação";

// A função file_put_contents abstrai a escrita em arquivos.
// O primeiro parâmetro é o nome do arquivo.
// O segundo parâmetro é o conteúdo para ser escrito.
// O terceiro parâmetro é uma flag para o modo de arquivos.
file_put_contents('cursos-php.txt', "Conteúdo do arquivo.");

// Esta segunda gravação apaga o conteúdo original do arquivo.
file_put_contents('cursos-php.txt', $curso); 

$curso = "\nDesign Patterns PHP II: Boas práticas de programação";

// Repare no terceiro parâmetro, a flag do tipo int FILE_APPEND.
// Você pode "somar" flags usando o operador binário pipe (|).
//    FILE_APPEND: Constante para inserir conteúdo a partir do fim do arquivo.
//    FILE_TEXT: Constante para inserir conteúdo do tipo texto no arquivo. 
//               FILE_TEXT é uma flag obsoleta no PHP 8.
// Outras flags: https://www.php.net/manual/pt_BR/function.file-put-contents.php
file_put_contents('cursos-php.txt', $curso, FILE_APPEND | FILE_TEXT); 
