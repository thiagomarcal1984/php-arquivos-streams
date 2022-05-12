<?php

$msg = "Olá, mundo!" . PHP_EOL;

echo "echo: " . $msg;
print "print: " . $msg;
$tela = fopen('php://stdout', 'w');
fwrite($tela, "fopen + stdout + fwrite: " . $msg);
fwrite(STDOUT, "STDOUT + fwrite: " . $msg);

print PHP_EOL . "Imprimindo na saída de erro:" . PHP_EOL;
$tela = fopen('php://stderr', 'w');
fwrite($tela, "fopen + stderr + fwrite: " . $msg);
fwrite(STDERR, "STDERR + fwrite: " . $msg);

fwrite(STDOUT, PHP_EOL . "Escrevendo na tela a partir de arquivos.zip/cursos-php.txt: " . PHP_EOL);

$cursos = fopen('zip://arquivos.zip#cursos-php.txt', 'r');
// Lê o conteúdo de dentro do zip, e exibe na saída padrão.
stream_copy_to_stream($cursos, STDOUT); 
