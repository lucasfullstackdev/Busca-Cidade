<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ApiRequest;

class ConsultaController extends Controller
{
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

        // dd($nomesPorMunicipio);

        return view('admin.pages.consulta.index', compact([
            'ibgeDistritos',
            'bolsaFamilia',
            'nomesPorMunicipio',
            'escolasPorMunicipio',
            'ibgeProjecao'
        ]));
    }

}
