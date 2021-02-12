<?php

use PHPUnit\Framework\TestCase;
use Karoline\BibliotecaCep\Busca;

class BuscaTest extends TestCase
{
    /**
     * @dataProvider dadosTeste
     */
    public function testGetEnderecoPeloCepDefaultUsage(string $input, array $esperado)
    {
        $resultado = (new Busca())->getEnderecoPeloCep($input);

        $this->assertEquals($esperado, $resultado);
    }

    public function dadosTeste()
    {
        return [
            "Endereço da Paraça da Sé" => [
                "01001000",
                [
                    "cep" => "01001-000",
                    "logradouro" =>  "Praça da Sé",
                    "complemento" => "lado ímpar",
                    "bairro" => "Sé",
                    "localidade" => "São Paulo",
                    "uf" => "SP",
                    "ibge" => "3550308",
                    "gia" => "1004",
                    "ddd" => "11",
                    "siafi" => "7107"
                ]
                ],
                "Endereço Qualquer" => [
                    "77015476",
                    [
                        "cep" => "77015-476",
                        "logradouro" => "ARSO 33 Rua 3",
                        "complemento" => "",
                        "bairro" => "Plano Diretor Sul",
                        "localidade" => "Palmas",
                        "uf" => "TO",
                        "ibge" => "1721000",
                        "gia" => "",
                        "ddd" => "63",
                        "siafi" => "9733"
                    ]
                ]
        ];
    }

    public function testFileGetContentsDefaultUsage()
    {
        $resultado = (new Busca())->getFileGetContents('01001000');

        $esperado = file_get_contents("https://viacep.com.br/ws/01001000/json");

        $this->assertEquals($esperado, $resultado);
    }
}