<?php
session_start();
require '../models/Candidato.php';
require '../models/Voto.php';


if (isset($_POST['action'])) {

    $act = $_POST['action'];

    switch ($act) {
        case "consultar":
            $can = new Candidato();
            $categoria = $_SESSION['categoria'];
            $resp = $can->dataCandidatos($categoria);
            die(json_encode($resp));
            break;
        case "registrar":
            $vot = new Voto();
            
            $codCandidato = intval($_POST['data']['id']);
            $ccVotante = $_SESSION['ccVotante'];
            $codEnlace = ( isset($_SESSION['codigo']) ) ? $_SESSION['codigo'] : "sin codigo";
            
            if(isset($_SESSION['permisosOnline'])){
                if($_SESSION['permisosOnline'] == "online"){
                    $formaV = "online";
                }elseif(isset ($_SESSION['usuario'])){
                    $formaV = $_SESSION['usuario'];
                }else{
                    $formaV = "--";                    
                }
            }else{
                if(isset ($_SESSION['usuario'])){
                    $formaV = $_SESSION['usuario'];
                }else{
                    $formaV = "--";                    
                }
            }
            
            $vot->registrarVoto($codCandidato, $ccVotante, $codEnlace, $formaV);
            
            $_SESSION['autorizaVoto'] = null;
            $_SESSION['autorizaVotoOnline'] = null;
            
            die(json_encode("_view.php"));
            break;
    }
}