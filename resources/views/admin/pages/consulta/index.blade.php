@extends('admin.layouts.panel')

@section('content')
    
    <section div="container-api">
        <div id="container-form">
            <h2>Escolha a cidade</h2>
            <form action="{{ route('consulta.search') }}" method="post">
                @csrf

                <div class="field-icon">
                    <label><i class="fa fa-globe"></i></label>
                    <input type="text" placeholder="Código IBGE" name="ibgeCode" value="3550308">
                </div>

                <div class="field-icon">
                    <label><i class="fa fa-calendar"></i></label>
                    <input type="month" name="dateReference" placeholder="Data de Referência" value="2019-05">
                </div>

                <div class="container-button">
                    <button type="submit" class="btn btn-info">Consultar</button>
                </div>

            </form>

        </div>

        @isset($modals)
            @foreach ($modals as $modal)
                @include('admin.components.modal', $modal )   
            @endforeach
        @endisset

        <div id="container-result" class="card-columns" style=" display: inline-block; column-break-inside: avoid; ">
                @isset($bolsaFamilia)
                    <div class="card border-secondary">
                        <div class="card-header">{{ $bolsaFamilia->municipio->nomeIBGE }}</div>
                        <div class="card-body">
                            <blockquote class="blockquote mb-0">
                                <p class="card-text">Código Ibge: {{ $bolsaFamilia->municipio->codigoIBGE }} </p>
                                <p class="card-text">UF: {{ $bolsaFamilia->municipio->uf->sigla }} - {{ $bolsaFamilia->municipio->uf->nome }}</p>
                            </blockquote>
                        </div>
                        <div class="card-footer text-muted">
                            <footer class="blockquote-footer">
                                Dados da API pública do
                                <cite title="Source Title">IBGE</cite>
                                <i class="fa fa-info-circle text-info info-municipio" data-toggle="modal" data-target="#modalDadosMunicipio" style="float: right; font-size: 20px;"></i>
                            </footer>
                        </div>
                    </div>

                    <div class="card border-secondary">
                        <div class="card-header">
                            {{ $bolsaFamilia->tipo->descricao }}
                            <small class="text-muted" style="float: right;">Data de ref.: {{ $bolsaFamilia->dataReferencia }}</small>
                        </div>
                        <div class="card-body">
                            <blockquote class="blockquote mb-0">
                                <p class="card-text">Valor: {{ $bolsaFamilia->valor }}</p>
                                <p class="card-text">Beneficiados: {{ $bolsaFamilia->quantidadeBeneficiados }}</p>
                            </blockquote>
                        </div>
                        <div class="card-footer text-muted">
                            <footer class="blockquote-footer">
                                Dados da API pública do
                                <cite title="Source Title">IBGE</cite>
                                <i class="fa fa-info-circle text-info info-municipio" data-toggle="modal" data-target="#modalDadosMunicipio" style="float: right; font-size: 20px;"></i>
                            </footer>
                        </div>
                    </div>
                @endisset

                @isset($nomesPorMunicipio)
                    <div class="card border-secondary">
                        <div class="card-header">Nomes mais populares</div>
                        <div class="card-body" style="overflow: auto; max-height:  170px;">
                            <blockquote class="blockquote mb-0">
                                <ul>
                                    @foreach ($nomesPorMunicipio->res as $nome)
                                        <p class="card-text">{{ $nome->ranking }}º - {{ $nome->nome }} -> {{ $nome->frequencia }}</p>
                                    @endforeach
                                </ul>
                            </blockquote>
                        </div>
                        <div class="card-footer text-muted">
                            <footer class="blockquote-footer">
                                Dados da API pública do
                                <cite title="Source Title">IBGE</cite>
                                <i class="fa fa-info-circle text-info info-municipio" data-toggle="modal" data-target="#modalNomesPorMunicipio" style="float: right; font-size: 20px;"></i>
                            </footer>
                        </div>
                    </div>
                @endisset
               
                @isset($escolasPorMunicipio)
                    <div class="card border-secondary">
                        <div class="card-header">Escolas Públicas</div>
                        <div class="card-body" style="overflow: auto; max-height:  170px;">
                            <blockquote class="blockquote mb-0">
                                <ul>
                                    @foreach ($escolasPorMunicipio[1] as $escola)
                                        <p class="card-text">&#17; {{ $escola->nome }}</p>
                                    @endforeach
                                </ul>
                            </blockquote>
                        </div>
                        <div class="card-footer text-muted">
                            <footer class="blockquote-footer">
                                API pública do
                                <cite title="Source Title">educacao.dadosabertosbr</cite>
                                <i class="fa fa-info-circle text-info info-municipio" data-toggle="modal" data-target="#modalEscolasPorMunicipio" style="float: right; font-size: 20px;"></i>
                            </footer>
                        </div>
                    </div>
                @endisset
               
                @isset($ibgeDistritos)
                    <div class="card border-secondary">
                        <div class="card-header">Distritos <small class="text-muted" style="float: right;">Rota liberada: 08/01/2020</small></div>
                        <div class="card-body" style="overflow: auto; max-height:  170px;">
                            <blockquote class="blockquote mb-0">
                                <ul>
                                    @foreach ($ibgeDistritos as $distrito)
                                        <p class="card-text">&#17; {{ $distrito->nome }}</p>
                                    @endforeach
                                </ul>
                            </blockquote>
                        </div>
                        <div class="card-footer text-muted">
                            <footer class="blockquote-footer">
                                Dados da API pública do
                                <cite title="Source Title">IBGE</cite>
                                <i class="fa fa-info-circle text-info info-municipio" data-toggle="modal" data-target="#modalDistritos" style="float: right; font-size: 20px;"></i>
                            </footer>
                        </div>
                    </div>
                @endisset

                @isset($ibgeProjecao)
                    <div class="card border-secondary">
                        <div class="card-header">Projeção<small class="text-muted" style="float: right;">Data de ref.: {{ $ibgeProjecao->horario }}</small></div>
                        <div class="card-body" style="overflow: auto; max-height:  170px;">
                            <blockquote class="blockquote mb-0">
                                <p class="card-text">Região: {{ $ibgeProjecao->regiaoSigla }} - {{ $ibgeProjecao->regiaoNome }}</p>
                                <p class="card-text">População {{ $ibgeProjecao->projecao->populacao }}</p>
                                <hr>
                                <h6>Período Médio</h6>
                                <p class="card-text">Incremento Populacional: {{ $ibgeProjecao->projecao->periodoMedio->incrementoPopulacional }}</p>
                            </blockquote>
                        </div>
                        <div class="card-footer text-muted">
                            <footer class="blockquote-footer">
                                API pública do
                                <cite title="Source Title">IBGE</cite>
                                <i class="fa fa-info-circle text-info info-municipio" data-toggle="modal" data-target="#modalProjecaoIbge" style="float: right; font-size: 20px;"></i>
                            </footer>
                        </div>
                    </div>
                @endisset
        </div>
    </section>

@endsection
