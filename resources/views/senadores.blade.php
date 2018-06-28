<?php $title = 'Politizar'?>
<?php $pagina = 'Senadores' ?>
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
    filter:blur(0px);
    position: absolute;
    z-index: -1;
  }
  .senadores {
    transition: 1s;
  }
  .senadores:hover {
    background-color: rgb(232, 232, 232) !important;
    transform:scale(1.03);
  }

  .cursor-pointer {
    cursor: pointer;
  }

  .senadores-header {
    color: white;
    background-color: rgba(48, 48, 48, 1);
    border-bottom: 4px solid rgb(34, 34, 34)
  }

  </style>
@endsection

@section('template')

  <div class="col-lg-11 pt-0 p-4 mt-4 mb-4 ml-auto mr-auto" style="background-color:#EEEEEE" ng-controller="senadoresCtrl" ng-init="pesquisar();">

    <h4 class="col-lg-12 p-2 text-center senadores-header">Senadores</h4>

    <div class="row mb-1 pb-1 p-0 m-0 justify-content-start">

      <input type="pesquisa" name="pesquisa" ng-change="pesquisar()" placeholder="Pesquisa..." ng-model="pesquisa" class="form-control col-lg-8 rounded-0">

      <select ng-init="getSiglas()"class="form-control col-lg-4 rounded-0"  ng-options="sigla.Sigla for sigla in siglas" ng-model="sigla">
        <option ng-selected="true" selected="selected">Partido</option>
      </select>

    </div>
    <!--<p class="text-center">Pesquisa: @{{pesquisa}} - @{{pesquisa_tipo}}</p>-->
    <div class="bg-light border row mb-2 pt-2 m-0 col-lg-12">
      <div class="col-lg-6"><h4 class="text-center text-secondary cursor-pointer">Senador</h4></div>
      <div class="col-lg-6"><h4 class="text-center text-secondary cursor-pointer">Partido</h4></div>
    </div>

    <div class="senadores border p-2 mb-3 row m-0 cursor-pointer bg-white" ng-click="getsenador(senador.IdentificacaoParlamentar.CodigoParlamentar);" ng-repeat="senador in senadores | filter : pesquisa:sigla.Sigla"
    data-toggle="modal" data-target="#senadorModal">
    <div class="col-lg-2 m-auto">
      <div class="bg-dark m-auto" style="border-radius: 50%;width: 100px; height: 100px; overflow: hidden; border:2px solid rgba(111, 111, 111, .9);">
        <img width="100px" class=" m-0 p-0" src="@{{senador.IdentificacaoParlamentar.UrlFotoParlamentar}}" alt="">
      </div>
    </div>
    <div class="col-lg-5 senador-informacoes">
      <ul class="list-unstyled text-capitalize">
        <li><span class="badge badge-secondary rounded-0"><strong>Nome:</strong> @{{senador.IdentificacaoParlamentar.NomeParlamentar | lowercase}}</span></li>
        <li><span class="badge badge-primary rounded-0"><strong> Estado: </strong>  @{{senador.IdentificacaoParlamentar.UfParlamentar}} </span></li>
        <li><strong>Sexo:</strong> @{{senador.IdentificacaoParlamentar.SexoParlamentar}}</li>
        <li><strong>Partido: </strong> @{{senador.IdentificacaoParlamentar.SiglaPartidoParlamentar}}</li>
      </ul>
    </div>

    <div class="col-lg-5 float-right m-auto senador-partido">
      <h4 class="text-center rounded-circle">
        <img class="m-auto img-responsive" width="100px" src="imgs/partidos/@{{senador.IdentificacaoParlamentar.SiglaPartidoParlamentar}}.png" alt="">
      </h4>

      <!--
      <ul class="list-unstyled">
      <li>Nome: @{{senador.nome}}</li>
      <li>Estado: @{{senador.nome}}</li>
      <li>Lesgislatura: @{{senador.nome}}</li>
      <li>Sexo: @{{senador.nome}}</li>
      <li>Partido: @{{senador.nome}}</li>
    </ul>
  -->

