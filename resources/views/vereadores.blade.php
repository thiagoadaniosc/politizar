<?php $title = 'Politizar'?>
<?php $pagina = 'Vereadores' ?>
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

      <input type="pesquisa" name="pesquisa" ng-change="pesquisar()" placeholder="Pesquisa..." ng-model="pesquisa" class="form-control col-lg-4 rounded-0">

      <select class="form-control col-lg-4 rounded-0" ng-model="pesquisa_tipo" ng-change="pesquisar()">
        <option value="" ng-selected="true">Pesquisa</option>
        <option value="nome" selected>Nome</option>
        <option value="sigla">Sigla</option>
      </select>

      <select ng-init="getSiglas()"class="form-control col-lg-4 rounded-0"  ng-options="sigla.Sigla for sigla in siglas" ng-model="sigla">
        <option value="" ng-selected="true">Partido</option>
      </select>

    </div>
    <!--<p class="text-center">Pesquisa: @{{pesquisa}} - @{{pesquisa_tipo}}</p>-->
    <div class="bg-light border row mb-2 pt-2 m-0 col-lg-12">
      <div class="col-lg-6"><h4 class="text-center text-secondary cursor-pointer">senador</h4></div>
      <div class="col-lg-6"><h4 class="text-center text-secondary cursor-pointer">Partido</h4></div>
    </div>

    <div class="senadores border p-2 mb-3 row m-0 cursor-pointer bg-white" ng-click="getsenador(senador.id);" ng-repeat="senador in senadores | filter : pesquisa:sigla.Sigla"
    data-toggle="modal" data-target="#senadorModal">
    <div class="col-lg-2 m-auto">
      <div class="bg-dark m-auto" style="border-radius: 50%;width: 100px; height: 100px; overflow: hidden; border:2px solid rgba(111, 111, 111, .9);">
        <img width="100px" class=" m-0 p-0" src="@{{senador.IdentificacaoParlamentar.UrlFotoParlamentar}}" alt="">
      </div>
    </div>
    <div class="col-lg-5 senador-informacoes">
      <ul class="list-unstyled text-capitalize">
        <li><strong>Nome:</strong> @{{senador.IdentificacaoParlamentar.NomeParlamentar | lowercase}}</li>
        <li><strong>Estado: </strong> @{{senador.IdentificacaoParlamentar.UfParlamentar}}</li>
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
  <div class="modal-dialog" role="document" style="width: 50vw !important; max-width: 50vw !important;">
    <div class="modal-content col-lg-12" style="margin-top:10vh; height:auto; !important;">
      <div class="modal-header">
        <h5 class="modal-title text-center" id="senadorModalLabel">senador</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body h-100">
        <h5 class="text-center"><strong>@{{senador.NomeParlamentar}}</strong></h5>
        <div class="row p-auto m-auto">
          <div class="col-lg-3">
            <div class="bg-dark" style="border-radius: 50%;width: 100px; height: 100px; overflow: hidden; border:2px solid rgba(111, 111, 111, .9);">
              <img width="100px" class=" m-0 p-0" src="@{{senador.ultimoStatus.urlFoto}}" alt="">
            </div>
          </div>
          <ul class="list-unstyled col-lg-6" style="font-size:.9em">
            <li class=""><b>Nome Civil:</b>  @{{senador.NomeParlamentar | lowercase}}</li>
            <li class=""><b>Sexo:</b>  @{{senador.sexo}}</li>
            <li class=""><b>Estado:</b>  @{{senador.ultimoStatus.siglaUf}}</li>
            <li class=""><b>Munícipio de Origem:</b>  @{{senador.municipioNascimento}}</li>
            <li class=""><b>Escolaridade:</b>  @{{senador.escolaridade}}</li>
            <li class=""><b>Situação:</b>  @{{senador.ultimoStatus.situacao}}</li>
            <li class=""><b>Data de Nascimento:</b>  @{{senador.dataNascimento | date : "dd/MM/y"}}</li>
          </ul>
          <div class="col-lg-3">
            <h5 class="text-center mb-4"><strong>Partido</strong></h5>
            <h4 class="text-center rounded-circle align-middle m-auto">
              <img class="m-auto img-responsive" width="100px" src="imgs/partidos/@{{senador.ultimoStatus.siglaPartido}}.png" alt="">
            </h4>
          </div>
        </div>
        <hr>

        <div class="row p-auto col-lg-12">
          <h4 class=" col-lg-12">Dados de Gabinete</h4>
          <ul class="list-unstyled col-lg-6 m-auto" style="font-size:.9em">
            <li class=""><b>Telefone: </b>  @{{senador.ultimoStatus.gabinete.telefone | lowercase}}</li>
            <li class=""><b>E-mail: </b>  @{{senador.ultimoStatus.gabinete.email | lowercase}}</li>
            <li class=""><b>Web Site: </b>  @{{senador.ultimoStatus.urlWebsite | lowercase}}</li>
            <li class=""><b>Rede Social: </b>  @{{senador.ultimoStatus.redeSocial | lowercase}}</li>
          </ul>
          <ul class="list-unstyled col-lg-6" style="font-size:.9em">
            <li class=""><b>Nome da Sala: </b>  @{{senador.ultimoStatus.gabinete.nome | lowercase}}</li>
            <li class=""><b>Prédio: </b>  @{{senador.ultimoStatus.gabinete.predio | lowercase}}</li>
            <li class=""><b>Sala: </b>  @{{senador.ultimoStatus.gabinete.sala | lowercase}}</li>
            <li class=""><b>Andar: </b>  @{{senador.ultimoStatus.gabinete.andar | lowercase}}</li>
          </ul>
        </div>

        <hr>

        <div class="row p-auto col-lg-12">
          <h4 class=" col-lg-12">Ultimas Despesas</h4>

          <table class="table table-bordered table-sm">
            <thead>
              <tr>
                <th>Descrição</th>
                <th>Mês</th>
                <th>Ano</th>
                <th>Estabelecimento</th>
                <th>Valor</th>
                <th>Data da Nota</th>
              </tr>
            </thead>
            <tbody>
              <tr  ng-repeat="despesa in senador_despesas" style="font-size:.9em">
                <td class=" text-capitalize">@{{despesa.tipoDespesa |lowercase}}</td>
                <td>@{{getMes(despesa.mes)}}</td>
                <td>@{{despesa.ano | lowercase}}</td>
                <td>@{{despesa.nomeFornecedor}}</td>
                <td>@{{despesa.valorDocumento | currency:'R$: ':2}}</td>
                <td>@{{despesa.dataDocumento | date : 'dd/MM/yyyy' }}</td>
              </tr>
            </tbody>
          </table>
        </div>

      </div>
      <div class="modal-footer">
        <!--<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>-->
      </div>
    </div>
  </div>
