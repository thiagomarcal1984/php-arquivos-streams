<?php

$meusCursos = file('lista-cursos.txt');
$outrosCursos = file('cursos-php.txt');

$arquivoCsv = fopen('cursos.csv', 'w');

// Há uma pequena diferença em escrever com fwrite e fputcsv.
//      fputscsv acrescenta aspas duplas ("") envolvendo o nome do curso,
//      mas não faz o mesmo com a segunda coluna (Sim/Não.). Esta função
//      também acrescenta a quebra de linhas por padrão.
// 
//      fwrite escreve o texto sem as aspas duplsa no nome do curso, e
//      não acrescenta as quebras de linha.

foreach ($meusCursos as $curso) {
    $linha = [trim($curso), 'Sim'];
    fputcsv($arquivoCsv, $linha, ';');
    // fwrite($arquivoCsv, implode(';', $linha));
}

foreach ($outrosCursos as $curso) {
    $linha = [trim($curso), 'Não' . PHP_EOL];
    // fputcsv($arquivoCsv, $linha, ';');
    fwrite($arquivoCsv, implode(';', $linha));
}

fclose($arquivoCsv);