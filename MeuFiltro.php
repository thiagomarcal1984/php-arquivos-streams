<?php

// Detalhes da classse seus métodos: https://www.php.net/manual/pt_BR/class.php-user-filter.php
class MeuFiltro extends php_user_filter
{
    public $stream;

    public function onCreate() : bool
    {
        // parent::onCreate();
        // O stream "php://temp" (arquivo temporária com o wrapper php) permite 
        // uso dos dados para leitura/escrita na memória do PHP. O modo w+ é 
        // pra leitura e escrita.
        $this->stream = fopen("php://temp", 'w+');
        return $this->stream !== false; // Verdadeiro se o stream tiver sido criado com sucesso.
    }

    // Se você não acrescentar o tipo depois de cada função sobreescrita,
    // o PHP vai exibir vários warnings.
    // Os parâmetros $in e $out são do tipo resource, são recursos de IO.
    //      $in contém vários buckets (dentro de um bucket brigade). Arquivos grandes
    //      tem vários buckets.
    // O parâmetro $consumed é uma variável inteira passada por referência que é incrementada.
    //      Ela informa o número de bytes consumidos do stream.
    // O parâmetro $closing determina se o stream está em processo de fechamento.
    public function filter($in, $out, &$consumed, $closing) : int
    {
        $saida = '';
        while ($bucket = stream_bucket_make_writeable($in)) 
        {
            // stream_bucket_make_writeable($in) retorna um bucket.
            // Cada bucket tem duas propriedades: data (string) e 
            // datalen (comprimento da string)
            $linhas = explode('PHP_EOL', $bucket->data); 

            // Lembre-se que a quebra de linha tem que ser procurada com PHP_EOL.
            // Em ambiente Windows, o \n não é o caracter adequado para explodir
            // a string do bucket.

            foreach ($linhas as $linha) {
                // stripos busca uma string em outra, com case insensitive.
                if (stripos($linha, 'parte') !== false)
                {
                    $saida .= "$linha" . PHP_EOL;
                }
            }
        }
        
        // stream_bucket_new cria um bucket a partir do stream vazio e escreve a saída nele.
        $bucketSaida = stream_bucket_new($this->stream, $saida); 
        stream_bucket_append($out, $bucketSaida);
        return PSFS_PASS_ON; // Flag para informar que o filtro foi processado com sucesso.
    }
}