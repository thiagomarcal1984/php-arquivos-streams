<?php

// A função file_get_contents lê todo um arquivo e retorna o seu conteúdo.
// Note que não é necessário informar o modo de abrir e fechar o arquivo.
$cursos = file_get_contents('lista-cursos.txt');

// É possível obter um array de linhas do arquivo, com a função file:
$cursos = file('lista-cursos.txt');

var_dump($cursos);