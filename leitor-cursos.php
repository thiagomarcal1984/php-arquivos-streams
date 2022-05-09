<?php

$arquivo = fopen('lista-cursos.txt', 'r');

// A função feof testa se cursor está no fim do arquivo.
while (!feof($arquivo)) { 
    // A função fgets lê até o final da linha do arquivo. Linha a linha.
    $curso = fgets($arquivo); 
    // $curso = fgets($arquivo, 3); // É possível fazer a leitura de 3 em 3 caracteres, por exemplo.
    echo $curso;
}

fclose($arquivo); // Fecha o arquivo, liberando-o para uso por outros programas.
