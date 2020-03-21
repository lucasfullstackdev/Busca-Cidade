<?php

namespace App\Services;

use GuzzleHttp\Client;

class BolsaFamiliaService
{
    private static $baseURI = 'http://www.transparencia.gov.br/api-de-dados/bolsa-familia-por-municipio';
    private static $pagina = 1;
    private static $client;
    private static $response;

    static public function getByMunicipio($mesAno, $codigoIbge)
    {
        self::$baseURI = self::$baseURI . "?mesAno={$mesAno}&codigoIbge={$codigoIbge}&pagina=" . self::$pagina;

        self::$client = new Client();
        self::$response = self::$client->request('GET', self::$baseURI );

        /**
         * dataReferencia
         * municipio->nomeIBGE
         * municipio->codigoIBGE
         * municipio->uf->sigla
         * municipio->uf->nome
         * valor
         * quantidadeBeneficiados
         * 
         */

        // dd(
        //     self::$response->getBody()->getContents()dataReferencia
        // );

        return json_decode(self::$response->getBody()->getContents());
    }

}


