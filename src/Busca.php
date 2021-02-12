<?php

namespace Karoline\BibliotecaCep;

class Busca
{
    private $url = "https://viacep.com.br/ws/";
    
    public function getEnderecoPeloCep(string $cep): array
    {
        $cep = preg_replace("/[^0-9]/im", '', $cep);

        $get = $this->getFileGetContents($cep);

        return (array) json_decode($get);
    }

    public function getFileGetContents(string $cep)
    {
        return file_get_contents($this->url . $cep . "/json");
    }
}