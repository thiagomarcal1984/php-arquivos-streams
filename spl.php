<?php

// SplFileObject permite operação com arquivos. O modo padrão é leitura (r).
$arquivoCursos = new SplFileObject('cursos.csv');

while (!$arquivoCursos->eof()) {
    $linha = $arquivoCursos->fgetcsv(';');
    echo $linha[0] . PHP_EOL; // Exibe só a primeira coluna do CSV.
}

echo "Timestamp do arquivo: " . $arquivoCursos->getCTime() . PHP_EOL;

$date = new DateTime();
$date->setTimestamp($arquivoCursos->getCTime());
echo "Data gerada a partir do timestamp: " . $date->format('d/m/Y') . PHP_EOL;


// SplFileObject implementa algumas interfaces de Iterators do PHP. Assim,
// podemos usar o foreach com esses objetos.

$arquivo = new SplFileObject('lista-cursos.txt');

foreach ($arquivo as $linha) {
    echo $linha;
}