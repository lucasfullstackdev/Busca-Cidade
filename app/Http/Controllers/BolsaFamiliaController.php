<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\BolsaFamiliaService;

class BolsaFamiliaController extends Controller
{
    public function index()
    {
        $tst = BolsaFamiliaService::getByMunicipio('201905', '2302602');

        dd($tst[0]);

        return view('admin.pages.bolsa-familia.index');
    }

}
