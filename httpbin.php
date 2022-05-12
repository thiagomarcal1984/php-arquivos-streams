<?php

// Documentação sobre os contextos das streams para diferentes protocolos:
// https://www.php.net/manual/pt_BR/context.php

$contexto = stream_context_create([
    'http' => [// Wrapper de stream.
        'method' => 'DELETE',
        'header' => 'X-From: PHP'
    ]
]);

// Site para testes requisições HTTP (todos os verbos): http://httpbin.org/get
// Nesse site, você só pode chamar os verbos no segundo parâmetro se o 
// cabeçalho da requisição também informar esse método.
echo file_get_contents('http://httpbin.org/delete', false, $contexto);
// Se a requisição estiver correta, o cabeçalho X-From deve ter o valor


$contexto = stream_context_create([
    'http' => [// Wrapper de stream.
        'method' => 'POST',
        'header' => "X-From: PHP\r\n" .  // Sem essa quebra de linh, não tem como acrescentar ...
                    "Content-Type: text/plain", // ...mais este cabeçalho.
                    // Sem o cabeçalho Content-Type, aparecerá um warning 
                    // após completar a requisição.
                    // Outra: repare nas aspas duplas, senão \r\n vai escapar.
        'content'=> 'Teste do corpo',
    ]
]);
echo file_get_contents('http://httpbin.org/post', false, $contexto);
