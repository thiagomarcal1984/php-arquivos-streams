<?php

// Abre o stream lista-cursos.txt.
$arquivoCursos = fopen('lista-cursos.txt', 'r'); 

// stream_get_filters(): Este comando retorna um array com todos os filtros de stream disponíveis.
stream_filter_append($arquivoCursos, "string.toupper");

// Lê o arquivo com os filtros aplicados.
$conteudo = fread($arquivoCursos, filesize('lista-cursos.txt'));
