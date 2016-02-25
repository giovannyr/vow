<?php

require "../config/basedatos.php";
require "../resources/PHPMailer/class.phpmailer.php";



$result = mysql_query("SELECT correo, id, codigo
            FROM
            votante
            join codigoenlace
            on votante.idcodigo = codigoenlace.id");

while($row = mysql_fetch_array($result)){
    //echo $row['correo']." ".$row['id']." ".$row['codigo']."<br>";
    enviarEmail($row['correo'], $row['codigo']);
}

mysql_close($link);




function enviarEmail($email_destinatario, $codigo){

    $enlace = "http://192.168.0.4/vow/views/votacion.php?r=".$codigo;

    $mensaje = '<a href="'.$enlace.'" target="_blank">Votar</a>';
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
    }

    if($mail->send()){
        $msg = "Se envio el mail";
    }else{
        $msg = "Error al enviar el mail";
    }*/
}

?>
