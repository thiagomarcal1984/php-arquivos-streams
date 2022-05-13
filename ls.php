<?php

// $diretorioAtual = new Directory();
$diretorioAtual = dir('.'); // Retorna o diretório atual, cuja classe é Directory.

echo "Caminho do diretório atual: " . $diretorioAtual->path . PHP_EOL. PHP_EOL;

echo "Conteúdo do diretório: " . PHP_EOL;
while ($arquivo = $diretorioAtual->read()) {
    echo $arquivo . PHP_EOL;
}