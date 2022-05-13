<?php

// echo file_get_contents("zip://arquivos.zip#lista-cursos.txt");

$protocolo = "zip";
$arquivo = "arquivos.zip";
$subarquivo = "lista-cursos.txt";
echo file_get_contents("$protocolo://$arquivo#$subarquivo");

// É possível escrever um arquivo ftp usando file_put_contents!
// file_put_contents("ftp://servidor.com", "Conteúdo do arquivo.");


echo PHP_EOL . PHP_EOL . "Lendo arquivos .zip com senha: " . PHP_EOL;
$protocolo = "zip";
$arquivo = "arquivos-com-senha.zip";
$subarquivo = "lista-cursos.txt";
$contexto = stream_context_create([
    'zip' => [
        'password' => '123'
    ]
]);
echo file_get_contents(
    "$protocolo://$arquivo#$subarquivo", 
    false, 
    $contexto
);

echo PHP_EOL . PHP_EOL . PHP_EOL;
echo "É possível fazer o mesmo com a função fopen('wrapper://stream', 'modo', false, 'array de contexto');";
echo PHP_EOL;

$stream = fopen("$protocolo://$arquivo#$subarquivo", 'r', false, $contexto);
while(!feof($stream)) {
    $curso = fgets($stream);
    echo $curso;
}
fclose($stream);