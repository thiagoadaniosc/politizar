<?php $title = 'Politizar'?>
<?php $pagina = 'Deputados' ?>
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
  .deputados {
    transition: 1s;
  }
  .deputados:hover {
    background-color: rgb(232, 232, 232) !important;
    transform:scale(1.03);
  }

  .cursor-pointer {
    cursor: pointer;
  }

  .deputados-header {
    color: white;
    /* background-color: rgba(48, 48, 48, 1); */
    background-color: rgba(46, 77, 148, .95);
    border-bottom: 4px solid rgba(43, 62, 103, 0.95)
  }

  </style>
@endsection

@section('template')

  <div class="col-lg-11 pt-0 p-4 mt-4 mb-4 ml-auto mr-auto" style="background-color:#EEEEEE" ng-controller="deputadosCtrl" ng-init="pesquisar();">

    <h4 class="col-lg-12 p-2 text-center deputados-header">Deputados Federais</h4>

    <div class="row mb-1 pb-1 p-0 m-0 justify-content-start">

      <input type="pesquisa" name="pesquisa" ng-change="pesquisar($event)" placeholder="Pesquisa..." ng-model="pesquisa" class="form-control col-lg-4 rounded-0">

      <select class="form-control col-lg-4 rounded-0" ng-model="pesquisa_estado" ng-change="pesquisar()" ng-init="getEstados()" ng-options="estado.sigla for estado in estados">
        <option value="" ng-selected="true">Estado</option>
      </select>

      <select ng-init = "getSiglas()"class="form-control col-lg-4 rounded-0"  ng-options="sigla.sigla for sigla in siglas" ng-model="sigla" ng-change="pesquisar()">
        <option value="" ng-selected="true">Partido</option>
      </select>

    </div>
    <!--<p class="text-center">Pesquisa: @{{pesquisa}} - @{{pesquisa_tipo}}</p>-->
    <div class="bg-light border row mb-2 pt-2 m-0 col-lg-12">
      <div class="col-lg-6"><h4 class="text-center text-secondary cursor-pointer">Deputado</h4></div>
      <div class="col-lg-6"><h4 class="text-center text-secondary cursor-pointer">Partido</h4></div>
    </div>

    <div class="deputados border p-2 mb-3 row m-0 cursor-pointer bg-white" ng-click="getDeputado(deputado.id);" ng-repeat="deputado in deputados"
    data-toggle="modal" data-target="#deputadoModal">
    <div class="col-lg-2 m-auto">
      <div class="bg-dark m-auto" style="border-radius: 50%;width: 100px; height: 100px; overflow: hidden; border:2px solid rgba(111, 111, 111, .9);">
        <img width="100px" class=" m-0 p-0" src="@{{deputado.urlFoto}}" alt="">
      </div>
    </div>
    <div class="col-lg-5 deputado-informacoes">
      <ul class="list-unstyled text-capitalize">
        <li><span class="badge badge-dark rounded-0"><strong>Nome:</strong> @{{deputado.nome | lowercase}}</span></li>
        <li><span class="badge badge-primary rounded-0"><strong>Estado: </strong> @{{deputado.siglaUf}}</span></li>
        <li><strong>Lesgislatura:</strong> @{{deputado.idLegislatura}}</li>
        <li><strong>Partido: </strong> @{{deputado.siglaPartido}}</li>
      </ul>
    </div>

    <div class="col-lg-5 float-right m-auto deputado-partido">
      <h4 class="text-center rounded-circle">
        <img class="m-auto img-responsive" width="100px" src="imgs/partidos/@{{deputado.siglaPartido}}.png" alt="">
      </h4>

      <!--
      <ul class="list-unstyled">
      <li>Nome: @{{deputado.nome}}</li>
      <li>Estado: @{{deputado.nome}}</li>
      <li>Lesgislatura: @{{deputado.nome}}</li>
      <li>Sexo: @{{deputado.nome}}</li>
      <li>Partido: @{{deputado.nome}}</li>
    </ul>
  -->

</div>
</div>


