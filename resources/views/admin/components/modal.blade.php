<div class="modal fade" id="{{ $id ?? null }}" tabindex="-1" role="dialog" aria-labelledby="{{ $id ?? null }}}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header bg-dark text-light">
          <h5 class="modal-title" id="exampleModalLongTitle">Informações Importantes</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" class="text-light">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <ul class="list-group">
                <li class="list-group-item">
                    <h5> Dados da API </h5>
                    <span class="font-weight-bold">Órgão/Instituição:</span> {{ $orgao_instituicao ?? null }} <br>
                    <span class="font-weight-bold">API:</span> {{ $api ?? null }} <br>
                    <span class="font-weight-bold">Versão:</span> {{ $versao }} <br>
                    <span class="font-weight-bold">Endereço:</span> <a href="{{ $endereco ?? null }}" target="_blank">{{ $endereco ?? null }}</a>
                </li>
            </ul>

            <hr>

            <ul class="list-group">
                <li class="list-group-item">Nenhum dado aqui exibido foi gravado em banco de dados, log ou qualquer outro meio.</li>
                <li class="list-group-item">Esta aplicação não se responsabiliza pela vericidade dos dados e pela atualização dos mesmos.</li>
                <li class="list-group-item">Toda e qualquer informação aqui exibida está livre de manipulação de seu conteúdo, ficando livre apenas a formatação de valores monetários e quantitativos, afim de garantir sua legibilidade, sendo vedada a alteração de seu valor.</li>
                <li class="list-group-item">
                    Todas as api's utilizadas aqui são publicas e seguem:
                    <ul>
                        <li>
                            <a href="http://www.planalto.gov.br/ccivil_03/_ato2015-2018/2016/decreto/d8777.htm" title="" target="_blank" class="badge badge-warning">[DECRETO Nº 8.777, DE 11 DE MAIO DE 2016]</a>
                            , o qual institui a Política de Dados Abertos do Poder Executivo Federal.
                        </li>
                        <li>
                            <a href="http://www.planalto.gov.br/ccivil_03/_ato2011-2014/2011/lei/l12527.htm" title="" target="_blank" class="badge badge-warning"> [LEI Nº 12.527, DE 18 DE NOVEMBRO DE 2011.]</a>
                            , a qual regula o acesso a informações.
                        </li>
                    </ul>
                </li>
                <li class="list-group-item">
                    Esta aplicação segue:<br>
                    <a href="http://www.planalto.gov.br/ccivil_03/leis/l9610.htm" title="" target="_blank" class="badge badge-warning">[LEI Nº 9.610, DE 19 DE FEVEREIRO DE 1998]</a>, lei que altera, atualiza e consolida a legislação sobre direitos autorais e dá outras providências.</li>
                </li>
            </ul>
        </div>
      </div>
    </div>
</div>