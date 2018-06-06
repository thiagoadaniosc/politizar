<?php $title = 'Politizar'?>
<?php $pagina = 'Partidos' ?>
@extends('template')
@section('style')
<style type="text/css">
    .test {
        text-align: center;
    }

    body {
        background-image: url('http://www.politicacomk.com.br/wp-content/uploads/2016/09/congresso-nacional.jpg');
        width: 100%;
        height: 100%;
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: 100% 100vh;
        background-position: center center;
        filter: blur(0px);
        position: absolute;
        z-index: -1;
    }

    div#partido-main {
        border-left: 10px solid rgb(22, 86, 154);
    }
</style>
@endsection

@section('template')

<div id="partido-main" class="col-lg-11 pt-0 p-4 mt-4 mb-4 ml-auto mr-auto" style="background-color:#F5F5F5; height: 500px;" ng-controller="" ng-init="pesquisar();">
    <div class="col-lg-12 pt-2 row" style="height:220px; background-color: rgb(238, 238, 238);">
        <div class="m-auto border rounded-circle bg-white row" style="width:200px; height: 200px;">
            <img  class="m-auto" src="/imgs/partidos/{{ $partido->sigla }}.png" width="120px" alt="{{ $partido->sigla }}">
        </div>

        <div class="col-lg-8 mt-3 float-right">
          <h4 class="w-100 bg-secondary text-white p-2">{{ $partido->sigla }} - {{ $partido->nome }}</h4>

          <ul class="list-unstyled">
            <li class="text-capitalize">
              <span class="badge badge-primary rounded-0"><strong>Presidente Nacional:</strong> {{ mb_strtolower($partido->presidente) }}</span>
            </li>
          </ul>

          <p class="text-justify">
            O Movimento Democrático Brasileiro (MDB), anteriormente Partido do Movimento Democrático Brasileiro (PMDB), é um partido político brasileiro.Foi apontado com o de maior número de filiados, sendo 2 355 472 filiados em maio de 2012, apesar de nunca ter elegido nenhum presidente da república através do voto direto.
          </p>

        </div>


    </div>
</div>

@endsection

@section('script')

@endsection
