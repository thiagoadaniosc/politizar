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
    filter:blur(0px);
    position: absolute;
    z-index: -1;
  }
  .partidos-header {
    color: white;
    background-color: rgb(74, 74, 74);;
    border-bottom: 4px solid rgb(34, 34, 34)
  }

  a {
    text-decoration: none !important;
  }

  .partido-card {
    transition: 1s;
    background-color: white;
    border-radius: 0;
  }

  .partido-card:hover {
    transform: scale(1.05);
    border-color:#545454;
  }

  .partido-header {
    position: absolute;
    top:0;
    width: 98%;
    left:0;
    font-size: 18px;
  }

  .partido-footer{
    position: absolute;
    bottom:2px;
    width: 98%;
    left:4px;
    font-size: 18px;
  }

  li:nth-child(even) .partido-card {
    /* background-color: #0D47A1; */
    /* background-color: rgb(203, 203, 203); */
  }
  li:nth-child(odd) .partido-card {
    /* background-color: #5e5e5e; */
    /* background-color: rgb(195, 226, 241); */
    background-color: rgb(226, 226, 226);
  }

  </style>
@endsection

@section('template')

  <div class="col-lg-11 pt-0 p-4 mt-4 mb-4 ml-auto mr-auto" style="background-color:#F5F5F5">

    <h4 class="col-lg-12 p-2 text-center partidos-header">Partidos Políticos</h4>
    <span class="badge badge-dark float-left rounded-0">Total de partidos: <span class="counter">{{ $partidos_total }} </span></span>

    <span class="badge badge-danger float-left ml-1 rounded-0">Partidos de Esquerda: <span class="counter">{{ $partidos_esquerda}}</span></span>
    <span class="badge badge-danger float-left ml-1 rounded-0">Partidos de Centro-Esquerda: <span class="counter">{{ $partidos_centro_esquerda }}</span></span>

    <span class="badge badge-primary float-right ml-1 rounded-0">Partidos de Direita: <span class="counter">{{$partidos_direita}}</span></span>
    <span class="badge badge-secondary float-right ml-1 rounded-0">Partidos de Centro-Direita: <span class="counter">{{ $partidos_centro_direita }}</span></span>
    <span class="badge badge-warning float-right ml-1 rounded-0">Partidos de Centro: <span class="counter">{{ $partidos_centro }}</span></span>

    <hr>
    <hr>
    <ul class="row lista-partidos list-unstyled">
    @foreach ($partidos as $partido)

      <li class="col-lg-4 col-xl-3 mb-4">
        <a href="/partido/{{ $partido->id }}">
          <div class="col-lg-12 row partido-card rounded card m-0 p-0" style="height:200px">
            <div class="text-white m-1 partido-header">
              <span class="badge badge-primary float-left rounded-0">{{$partido->sigla}}</span>
              <span class="badge badge-secondary rounded-circle m-0 float-right"><span class="counter">{{ $partido->numero_legenda }}</span></span>
            </div>
            <img class="m-auto" width="120" src="/imgs/partidos/{{$partido->sigla}}.png" alt="">
            <div class="partido-footer">
              @if ($partido->espectro_politico == 'Centro-Esquerda')
                <span class="badge badge-danger rounded-0">{{ $partido->espectro_politico }}</span>
              @elseif ($partido->espectro_politico == 'Esquerda')
                <span class="badge badge-danger rounded-0">{{ $partido->espectro_politico }}</span>
              @elseif ($partido->espectro_politico == 'Centro-Direita')
                <span class="badge badge-secondary rounded-0">{{ $partido->espectro_politico }}</span>
              @elseif ($partido->espectro_politico == 'Direita')
                <span class="badge badge-primary rounded-0">{{ $partido->espectro_politico }}</span>
              @else
                <span class="badge badge-warning rounded-0">{{ $partido->espectro_politico }}</span>
              @endif
            </div>
          </div>
        </a>
      </li>

    @endforeach
      </ul>
  </div>

@endsection

@section('script')


 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-migrate/3.0.1/jquery-migrate.min.js"></script>
 {{-- <script src="http://code.jquery.com/jquery-migrate-3.0.0.js"></script> --}}
 <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.js"></script>
<script type="text/javascript">
$(document).ready(function($) {
  $('.counter').counterUp({
      delay: 20,
      time: 1000
  });
});
</script>
@endsection