</div>
</div>


<!-- Modal -->
<div class="modal fade m-auto" id="senadorModal" tabindex="-1" role="dialog" aria-labelledby="senadorModal" aria-hidden="true">
  <div class="modal-dialog" role="document" style="width: 50vw; max-width: 50vw;">
    <div class="modal-content col-lg-12" style="margin-top:10vh; height:auto; !important;">
      <div class="modal-header">
        <h5 class="modal-title text-center" id="senadorModalLabel">senador</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body h-100">
        <h5 class="text-center"><strong>@{{senador.IdentificacaoParlamentar.NomeParlamentar}}</strong></h5>
        <div class="row p-auto m-auto">
          <div class="col-lg-3">
            <div class="bg-dark" style="border-radius: 50%;width: 100px; height: 100px; overflow: hidden; border:2px solid rgba(111, 111, 111, .9);">
              <img width="100px" class=" m-0 p-0" src="@{{senador.IdentificacaoParlamentar.UrlFotoParlamentar}}" alt="">
            </div>
          </div>
          <ul class="list-unstyled col-lg-6" style="font-size:.9em">
            <li class=""><b>Nome Civil:</b>  @{{senador.IdentificacaoParlamentar.NomeCompletoParlamentar}}</li>
            <li class=""><b>Sexo:</b>  @{{senador.IdentificacaoParlamentar.SexoParlamentar}}</li>
            <li class=""><b>Estado:</b>  @{{senador.MandatoAtual.UfParlamentar}}</li>
            <li class=""><b>Munícipio de Origem:</b>  @{{senador.municipioNascimento}}</li>
            <li class=""><b>Escolaridade:</b>  @{{senador.escolaridade}}</li>
            <li class=""><b>Situação:</b>  @{{senador.ultimoStatus.situacao}}</li>
            <li class=""><b>Data de Nascimento:</b>  @{{senador.DadosBasicosParlamentar.DataNascimento | date : "dd/MM/y"}}</li>
          </ul>
          <div class="col-lg-3">
            <h5 class="text-center mb-4"><strong>Partido</strong></h5>
            <h4 class="text-center rounded-circle align-middle m-auto">
              <img class="m-auto img-responsive" width="100px" src="imgs/partidos/@{{senador.IdentificacaoParlamentar.SiglaPartidoParlamentar}}.png" alt="">
            </h4>
          </div>
        </div>
        <hr>

        <div class="row p-auto col-lg-12">
          <h4 class=" col-lg-12">Dados de Gabinete</h4>
          <ul class="list-unstyled col-lg-6 m-auto" style="font-size:.9em">
            <li class=""><b>Telefone: </b>  @{{senador.DadosBasicosParlamentar.TelefoneParlamentar}}</li>
            <li class=""><b>E-mail: </b>  @{{senador.IdentificacaoParlamentar.EmailParlamentar | lowercase}}</li>
          </ul>
          <ul class="list-unstyled col-lg-6" style="font-size:.9em">
            <li class=""><b>Endereço do Gabinete:</b>  @{{senador.DadosBasicosParlamentar.EnderecoParlamentar}}</li>
          </ul>
        </div>

        <hr />
        <div class="row p-auto col-lg-12 m-0" style="overflow: auto;">
          <h4 class=" col-lg-12 pt-1 pb-1 bg-secondary text-white">Ultimas Despesas</h4>
        <table id="senador-despesa" class="table table-striped table-bordered table-sm"  style="width:100%">

          <thead>

          <tr>

            <th>Descrição</th>

            <th>Tipo do Documento</th>

            <th>Empresa</th>

            <th>Mês</th>

            <th>Ano</th>

            <th>Data do Documento</th>
            <th>Valor</th>

            </tr>

          </thead>


        </table>
      </div>

      </div>
      <div class="modal-footer">
        <!--<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>-->
      </div>
    </div>
  </div>
</div>

</div>


