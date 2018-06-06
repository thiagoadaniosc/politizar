<?php $title = 'Politizar'?>
@extends('template')

@section('style')

@endsection

@section('template')
  <div class="" ng-controller="despesasCtrl">

  </div>
@endsection

@section('script')
<script type="text/javascript">
  app.controller('despesasCtrl', function($scope){
    $scope.idDeputado = {{$idDeputado}};
  });
</script>
@endsection
