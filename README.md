<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

<br><br><br>

<h1 align="center">City Data API</h1>
<h4 align="center">Uma aplicação web para consulta de dados públicos de cidades</h4>

## ScreenShots
<p align="center">
        <img src="https://github.com/lucasfullstackdev/City-Data-API/blob/master/public/screenshots/screen-shot-1.png" width="900">
        <img src="https://github.com/lucasfullstackdev/City-Data-API/blob/master/public/screenshots/screen-shot-2.png" width="900">
        <img src="https://github.com/lucasfullstackdev/City-Data-API/blob/master/public/screenshots/screen-shot-3.png" width="1000">
</p>


## Sobre o projeto
Este projeto tem como finalidade facilitar o acesso a informações públicas disponibilizadas por Órgãos e instituições da República federativa do Brasil seguindo as seguintes leis e decretos:

- [[DECRETO Nº 8.777, DE 11 DE MAIO DE 2016]](http://www.planalto.gov.br/ccivil_03/_ato2015-2018/2016/decreto/d8777.htm), o qual institui a Política de Dados Abertos do Poder Executivo Federal.
- [[LEI Nº 12.527, DE 18 DE NOVEMBRO DE 2011.]](http://www.planalto.gov.br/ccivil_03/_ato2011-2014/2011/lei/l12527.htm), a qual regula o acesso a informações.
- [[LEI Nº 9.610, DE 19 DE FEVEREIRO DE 1998]](http://www.planalto.gov.br/ccivil_03/leis/l9610.htm), lei que altera, atualiza e consolida a legislação sobre direitos autorais e dá outras providências.

## Sobre as Api's utilizadas
- Todas as api's utilizadas nesta aplicação podem ser encontradas facilmente na internet, bem como a sua documentação
- Segue lista de Api's utilizadas
    -  [/api-de-dados/bolsa-familia-por-municipio](http://www.transparencia.gov.br/swagger-ui.html#!/Bolsa32Fam237lia/bolsaFamiliaPorMunicipioUsingGET)
    - [/censos/nomes](https://servicodados.ibge.gov.br/api/docs/censos/nomes?versao=2)
    - [/localidades/municipios/{municipio}/distritos](https://servicodados.ibge.gov.br/api/docs/localidades?versao=1#api-Distritos-municipiosMunicipioDistritosGet)
    - [/api/escolas/buscaavancada](http://educacao.dadosabertosbr.com/api)
    - [/projecoes/populacao](https://servicodados.ibge.gov.br/api/docs/projecoes?versao=1#api-Populacao-populacaoLocalidadeGet)

## Por que este projeto?
Este projeto faz parte do meu portfólio pessoal, uma maneira de comprovar meus conhecimentos em LARAVEL.

## Setup
1. Instale o [composer](https://getcomposer.org/download/)
2. Acesse a raiz do projeto
3. Com o console aberto, execute o comando: composer install
4. Após a instalação de todas as dependências necessárias, execute o comando php artisan serve
8. O projeto deve estar disponível no endereco: [localhost:8000](http://localhost:8000/) 

## Considerações finais
Qualquer dúvida ou sugestão, entre em contato pelo e-mail: lucas.fullstack.dev@gmail.com