@endsection

@section('script')
  <script src="https://cdn.datatables.net/plug-ins/1.10.16/i18n/Portuguese-Brasil.json" charset="utf-8"></script>
  <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js" charset="utf-8"></script>
  <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js" charset="utf-8"></script>

  <script type="text/javascript">
  app.controller('senadoresCtrl', function($scope, $http){
    $scope.sigla = '';
    $scope.pesquisar = function (){

      $http.defaults.headers.get = { 'accept' : 'application/json' };

      if ($scope.pesquisa == "" || $scope.pesquisa == null) {
        $url2 ='http://legis.senado.gov.br/dadosabertos/senador/lista/atual';
      }

      $http.get($url2).then(function(response){
        $scope.senadores = response.data.ListaParlamentarEmExercicio.Parlamentares.Parlamentar;
        //console.log($scope.senadores);
      });

    };

$scope.getSiglas = function(){
  // $http.defaults.headers.get = { 'accept' : 'application/json' };
  $url = "https://legis.senado.gov.br/dadosabertos/senador/partidos";
  $http.get($url).then(function(response){
    $scope.siglas = response.data.ListaPartidos.Partidos.Partido;
    //console.log($scope.siglas.Partido);
  });
};

$scope.getsenador = function($id){
  //console.log($id);

  $http.defaults.headers.get = { 'accept' : 'application/json' };
  $url = "http://legis.senado.gov.br/dadosabertos/senador/" + $id;
  //console.log($url);
  $http.get($url).then(function(response){
    $scope.senador = response.data.DetalheParlamentar.Parlamentar;
  });
  $scope.getDespesas($id);

};

$scope.getHistorico = function() {
  $http.defaults.headers.get = { 'accept' : 'application/json' };
  $url = "http://legis.senado.gov.br/dadosabertos/senador/"  + $id + "/historico";
  //console.log($url);
  $http.get($url).then(function(response){
    $scope.senadorHistorico = response.data.DetalheParlamentar.Parlamentar;
  });
};

$scope.getDespesas = function($id) {
  // $http.defaults.headers.get = { 'accept' : 'application/json' };

  $url = 'http://www.meucongressonacional.org/api/senadores/'  + $id + '/gastos';
  $('#senador-despesa').DataTable().clear();
  $('#senador-despesa').DataTable().destroy();
  $('#senador-despesa').DataTable({
    "ajax" : {
      url : $url,
      dataSrc: 'gastos'
    },
   columns: [
     { data: 'desc1' },
     { data: 'tipoDoc' },
     { data: 'empresaNome' },
     { data: 'mes' },
     { data: 'ano' },
     { data: 'dataFormatted' },
     { data: 'gasto' }
   ],
   "oLanguage": {
      "sEmptyTable": "Nenhum registro encontrado",
      "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
      "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
      "sInfoFiltered": "(Filtrados de _MAX_ registros)",
      "sInfoPostFix": "",
      "sInfoThousands": ".",
      "sLengthMenu": "_MENU_ resultados por página",
      "sLoadingRecords": "Carregando...",
      "sProcessing": "Processando...",
      "sZeroRecords": "Nenhum registro encontrado",
      "sSearch": '',
        "sSearch": "Pesquisar: ",
        "oPaginate": {
          "sNext": "Próximo",
          "sPrevious": "Anterior",
          "sFirst": "Primeiro",
          "sLast": "Último"
          },
      "oAria": {
        "sSortAscending": ": Ordenar colunas de forma ascendente",
        "sSortDescending": ": Ordenar colunas de forma descendente"
      }
    }
  });
        $("#senador-despesa_filter").addClass('float-right');
  // console.log($url);
  // $http.get($url).then(function(response){
    // $scope.senador_gastos = response.data.gastos;
    // console.log($scope.senador_gastos);
  // });
}


$scope.getMes = function($mesNumber){
  var meses = ['0', 'Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'];
  return meses[$mesNumber];
};

}); // Fim do Controller
</script>
@endsection
