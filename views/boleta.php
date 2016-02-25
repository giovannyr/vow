<?php
session_start();
$codigo = $_SESSION['codigo'];
require "../config/basedatos.php";

$query = "INSERT INTO votacion (codCandidato, ccVotante, codEnlace) VALUES(5,'','".$codigo."')";
//mysql_query($query);

?>
