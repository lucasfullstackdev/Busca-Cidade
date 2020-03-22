<?php

/**
 * Bolsa Família por Município -> http://www.transparencia.gov.br/swagger-ui.html#!/Bolsa32Fam237lia/bolsaFamiliaPorMunicipioUsingGET
 * Projeção do Município ->  https://servicodados.ibge.gov.br/api/docs/projecoes?versao=1#api-Populacao-populacaoLocalidadeGet
 * Distritos por município -> https://servicodados.ibge.gov.br/api/docs/localidades?versao=1#api-Distritos-municipiosMunicipioDistritosGet
 * 
 * 
 */

namespace App\Services;

use GuzzleHttp\Client;
use App\Services\Utils;

class ApiRequest
{
    private $baseURI;
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
        $this->dateReference = str_replace('-', '', $paramns['dateReference']);

        return $this;
    }

    public function ibgeNomePorMunicipio()
    {
        $this->baseURI = "https://servicodados.ibge.gov.br/api/v2/censos/nomes/ranking?localidade=2611101";
        $this->getRequest();

        $response =  $this->sendResponse()[0];

        foreach ($response->res as $rowKey => $row){
            foreach ($row as $key => $nome){
                if ( $key == 'frequencia'){
                    $frequencia = $response->res[$rowKey]->frequencia;
                    $response->res[$rowKey]->frequencia = Utils::intFormat($frequencia);
                }
            }
        }

        return $response;
    }

    public function escolasPublicasPorMunicipio()
    {
        $this->baseURI = "http://educacao.dadosabertosbr.com/api/escolas/buscaavancada?situacaoFuncionamento=1&cidade={$this->ibgeCode}&regulamentada=1&situacaoFuncionamento=1&dependenciaAdministrativa=3";
        $this->getRequest();

        return $this->sendResponse();
    }

    public function ibgeDistritosApi()
    {
        $this->baseURI = "https://servicodados.ibge.gov.br/api/v1/localidades/municipios/{$this->ibgeCode}/distritos";
        $this->getRequest();

        return $this->sendResponse();
    }

    public function bolsaFamiliaApi()
    {
        $this->baseURI = "http://www.transparencia.gov.br/api-de-dados/bolsa-familia-por-municipio?mesAno={$this->dateReference}&codigoIbge={$this->ibgeCode}&pagina=1";
        $this->getRequest();

        $response = $this->sendResponse()[0];
        $response->valor = "R$ " . number_format($response->valor, 2, ',', '.');

        $response->quantidadeBeneficiados = Utils::intFormat($response->quantidadeBeneficiados);

        return $response;
    }


    public function ibgeProjecaoApi()
    {
        $this->baseURI = "https://servicodados.ibge.gov.br/api/v1/localidades/municipios/{$this->ibgeCode}/"; // Buscando os distritos

        $this->getRequest();
        $regiao = $this->sendResponse()->microrregiao->mesorregiao->UF->regiao;
    
        $this->baseURI = "https://servicodados.ibge.gov.br/api/v1/projecoes/populacao/{$regiao->id}";
        $this->getRequest();
        $response = $this->sendResponse();

        $response->projecao->populacao = Utils::intFormat($response->projecao->populacao);
        $response->projecao->periodoMedio->incrementoPopulacional = Utils::intFormat($response->projecao->periodoMedio->incrementoPopulacional);
        $response->regiaoSigla = $regiao->sigla;
        $response->regiaoNome = $regiao->nome;
        
        return $response;
    }
  
    private function getRequest()
    {
        $this->response = $this->client->request('GET', $this->baseURI);
    }

    private function sendResponse()
    {
        return json_decode( $this->response->getBody()->getContents() );
    }

}