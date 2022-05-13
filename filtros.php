<?php

require 'MeuFiltro.php';
require 'UTF8Filtro.php';

// Abre o stream lista-cursos.txt.
$arquivoCursos = fopen('lista-cursos.txt', 'r'); 

stream_filter_register('alura.partes', MeuFiltro::class);
stream_filter_register('filtro-utf8', UTF8Filtro::class);

// stream_get_filters(): Este comando retorna um array com todos os filtros de stream disponíveis.
// stream_filter_append($arquivoCursos, "string.toupper");
stream_filter_append($arquivoCursos, 'alura.partes');
stream_filter_append($arquivoCursos, 'filtro-utf8');

// Lê o arquivo com os filtros aplicados.
echo fread($arquivoCursos, filesize('lista-cursos.txt'));
