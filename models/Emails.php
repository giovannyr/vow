<?php
ini_set('max_execution_time', 1200);
require '../config/DbOperator.php';
require "../resources/PHPMailer/class.phpmailer.php";

class Emails {

    private $link;

    
    function __construct() {
        $this->link = DbOperator::conexion();
    }

    
    function consultarCorreos() {
        $this->link = DbOperator::conexion();
        $result = mysql_query("SELECT correo, id, codigo
            FROM
            votante
            join codigoenlace
            on votante.idcodigo = codigoenlace.id");

        while ($row = mysql_fetch_array($result)) {
            //echo $row['correo']." ".$row['id']." ".$row['codigo']."<br>";
            //enviarEmail($row['correo'], $row['codigo']);
            $this->enviarEmail($row['correo'], $row['codigo']);
        }

        mysql_close($this->link);
    }

    
    function enviarEmail($email_destinatario, $codigo) {
        //$enlace = "http://salavirtual.com.co/vow/views/votacion.php?r=" . $codigo;
        $enlace = "http://192.168.0.8/vow/views/votacion.php?r=" . $codigo;

        //$mensaje = '<a href="' . $enlace . '" target="_blank">Ir a la votacion</a>';
        $mensaje = '<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<img src="../invitacion/invitacion.png" width="710" height="1000" border="0" usemap="#map" />

		<map name="map">
		<area shape="rect" coords="248,773,459,832" target="_blank" alt="Enlace a la pagina de votacion" href="http://192.168.0.8/vow/views/votacion.php?r=MQ==" />
	</map>
</body>
</html>';
        $asunto = "test enlace unico";

        $mail = new PHPMailer;
        $mail->Host = "localhost";
        $mail->From = "correosvarios4@gmail.com";
        $mail->FromName = "itech";
        $mail->Subject = $asunto;
        $mail->addAddress($email_destinatario, $email_destinatario);
        $mail->MsgHTML($mensaje);
        $mail->send();
        
        /*if($adjunto['size'] > 0){
            $mail->addAttachment($adjunto['tmp_name'],$adjunto['name']);
        } */

        /*if ($mail->send()) {
            
        } else {
            
        }*/
    }
    

}
