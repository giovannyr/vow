<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>PapeletaVotacionOficiales</title>
        <link rel="stylesheet" href="css/bootstrap.css">
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.js"></script>
        <style>
            html,body{
                width: 100%;
                height: 100%;
                margin: 0;
              // background: url("imag/Elecciones.png");

            }
            .container{
                height: 100%;
            }
            .container > div{
                background-color:gray;
                height: 80%;
            }
            .fimg{
                height: 70%;
            }
            .fimg > .row{
                height: 100%;
            }
            .vwhite{
                height: 10%;
                padding-top: 2%;
                background-color: red;
            }
            .photoCont{
                height: 85%;
            }
            .btnCont{
                height: 15%;
            }
            .photoCont > div{
                height: 100%;
            }
            .imgCont{
                margin: 5% 3%;
                height: 80%;
                background-color: white;
            }
            .vblc{
                height: 85%;
            }
            .vblc > div{
                height: 100%;
            }
            h1{
                font-size: 1.5em;
            }
            h2{
            font-size: 0.99em;
            }
            H3{
            font-size: 1.2em;
            }
            .imgcenter{
                display: block;
                margin-left: auto;
                margin-right: auto;
                border:none;
            }
            .banner{
                box-shadow: 2px 2px 5px #999;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <img src="imag/banner.png" alt="Banner" class="imgcenter"/>
            <header  class="banner" align="center">
                <h1><u><b>CATEGORIA DE SUBOFICIALES CON ASIGNACIÓN DE RETIRO</b></u> </h1>
                <h2>ELECCIONES REPRESENTANTES ANTE EL CONSEJO DIRECTIVO DE CREMIL DEL 01 DE ABRIL DE 2016 AL 31 DE MARZO DE 2018</h2>
                <h3><b>MARQUE CON UNA “X” UN SOLO RECUADRO</b></h3>
            </header>
            <div class="row">
                  <div class="col-md-6 col-sm-6 fimg" style="background-color: yellow">
                       <div class="row">
                           <div class="col-md-12 col-sm-6 photoCont">
                                <div class="col-md-12 col-sm-6">
                                    <div class="imgCont"><img src="imag/subofc1.png" alt="Oficial" /></div>
                                </div>
                           </div>
                           <div class="col-md-12 col-sm-6 btnCont">
                               <button class="btn btn-default btn-sm center-block" type="submit">Candidato1</button>
                           </div>
                       </div>
                  </div>
                  <div class="col-md-6 col-sm-6 fimg" style="background-color: blue">
                      <div class="row">
                          <div class="col-md-12 col-sm-6 photoCont">
                              <div class="col-md-12 col-sm-6">
                                  <div class="imgCont"><img src="imag/subofc2.png" alt="Suboficial" /></div>
                              </div>
                          </div>
                          <div class="col-md-12 col-sm-6 btnCont">
                              <button class="btn btn-default btn-sm center-block" type="submit">Candidato2</button>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-6 col-sm-6 col-md-offset-3 fimg" style="background-color: red">
                      <div class="row">
                          <div class="col-md-12 col-sm-6 vblc">
                              <div class="col-md-12 col-sm-6">
                                  <div class="imgCont"></div>
                              </div>
                          </div>
                          <div class="col-md-12 col-sm-6 btnCont">
                              <button class="btn btn-default btn-sm center-block" type="submit">Voto en Blanco</button>
                          </div>
                      </div>
                  </div>
            </div>
        </div>
</body>
</html>