<!-- Modal -->
<div class="modal fade m-auto" id="deputadoModal" tabindex="-1" role="dialog" aria-labelledby="deputadoModal" aria-hidden="true">
  <div class="modal-dialog" role="document" style="width: 50vw; max-width: 50vw;">
    <div class="modal-content col-lg-12" style="margin-top:10vh; height:auto;">
      <div class="modal-header">
        <h5 class="modal-title text-center" id="deputadoModalLabel">Deputado</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body h-100">
        <h5 class="text-center"><strong>@{{deputado.ultimoStatus.nome}}</strong></h5>
        <div class="row p-auto m-auto">
          <div class="col-lg-3">
            <div class="bg-dark" style="border-radius: 50%;width: 100px; height: 100px; overflow: hidden; border:2px solid rgba(111, 111, 111, .9);">
              <img width="100px" class=" m-0 p-0" src="@{{deputado.ultimoStatus.urlFoto}}" alt="">
            </div>
          </div>
          <ul class="list-unstyled col-lg-6" style="font-size:.9em">
            <li class=""><b>Nome Civil:</b>  @{{deputado.nomeCivil | lowercase}}</li>
            <li class=""><b>Sexo:</b>  @{{deputado.sexo}}</li>
            <li class=""><b>Estado:</b>  @{{deputado.ultimoStatus.siglaUf}}</li>
            <li class=""><b>Munícipio de Origem:</b>  @{{deputado.municipioNascimento}}</li>
            <li class=""><b>Escolaridade:</b>  @{{deputado.escolaridade}}</li>
            <li class=""><b>Situação:</b>  @{{deputado.ultimoStatus.situacao}}</li>
            <li class=""><b>Data de Nascimento:</b>  @{{deputado.dataNascimento | date : "dd/MM/y"}}</li>
          </ul>
          <div class="col-lg-3">
            <h5 class="text-center mb-4"><strong>Partido</strong></h5>
            <h4 class="text-center rounded-circle align-middle m-auto">
              <img class="m-auto img-responsive" width="100px" src="imgs/partidos/@{{deputado.ultimoStatus.siglaPartido}}.png" alt="">
            </h4>
          </div>
        </div>
        <hr>

        <div class="row p-auto col-lg-12">
          <h4 class=" col-lg-12">Dados de Gabinete</h4>
          <ul class="list-unstyled col-lg-6 m-auto" style="font-size:.9em">
            <li class=""><b>Telefone: </b>  @{{deputado.ultimoStatus.gabinete.telefone | lowercase}}</li>
            <li class=""><b>E-mail: </b>  @{{deputado.ultimoStatus.gabinete.email | lowercase}}</li>
            <li class=""><b>Web Site: </b>  @{{deputado.ultimoStatus.urlWebsite | lowercase}}</li>
            <li class=""><b>Rede Social: </b>  @{{deputado.ultimoStatus.redeSocial | lowercase}}</li>
          </ul>
          <ul class="list-unstyled col-lg-6" style="font-size:.9em">
            <li class=""><b>Nome da Sala: </b>  @{{deputado.ultimoStatus.gabinete.nome | lowercase}}</li>
            <li class=""><b>Prédio: </b>  @{{deputado.ultimoStatus.gabinete.predio | lowercase}}</li>
            <li class=""><b>Sala: </b>  @{{deputado.ultimoStatus.gabinete.sala | lowercase}}</li>
            <li class=""><b>Andar: </b>  @{{deputado.ultimoStatus.gabinete.andar | lowercase}}</li>
          </ul>
        </div>

        <hr>

        <div class="row p-auto col-lg-12 m-0" style="overflow: auto;">
          <h4 class=" col-lg-12 pt-1 pb-1 bg-secondary text-white">Ultimas Despesas</h4>

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
              <tr  ng-repeat="despesa in deputado_despesas" style="font-size:.9em">
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
        {{-- <hr> --}}
        <div class="row p-auto col-lg-12 m-0" style="overflow: auto;">
          <h4 class="col-lg-12 pt-1 pb-1 bg-dark text-white">Ultimas Propostas</h4>

          <table class="table table-bordered table-sm">
            <thead>
              <tr>
                <th style="width: 80%;">Descrição</th>
                {{-- <th>Mês</th> --}}
                <th class="text-center">Tipo</th>
                <th class="text-center">Ano</th>
                {{-- <th>Valor</th> --}}
                {{-- <th>Data da Nota</th> --}}
              </tr>
            </thead>
            <tbody>
              <tr  ng-repeat="preposicao in deputado_preposicoes" style="font-size:.9em">
                <td class="text-justify">@{{preposicao.ementa}}</td>
                {{-- <td>@{{getMes(despesa.mes)}}</td> --}}
                <td class="text-center">@{{preposicao.siglaTipo | uppercase}}</td>
                <td class="text-center">@{{preposicao.ano}}</td>
                {{-- <td>@{{preposicao.valorDocumento | currency:'R$: ':2}}</td> --}}
                {{-- <td>@{{preposicao.dataDocumento | date : 'dd/MM/yyyy' }}</td> --}}
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
<tr ng-repeat="deputado in deputados">
<td>
<div class="bg-dark" style="border-radius: 50%;width: 100px; height: 100px; overflow: hidden; border:2px solid rgba(111, 111, 111, .9);">
<img width="100px" class=" m-0 p-0" src="@{{deputado.urlFoto}}" alt="">
</div>
</td>
<td>@{{deputado.nome}}</td>
<td>@{{deputado.siglaPartido}}</td>
</tr>
</tbody>
</table>
-->
<div class="row justify-content-center">
  <nav aria-label="...">
    <ul class="pagination">
      <li class="page-item" id="previous">
        <a class="page-link" ng-click="previous_page()" tabindex="0">Anterior</a>
      </li>
      <!--
      <li class="page-item"><a class="page-link" href="#">1</a></li>
      <li class="page-item active">
      <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
    </li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
  -->
  <li class="page-item" id="next">
    <a class="page-link" ng-click="next_page()" href="">Próximo</a>
  </li>
