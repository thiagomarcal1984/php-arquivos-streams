<?php

// Para abrir o terminal interativo do php, use: php -a.

// Streams são fluxos de dados que pegam qualquer tipo de arquivo, 
// independente do protocolo usado para acessá-lo.
echo "Requisição de arquivos em diferentes protocolos";

// A função file_get_contents obtém o conteúdo do arquivo gerado a partir da URL.
// Protocolos e wrappers suportados pela função: https://www.php.net/manual/pt_BR/wrappers.php
echo file_get_contents("https://swapi.dev/api/films/4"); // Acessa a API com dados do Star Wars.
// Por padrão, o file_get_contents usa o protocolo file:// .
