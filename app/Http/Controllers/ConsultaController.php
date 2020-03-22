<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ApiRequest;

class ConsultaController extends Controller
{
    private $modals = [
        'modalDadosMunicipio' => [
            'id' => 'modalDadosMunicipio',
            'orgao_instituicao' => 'CONTROLADORIA-GERAL DA UNIÃO - Portal da transparência',
            'endereco' => 'http://www.transparencia.gov.br/swagger-ui.html#!/Bolsa32Fam237lia/bolsaFamiliaPorMunicipioUsingGET',
            'api' => '/api-de-dados/bolsa-familia-por-municipio',
            'versao' => 'v1'
        ],
        'modalNomesPorMunicipio' => [
            'id' => 'modalNomesPorMunicipio',
            'orgao_instituicao' => 'IBGE',
            'endereco' => 'https://servicodados.ibge.gov.br/api/docs/censos/nomes?versao=2',
            'api' => 'censos/nomes',
            'versao' => 'v2'
        ],
        'modalEscolasPorMunicipio' => [
            'id' => 'modalEscolasPorMunicipio',
            'orgao_instituicao' => 'Educação Inteligente',
            'endereco' => 'http://educacao.dadosabertosbr.com/api',
            'api' => 'api/escolas/buscaavancada',
            'versao' => '----'
        ],
        'modalDistritos' => [
            'id' => 'modalDistritos',
            'orgao_instituicao' => 'IBGE',
            'endereco' => 'https://servicodados.ibge.gov.br/api/docs/localidades?versao=1#api-Distritos-municipiosMunicipioDistritosGet',
            'api' => '/localidades/municipios/{municipio}/distritos',
            'versao' => 'V1'
        ],
        'modalProjecaoIbge' => [
            'id' => 'modalProjecaoIbge',
            'orgao_instituicao' => 'IBGE',
            'endereco' => 'https://servicodados.ibge.gov.br/api/docs/projecoes?versao=1#api-Populacao-populacaoLocalidadeGet',
            'api' => '/projecoes/populacao',
            'versao' => 'V1'
        ]
    ];

    public function index()
    {
        return view('admin.pages.consulta.index');
    }

    public function search(ApiRequest $apiRequest, Request $request)
    {
        $this->apiRequest = $apiRequest;
        $response = $this->apiRequest->setParamns($request->except('_token'));

        $ibgeDistritos = $response->ibgeDistritosApi();
        $bolsaFamilia = $response->bolsaFamiliaApi();
        $nomesPorMunicipio = $response->ibgeNomePorMunicipio();
        $escolasPorMunicipio = $response->escolasPublicasPorMunicipio();
        $ibgeProjecao = $response->ibgeProjecaoApi();
        $modals = $this->modals;

        return view('admin.pages.consulta.index', compact([
            'ibgeDistritos',
            'bolsaFamilia',
            'nomesPorMunicipio',
            'escolasPorMunicipio',
            'ibgeProjecao',
            'modals'
        ]));
    }

}