</ul>
</nav>
</div>
</div>


@endsection

@section('script')

  <script type="text/javascript">
  app.controller('deputadosCtrl', function($scope, $http){
    $scope.pesquisar = function (){

      $http.defaults.headers.get = { 'accept' : 'application/json' };

      if ($scope.pesquisa == "" || $scope.pesquisa == null) {
        $url2 ='https://dadosabertos.camara.leg.br/api/v2/deputados?ordenarPor=nome&itens=15';
        //console.log('pesquisa is null');
      } else {

        if ($scope.pesquisa_tipo == 'nome') {
          $url2 ='https://dadosabertos.camara.leg.br/api/v2/deputados?nome=' + $scope.pesquisa +'&ordenarPor=nome';
        } else if ($scope.pesquisa_tipo == 'sigla') {
          $url2 ='https://dadosabertos.camara.leg.br/api/v2/deputados?siglaPartido=' + $scope.pesquisa +'&ordenarPor=siglaPartido';
        } else {
          $url2 ='https://dadosabertos.camara.leg.br/api/v2/deputados?nome=' + $scope.pesquisa +'&ordenarPor=nome';
        }
      }

      if ($scope.sigla != null) {
        $url2 = $url2 + '&siglaPartido=' +$scope.sigla.sigla;
      }

      $http.get($url2).then(function(response){
        $scope.deputados = response.data.dados;
        $scope.links = response.data.links;
        $scope.previous = false;
        $scope.next = false;
        $scope.last = false;
        $scope.self = false;
        $scope.first = false;
        console.log($url2);

        angular.forEach($scope.deputados, function($value) {
          var partido = $scope.getPartido($value.uriPartido);
          //console.log(partido);
        });

        for (var i = $scope.links.length - 1; i >= 0; i--) {

          if ($scope.links[i].rel == 'next') {
            $scope.next = $scope.links[i].href;
          } else if ($scope.links[i].rel == 'previous') {
            $scope.previous = $scope.links[i].href;
          } else if ($scope.links[i].rel == 'last') {
            $scope.last = $scope.links[i].href;
          } else if ($scope.links[i].rel == 'self') {
            $scope.self = $scope.links[i].href;
          } else if ($scope.links[i].rel == 'first') {
            $scope.first = $scope.links[i].href;
          }

        }

        if ($scope.previous == false || $scope.self == $scope.first){
          angular.element('#previous').addClass('disabled');
        } else {
          angular.element('#previous').removeClass('disabled');
        }

        if ($scope.next == false || $scope.next == $scope.self || $scope.self == $scope.last){
          angular.element('#next').addClass('disabled');
        } else {
          angular.element('#next').removeClass('disabled');
        }

      });
    };

    /*$scope.deputados = [];

    $url = 'http://phpdozeroaoprofissional.com.br/testeangularjs.php';
    $url2 ='https://dadosabertos.camara.leg.br/api/v2/deputados?ordenarPor=nome&itens=20';
    $http.defaults.headers.get = { 'accept' : 'application/json' };

    $http.get($url2).then(function(response){
    $scope.deputados = response.data.dados;
    $scope.links = response.data.links;

    for (var i = $scope.links.length - 1; i >= 0; i--) {

    if ($scope.links[i].rel == 'next') {
    $scope.next = $scope.links[i].href;
    console.log($scope.next);

  } else if ($scope.links[i].rel == 'previous') {
  $scope.previous = $scope.links[i].href;
  console.log($scope.previous)
}
}
});
*/


$scope.next_page = function(){

  $url2 = $scope.next;

  $http.get($url2).then(function(response){
    $scope.deputados = response.data.dados;
    $scope.links = response.data.links;

    for (var i = $scope.links.length - 1; i >= 0; i--) {

      if ($scope.links[i].rel == 'next') {
        $scope.next = $scope.links[i].href;
        console.log($scope.next);

      } else if ($scope.links[i].rel == 'previous') {
        $scope.previous = $scope.links[i].href;
      } else if ($scope.links[i].rel == 'last') {
        $scope.last = $scope.links[i].href;
      } else if ($scope.links[i].rel == 'self') {
        $scope.self = $scope.links[i].href;
      } else if ($scope.links[i].rel == 'first') {
        $scope.first = $scope.links[i].href;
      }
    }

    if ($scope.previous == false || $scope.self == $scope.first){
      angular.element('#previous').addClass('disabled');
    } else {
      angular.element('#previous').removeClass('disabled');
    }

    if ($scope.next == false || $scope.self == $scope.last){
      angular.element('#next').addClass('disabled');
    } else {
      angular.element('#next').removeClass('disabled');
    }

  });
};

$scope.previous_page = function (){
  $url2 = $scope.previous;

  $http.get($url2).then(function(response){
    $scope.deputados = response.data.dados;
    $scope.links = response.data.links;

    for (var i = $scope.links.length - 1; i >= 0; i--) {

      if ($scope.links[i].rel == 'next') {
        $scope.next = $scope.links[i].href;
        console.log($scope.next);

      } else if ($scope.links[i].rel == 'previous') {
        $scope.previous = $scope.links[i].href;
      }  else if ($scope.links[i].rel == 'last') {
        $scope.last = $scope.links[i].href;
      } else if ($scope.links[i].rel == 'self') {
        $scope.self = $scope.links[i].href;
      } else if ($scope.links[i].rel == 'first') {
        $scope.first = $scope.links[i].href;
      }
    }

    if ($scope.previous == false || $scope.self  == $scope.first){
      angular.element('#previous').addClass('disabled');
    } else {
      angular.element('#previous').removeClass('disabled');
    }

    if ($scope.next == false || $scope.self == $scope.last){
      angular.element('#next').addClass('disabled');
    } else {
      angular.element('#next').removeClass('disabled');
    }

  });
};

$scope.getSiglas = function(){
  $http.defaults.headers.get = { 'accept' : 'application/json' };
  $url = "https://dadosabertos.camara.leg.br/api/v2/partidos?ordem=ASC&ordenarPor=sigla&itens=35";
  $http.get($url).then(function(response){
    $scope.siglas = response.data.dados;
  });
};

$scope.getEstados = function(){
  $http.defaults.headers.get = { 'accept' : 'application/json' };
  $url = "https://dadosabertos.camara.leg.br/api/v2/referencias/uf";
  $http.get($url).then(function(response){
    $scope.estados = response.data.dados;
  });
};

$scope.getDeputado = function($id){
  //console.log($id);

  $http.defaults.headers.get = { 'accept' : 'application/json' };
  $url = "https://dadosabertos.camara.leg.br/api/v2/deputados/" + $id;
  //console.log($url);
  $http.get($url).then(function(response){
    $scope.deputado = response.data.dados;
  });
  $scope.getDespesas($id, 10);
  $scope.getPreposicoes($id, 10);
};

$scope.getDespesas = function($idDeputado, $qt) {
  $http.defaults.headers.get = { 'accept' : 'application/json' };
  $url = 'https://dadosabertos.camara.leg.br/api/v2/deputados/' + $idDeputado + '/despesas?ordem=DESC&ordenarPor=dataDocumento'+ '&itens='+$qt;
      console.log($url);
  //console.log($url);
  $http.get($url).then(function(response){
    $scope.deputado_despesas = response.data.dados;

  });
}

$scope.getPartido = function($uriPartido){
  $http.defaults.headers.get = { 'accept' : 'application/json' };
  var res =  $http.get($uriPartido).then(function(response){
    return response.data.dados.urlLogo;
  });

};

$scope.getPreposicoes = function ($idDeputado, $qt){
  $url = 'https://dadosabertos.camara.leg.br/api/v2/proposicoes?idAutor=' + $idDeputado +  '+&ordem=DESC&ordenarPor=id&itens=' + $qt;
      console.log($url);
  $http.get($url).then(function(response){
    $scope.deputado_preposicoes = response.data.dados;
    console.log($scope.deputado_preposicoes);
  });

};

$scope.getMes = function($mesNumber){
  var meses = ['0', 'Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'];
  return meses[$mesNumber];
};

}); // Fim do Controller
</script>
@endsection
