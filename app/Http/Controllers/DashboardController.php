<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ApiRequest;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.pages.bolsa-familia.index');
    }

    public function search(ApiRequest $apiRequest, Request $request)
    {
        $this->apiRequest = $apiRequest;
        $response = $this->apiRequest->setParamns($request->except('_token'))->ibgeApi();

        dd($response);
    }

}
