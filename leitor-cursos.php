<?php

$arquivo = fopen('lista-cursos.txt', 'r');

// A função filesize retorna o número de bytes do arquivo.
$tamanhoDoArquivo = filesize('lista-cursos.txt'); 

// A função fread lê um arquivo até um certo número de bytes.
$cursos = fread($arquivo, $tamanhoDoArquivo);
echo $cursos;

fclose($arquivo); // Fecha o arquivo, liberando-o para uso por outros programas.
