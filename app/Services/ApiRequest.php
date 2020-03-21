<?php

/**
 * http://www.transparencia.gov.br/swagger-ui.html#!/Bolsa32Fam237lia/bolsaFamiliaPorMunicipioUsingGET
 * https://servicodados.ibge.gov.br/api/docs/localidades?versao=1#api-Municipios-municipiosGet
 */

namespace App\Services;

use GuzzleHttp\Client;

class ApiRequest
{
    private $baseURI = 'http://www.transparencia.gov.br/api-de-dados/bolsa-familia-por-municipio';
    private $ibgeCode;
    private $dateReference;

    private $client;
    private $response;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function setParamns($paramns)
    {
        $this->ibgeCode = $paramns['ibgeCode'];
        $this->dateReference = $paramns['dateReference'];

        return $this;
    }

    public function ibgeApi()
    {
        $this->baseURI = "https://servicodados.ibge.gov.br/api/v1/localidades/municipios/" . $this->ibgeCode;
        $this->response = $this->client->request('GET', $this->baseURI );

        return $this->sendResponse();
    }


    private function sendResponse()
    {
        return json_decode( $this->response->getBody()->getContents() );
    }

}