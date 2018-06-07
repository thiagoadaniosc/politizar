<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="/politizar_icon.png">
    <base href="/">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/themes/blue/pace-theme-minimal.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
	   <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
     <link rel="stylesheet" href="/css/app.css">
    <style type="text/css">
	  * {font-family: 'Source Sans Pro', sans-serif !important;}
      .menu-header {
        /* background-color: rgb(38, 50, 56,.85); */
        /* background-color:#F8F8F8; */
        /* background-color:rgba(40, 40, 42, 0.98); */
        /* background-color:#2e2e2e; */
        background-color: #2e2e2ee8;
        width: 100%;
        height: 80px;
      }

      .pace {
        position: fixed !important;
        z-index: 1 !important;
      }

      .pace-progress{
        background:#515fe0 !important;
        position:fixed !important;
        z-index:2000;
        top:0;
        right:100%;
        width:100%;
        height:5px !important;
      }

      .navbar-link {
        color:white !important;
        text-decoration: none;
        transition: 1s;
        background-color: transparent;
        font-weight: 10px;
        letter-spacing: 2px;
        margin:0px !important;
        font-size: .8em;
        border-bottom: 2px solid transparent;
        padding-bottom: 5px;
      }

      .navbar-link:hover {
        color: white !important;
        /* background-color: rgb(46, 73, 133); */
        border-bottom: 2px solid rgb(112, 123, 198);
        text-decoration: none;
      }

      .navbar .container {
        padding-left:20px;
        margin:0;
      }

      .login-bar {
        background-color: #e0e0e0;
      }

      .login-bar .btn {
        background-color: #48537d;
        border:0;
        width: 100px;
      }

      .current {
        border-bottom: 2px solid rgb(112, 123, 198);
        text-decoration: none;
      }


    </style>
    @yield('style')
    <title>{{$title}} - {{ $pagina }}</title>
  </head>
  <body ng-app="politizar">
    {{-- <nav class="col-lg-12 login-bar" style="height:50px">
        <a class="float-right pt-1" style="height:30px">Thiago Scheidt</a>
      <button type="button" style="height: 100%; position: absolute; right: 0;" class="btn btn-primary m-auto float-right rounded-0">
        Logar
      </button>
    </nav> --}}
    <nav class="navbar menu-header" ng-controller="navbarCtrl">
      <div class="container col-lg-12">
        <a href="/" class="navbar-brand text-white"><img src="imgs/logo.png" class="img-fluid pull-xs-left pt-1" alt="Politizar"></a>
        <div id="navbarNav">
          <ul class="navbar-nav d-inline">
            <li class="navbar-item d-inline p-2" ng-repeat="item in menu">
              <a href="@{{item.url}}" class="navbar-link text-white text-uppercase @{{ item.current }}">@{{item.nome}}</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    @yield('template')

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.10/angular.min.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://mathiasbynens.be/demo/jquery.smoothscroll.js">
    </script>
    <script type="text/javascript">
    $(function() {
      $('html').smoothScroll(500);
    });
    </script>
    <script>
    var app = angular.module("politizar", []);
    app.controller("navbarCtrl", function($scope){
      $scope.pagina = '{{$pagina}}';
      $scope.menu = [
        {nome: 'Home', url:'/', current: ($scope.pagina == 'Home') ? 'current' : ''},

        {nome: 'Deputados', url:'/#home-deputados', current: ($scope.pagina == 'Deputados') ? 'current' : ''},

        {nome: 'Senadores', url:'/#home-senadores', current: ($scope.pagina == 'Senadores') ? 'current' : ''},

        {nome: 'Vereadores', url:'/#home-vereadores', current: ($scope.pagina == 'Vereadores') ? 'current' : ''},

        {nome: 'Executivo', url:'/#home-executivo', current: ($scope.pagina == 'Executivo') ? 'current' : ''},

        {nome: 'Partidos', url:'/partidos', current: ($scope.pagina == 'Partidos') ? 'current' : ''},
      ];
    });
    </script>
    @yield('script')
  </body>
</html>
