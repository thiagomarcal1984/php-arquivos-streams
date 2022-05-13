<?php

// Cópia de MeuFiltro.php
class UTF8Filtro extends php_user_filter {
    public $stream;

    public function onCreate(): bool
    {
        $this->stream = fopen("php://temp", 'w+');
        return $this->stream !== false;
    }
    public function filter($in, $out, &$consumed, $closing) : int
    {
        $saida = '';
        while ($bucket = stream_bucket_make_writeable($in)) 
        {
            $saida .= utf8_decode($bucket->data) . PHP_EOL; // Parte da decodificação UTF-8.
            // $saida .= utf8_encode($bucket->data) . PHP_EOL; // Parte da encodificação UTF-8.
        }
        
        $bucketSaida = stream_bucket_new($this->stream, $saida); 
        stream_bucket_append($out, $bucketSaida);
        return PSFS_PASS_ON; 
    }
}