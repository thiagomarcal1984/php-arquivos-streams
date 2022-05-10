<?php

// echo file_get_contents("zip://arquivos.zip#lista-cursos.txt");

$protocolo = "zip";
$arquivo = "arquivos.zip";
$subarquivo = "lista-cursos.txt";
echo file_get_contents("$protocolo://$arquivo#$subarquivo");

// É possível escrever um arquivo ftp usando file_put_contents!
// file_put_contents("ftp://servidor.com", "Conteúdo do arquivo.");