</div>

<!--
<table class="table table-bordered table-sm">
<thead>
<tr>
<th>Foto</th>
<th>Nome</th>
<th>Partido</th>
</tr>
</thead>
<tbody>
<tr ng-repeat="senador in senadores">
<td>
<div class="bg-dark" style="border-radius: 50%;width: 100px; height: 100px; overflow: hidden; border:2px solid rgba(111, 111, 111, .9);">
<img width="100px" class=" m-0 p-0" src="@{{senador.urlFoto}}" alt="">
</div>
</td>
<td>@{{senador.nome}}</td>
<td>@{{senador.siglaPartido}}</td>
</tr>
</tbody>
</table>
-->
</div>


@endsection

@section('script')

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
        console.log($scope.senadores);
      });

    };

$scope.getSiglas = function(){
  // $http.defaults.headers.get = { 'accept' : 'application/json' };
  $url = "https://legis.senado.gov.br/dadosabertos/senador/partidos";
  $http.get($url).then(function(response){
    $scope.siglas = response.data.ListaPartidos.Partidos.Partido;
    console.log($scope.siglas.Partido);
  });
};

$scope.getsenador = function($id){
  //console.log($id);

  $http.defaults.headers.get = { 'accept' : 'application/json' };
  $url = "https://dadosabertos.camara.leg.br/api/v2/senadores/" + $id;
  //console.log($url);
  $http.get($url).then(function(response){
    $scope.senador = response.data.dados;
  });
  $scope.getDespesas($id, 10);
};

$scope.getDespesas = function($idsenador, $qt) {
  $http.defaults.headers.get = { 'accept' : 'application/json' };
  $url = 'https://dadosabertos.camara.leg.br/api/v2/senadores/' + $idsenador + '/despesas?ordem=DESC&ordenarPor=dataDocumento'+ '&itens='+$qt;
  console.log($url);
  $http.get($url).then(function(response){
    $scope.senador_despesas = response.data.dados;
  });
}


$scope.getMes = function($mesNumber){
  var meses = ['0', 'Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'];
  return meses[$mesNumber];
};

}); // Fim do Controller
</script>
@endsection
