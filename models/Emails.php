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
        $enlace = "http://192.168.0.3/vow/views/votacion.php?r=" . $codigo;

        $mensaje = '<a href="' . $enlace . '" target="_blank">Ir a la votacion</a>';
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
