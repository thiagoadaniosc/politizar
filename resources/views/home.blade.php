<?php $title = 'Politizar'?>
<?php $pagina = 'Home' ?>
@extends('template')

@section('style')
  <style type="text/css">
  .test {
    text-align: center;
  }

  body {
    background-image: url('http://www.politicacomk.com.br/wp-content/uploads/2016/09/congresso-nacional.jpg');
    /* background-image: url('https://4.bp.blogspot.com/-gSP7Wu5Wzms/WaNXIacxmRI/AAAAAAAABe8/s5CYtoabIeYzBz5xUZEnVlmYrQJeavimwCLcBGAs/s1600/DSCN0034.jpg'); */
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

  div#home-main {
    padding-top: 20px;
    /* padding-left: 0 !important; */
    /* padding-right: 0 !important; */
    background-color: rgba(4, 4, 4, .2);
  }

  div#home-deputados {
    /* background-color: #0E0E0E; */
    background-color: rgba(46, 77, 148, .95);
    padding: 80px;
    padding-bottom: 80px;
    margin-bottom: 20px;
    border-right: 10px solid white;
    border-left: 10px solid white;
    border-radius: 5px;
  }

  .btn-deputados {
    background-color: transparent;
    border: 2px solid white;
    border-radius: 0;
    transition: 0.5s;
  }

  .btn-deputados:hover {
    background-color: white;
    color: black;
    border: 2px solid white;
  }

  div#home-senadores {
    /* background-color: rgb(55, 180, 90, .95) !important; */
    /* background-color: rgba(14, 14, 14, .95) !important; */
    background-color: rgba(14, 14, 14, .95) !important;
    /* background-color: transparent !important; */
    width: 100%;
    height: auto;
    padding: 80px;
    padding-bottom: 80px;
    margin-bottom: 20px;
    border-right: 10px solid white;
    border-left: 10px solid white;
    border-radius: 5px;
  }

  .btn-senadores {
    background-color: transparent;
    border: 2px solid white;
    border-radius: 0;
    transition: 0.5s;
  }

  .btn-senadores:hover {
    background-color: white;
    /* color:rgb(48, 156, 88); */
    color: black;
    border: 2px solid white;
  }

  div#home-vereadores {
    /* background-color: rgb(1, 87, 156, 1) !important; */
    background-color: rgba(240, 240, 240, .95) !important;
    width: 100%;
    height: auto;
    padding: 80px;
    padding-bottom: 80px;
    margin-bottom: 20px;
    /* margin-bottom: 20px; */
    border-right: 10px solid rgb(62, 101, 65);
    border-left: 10px solid rgb(62, 101, 65);
    border-radius: 5px;
  }

  div#home-vereadores h2 {
    color: rgb(41, 96, 45) !important;
  }

  div#home-vereadores .border-title {
    background-color: rgb(41, 96, 45);
    width: 100px;
    height: 2px;
    margin-bottom: 20px;
  }

  div#home-vereadores p {
    color: rgb(43, 61, 43) !important;
  }

  .border-title {
    background-color: rgb(218, 218, 218);
    width: 100px;
    height: 2px;
    margin-bottom: 20px;
  }

  .btn-vereadores {
    background-color: rgba(74, 159, 85, 0.95);
    border: 1px solid transparent;
    border-radius: 0;
    transition: 0.5s;
    color: white !important;
  }

  .btn-vereadores:hover {
    background-color: white;
    color: rgba(74, 159, 85, 0.98) !important;
    border: 1px solid rgba(74, 159, 85, 0.98);
  }


  div#home-executivo {
    /* background-color: rgba(33, 33, 33, .95) !important; */
    /* background-color:  rgba(0, 0, 0, 0.95) !important; */
    /* background-color: rgba(27, 113, 65, .95); */
    background-color: rgba(18, 51, 38, 0.95);
    width: 100%;
    height: auto;
    padding: 80px;
    padding-bottom: 80px;
    margin-bottom: 20px;
    border-right: 10px solid white;
    border-left: 10px solid white;
    border-radius: 5px;
  }

  .btn-executivo {
    background-color: transparent;
    border: 2px solid white;
    border-radius: 0;
    transition: 0.5s;
  }

  .btn-executivo:hover {
    background-color: white;
    color: rgb(33, 33, 33);
    border: 2px solid white;
  }

  div#home-stf {
    /* background-color:  rgba(255, 255, 255, 1) !important; */
    background-color: rgba(249, 249, 249, .95) !important;
    width: 100%;
    height: auto;
    padding: 80px;
    padding-bottom: 80px;
    margin-bottom: 20px;
    border-right: 10px solid rgb(43, 105, 171);
    border-left: 10px solid rgb(43, 105, 171);
    border-radius: 5px;
  }

  div#home-stf h2 {
    color: rgb(43, 105, 171) !important;
  }

  div#home-stf p {
    color: rgb(117, 116, 116) !important;
  }

  div#home-stf .border-title {
    background-color: rgb(43, 105, 171) !important;
  }

  .btn-stf {
    background-color: rgb(43, 105, 171);
    border: 1px solid rgb(43, 105, 171);
    border-radius: 0;
    transition: 0.5s;
  }

  .btn-stf:hover {
    background-color: white;
    color: rgb(43, 105, 171) !important;
    border: 1px solid rgb(43, 105, 171);
  }
  </style>
