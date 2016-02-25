<?php
session_start();
require '../models/Candidato.php';


if( isset($_POST['action']) ){
    
    $can = new Candidato();
    $categoria = $_SESSION['categoria'];
    $resp = $can->dataCandidatos($categoria);
    die(json_encode( $resp ));
    
}