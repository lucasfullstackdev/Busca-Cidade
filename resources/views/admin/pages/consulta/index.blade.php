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

        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle">Informações Importantes</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    
                </div>
              </div>
            </div>
          </div>


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
                                <i class="fa fa-info-circle text-info info-municipio" data-toggle="modal" data-target="#exampleModalCenter" style="float: right; font-size: 20px;"></i>
                            </footer>
                        </div>
                    </div>

                    <div class="card border-secondary">
                        <div class="card-header">
                            {{ $bolsaFamilia->tipo->descricao }}
                            <small class="text-muted" style="float: right;">Data de Referência: {{ $bolsaFamilia->dataReferencia }}</small>
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
                                <i class="fa fa-info-circle text-info" style="float: right; font-size: 20px;"></i>
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
                                <i class="fa fa-info-circle text-info" style="float: right; font-size: 20px;"></i>
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
                                <i class="fa fa-info-circle text-info" style="float: right; font-size: 20px;"></i>
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
                                <i class="fa fa-info-circle text-info" style="float: right; font-size: 20px;"></i>
                            </footer>
                        </div>
                    </div>
                @endisset

                @isset($ibgeProjecao)
                    <div class="card border-secondary">
                        <div class="card-header">Projeção<small class="text-muted" style="float: right;">Data de Referência: {{ $ibgeProjecao->horario }}</small></div>
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
                                <i class="fa fa-info-circle text-info" style="float: right; font-size: 20px;"></i>
                            </footer>
                        </div>
                    </div>
                @endisset
        </div>
    </section>

@endsection

{{-- 

Nenhum dado aqui exibido foi gravado em banco de dados privado, log ou qualquer outro meio.
Esta aplicação não se responsabiliza pela vericidade dos dados e pela atualização dos mesmos.
Toda e qualquer informação aqui exibida está livre de manipulação de seu conteúdo, ficando livre apenas a manipulação e formatação de valores monetários, afim de garantir sua legibilidade, sendo vedada a alteração de seu valor.

Todas as api's utilizadas aqui são publicas e seguem:

[DECRETO Nº 8.777, DE 11 DE MAIO DE 2016], o qual institui a Política de Dados Abertos do Poder Executivo Federal.
[LEI Nº 12.527, DE 18 DE NOVEMBRO DE 2011.], a qual regula o acesso a informações.

Esta aplicação segue:

[LEI Nº 9.610, DE 19 DE FEVEREIRO DE 1998], lei que altera, atualiza e consolida a legislação sobre direitos autorais e dá outras providências.
    
--}}