@endsection


@section('template')

  <div id="home-main" class="col-lg-12">

    <div id="home-deputados" class="animated bounceInLeft ">
      <main class="container">
        <h2 class="text-white text-uppercase text-white">Conheça seus Deputados</h2>
        <div class="border-title"></div>
        <div class="row">
          <div class="col-lg-3 pl-0">
            <img src="imgs/congresso.png" height="150px" class="col-lg-12" alt="">
          </div>
          <p class="text-white text-justify col-lg-9 float-right">O Poder Legislativo, segundo o art. 44 da Constituição Federal de 1988, é exercido pelo Congresso nacional, que se compõe da Câmara dos Deputados e do Senado Federal. Portanto, se organiza como um poder bicameral. A Câmara é composta por
            representantes do povo, eleitos pelo sistema proporcional em cada estado, em cada território e no Distrito Federal. São 513 deputados federais, com mandato de quatro anos. O número de deputados é proporcional à população do estado
            ou do Distrito Federal, com o limite mínimo de oito e máximo de setenta deputados para cada um deles.</p>

            <div class="col-lg-12 col-md-12 mt-3 float-right" style="height:auto;">
              <button type="button" onclick="return window.location = '/deputados'" class="btn btn-primary float-right btn-deputados col-md-12 col-sm-12 col-lg-2" name="button">Conhecer Deputados</button>
            </div>

          </div>
        </main>
      </div>

      <div id="home-senadores" class="bg-dark animated bounceInLeft">
        <main class="container">
          <h2 class="pt-3 text-uppercase text-white">Conheça seus Senadores</h2>
          <div class="border-title"></div>
          <div class="row">


            <div class="col-lg-2 pl-0">
              <img src="imgs/senado.png" widht="100px" alt="www.flaticon.com" class="m-auto p-auto rounded col-lg-12" height="150px" alt="">
            </div>
            <p class="text-white text-justify col-lg-10 float-right">O Senado Federal é a câmara alta do Congresso Nacional do Brasil e, ao lado da Câmara dos Deputados, faz parte do Poder Legislativo da União.
              <br/>O Senado Federal tem sido, ao longo de seus quase 200 anos de existência, um dos pilares da estabilidade institucional do Brasil. Para além de sua inquestionável importância política, ele possui funções legislativas de caráter mais
              geral que são compartilhadas com a Câmara dos Deputados, outras, são de sua exclusiva competência.</p>

              <div class="col-lg-12 col-md-12 mt-3 float-right" style="height:auto;">
                <button type="button" onclick="return window.location = '/senadores'" class="btn btn-primary float-right btn-senadores col-md-12 col-sm-12 col-lg-2" name="button">Conhecer Senadores</button>
              </div>

            </div>
          </main>
        </div>

        <div id="home-vereadores" class="bg-dark animated bounceInLeft">
          <main class="container">
            <h2 class="pt-3 text-uppercase text-white">Conheça seus Vereadores - São José SC</h2>
            <div class="border-title"></div>

            <div class="row">


              <div class="col-lg-2 pl-0">
                <img src="imgs/vereadores_sj.png" alt="www.flaticon.com" class="m-auto p-auto rounded rounded col-lg-12" height="180px" alt="">
              </div>

              <p class="text-justify text-white float-right col-lg-10">
                O Poder Legislativo do Município é exercido pela Câmara Municipal. É composta por 19 vereadores, representantes das comunidades, eleitos pelo voto direto e secreto, no sistema proporcional, e está na 19º Legislatura (2017 – 2020). Os vereadores têm a
                função de fiscalizar o Poder Executivo e produzir leis, preservando o bem da comunidade. Em sua área de atuação, a Câmara Municipal propõe, delibera e vota Projetos de Leis, Projetos de Decretos Legislativos, Projetos de Resoluções e outras
                matérias.
              </p>

              <div class="col-lg-12 col-md-12 mt-3 float-right" style="height:auto;">
                <button type="button" onclick="return window.location = '/vereadores'" class="btn btn-primary float-right col-md-12 col-sm-12 col-lg-2 btn-vereadores" name="button">Conhecer Vereadores</button>
              </div>

            </div>
          </main>
        </div>

        <div id="home-executivo" class="animated bounceInLeft ">
          <main class="container">
            <h2 class="text-white text-uppercase text-white">Poder Executivo</h2>
            <div class="border-title"></div>
            <div class="row">


              <div class="col-lg-3 pl-0">
                <img src="imgs/executivo.png" class="col-lg-12 m-auto p-auto" height="120px" alt="">
              </div>

              <p class="text-white text-justify col-lg-9 float-right">O Poder Executivo é o órgão e autoridade pública na qual a possui a função de administrativa, soberania popular e da representação.</br>
                O Poder Executivo é exercido pelo Presidente da República, auxiliado pelos Ministros de Estado.
              </p>

              <div class="col-lg-12 col-md-12 mt-3 float-right" style="height:auto;">
                <button type="button" onclick="return window.location = '/executivo'" class="btn btn-primary float-right col-md-12 col-sm-12 col-lg-2 btn-executivo" name="button">Conhecer o Executivo</button>
              </div>

            </div>
          </main>
        </div>



        <div id="home-stf" class="animated bounceInLeft ">
          <main class="container">
            <h2 class="text-white text-uppercase text-white">PODER JUDICIÁRIO</h2>
            <div class="border-title"></div>
            <div class="row">

              <div class="col-lg-3 pl-0">
                <img src="imgs/stf.png" class="col-lg-12 m-auto p-auto" alt="https://pt.vecteezy.com/" height="150px" width="200px" alt="">

              </div>

              <p class="text-white text-justify col-lg-9 float-right">
                O poder judiciário é aquele que é responsável por interpretar e julgar as causas de acordo com a constituição do estado. É formado por magistrados tais como, juízes, desembargadores, promotores de justiça e ministros. É um poder tido como independente
                aos outros, visto que têm por objetivo julgar com imparcialidade, inclusive causas inerentes ao Executivo e ao Legislativo além das próprias pautas e as de interesses públicos e individuais, próprios do Judiciário .
              </p>

              <div class="col-lg-12 col-md-12 mt-3 float-right" style="height:auto;">
                <button type="button" onclick="return window.location = '/stf'" class="btn btn-primary float-right col-md-12 col-sm-12 col-lg-2 btn-stf" name="button">Conhecer o Judiciário</button>
              </div>

            </div>
          </main>
        </div>

      </div>
    @endsection
