<?php

$arquivo = fopen('cursos-php.txt', 'w');

$curso = "Design Patterns PHP I: Boas práticas de programação";

// A função fwrite escreve em um arquivo o conteúdo do segundo parâmetro.
fwrite($arquivo, $curso);
// fwrite($arquivo, $curso, 10); // Escreve só 10 caracteres.

fclose($arquivo);

// Os modos de abertura de arquivo influenciam no posicionamento do cursor 
// para escrever o conteúdo dos arquivos.

// O modo w significa "write" e posiciona o cursor no início do arquivo. Apaga arquivo original.
// O modo r significa "read" e posiciona o cursor no início do arquivo.
// O modo a significa "append" e posiciona o cursor no final do arquivo.
// O modo x posiciona o cursor no final do arquivo. Vai falhar se o arquivo já existe.
// Acrescentando o sinal de + aumenta a permissão para leitura e escrita.
$arquivo = fopen('cursos-php.txt', 'a');

$curso = "\nDesign Patterns PHP II: Boas práticas de programação";

fwrite($arquivo, $curso);

fclose($arquivo);
