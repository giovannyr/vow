<?php

ini_set('max_execution_time', 1200);
require '../config/DbOperator.php';
//require "../resources/PHPMailer/class.phpmailer.php";
require "../resources/PHPMailer/PHPMailerAutoload.php";

class Emails {

    private $link;
    private $file;

    function __construct() {
        $this->link = DbOperator::conexion();
        $this->file = fopen("../logs/logEnvioEmails.txt", "w") or die("No se pudo abrir el archivo");
    }

    function consultarCorreos() {
        $this->link = DbOperator::conexion();
        $result = mysql_query("SELECT correo, 
            codigoenlace.codigo as 'codEnlace', 
            codigoverificacion.codigo as 'codVerificacion'
            FROM
            votante
            join codigoenlace
            on votante.idcodigo = codigoenlace.id
            JOIN codigoverificacion
            on votante.idCodVerificacion = codigoverificacion.id");

        while ($row = mysql_fetch_array($result)) {
            //echo $row['correo']." ".$row['id']." ".$row['codigo']."<br>";
            $this->enviarEmail($row['correo'], $row['codEnlace'], $row['codVerificacion']);
        }

        mysql_close($this->link);
        fclose($this->file);
    }

    function enviarEmail($email_destinatario, $codEnlace, $codVer) {
        $enlace = 'https://192.168.0.5/vow/views/votacion.php?r='.$codEnlace;
        $mensaje = '<!DOCTYPE html>
                    <html lang="en">
                    <head>
                        <meta charset="UTF-8">
                    </head>
                    <body>
                        <div align="center">
                            <table width="710" height="1000" border="0" style="background-image: url("../invitacion/invitacion.png");">
                                <tr>
                                    <td height="630" colspan="3"></td>
                                </tr>
                                <tr>
                                    <td width="200"></td>
                                    <td width="310" height="100">
                                        <p style="text-align: center; font-size: 30px;"><b>'.$codVer.'</b></p>
                                    </td>
                                    <td width="200"></td>
                                </tr>
                                <tr>
                                    <td height="107" colspan="3"></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td height="76" style="text-align: center">
                                        <a href="'.$enlace.'" target="_blank" alt="Enlace a la pagina de votacion" style="text-decoration: none; color: #FFF; font-size: 30px">Vote Aquí</a>
                                    </td>
                                    <td></td>
                                </tr>
                                    <tr>
                                        <td colspan="3"></td>
                                    </tr>
                            </table>
                        </div>
                    </body>
                    </html>';

        $asunto = "Eleccion de delegados asamblea general 2016";

        $mail = new PHPMailer;
        $mail->Host = "localhost";
        $mail->From = "correosvarios4@gmail.com";
        $mail->FromName = "FEMCA";
        $mail->Subject = $asunto;
        $mail->addAddress($email_destinatario);
        $mail->MsgHTML($mensaje);
          /*if($adjunto['size'] > 0){
          $mail->addAttachment($adjunto['tmp_name'],$adjunto['name']);
          } */
        if($mail->send()){
            $this->log($email_destinatario);
        } 
        /*
        $mail = new PHPMailer;
        $mail->SMTPDebug = 0;
        $mail->Debugoutput = 'html';

        try {
            $mail->IsSMTP();
            $mail->Host = "mail.salavirtual.com.co";
            $mail->Port = 25;
            $mail->SMTPAuth = true;
            $mail->From = "femca@salavirtual.com.co";
            $mail->FromName = "FEMCA";
            $mail->Username = "femca@salavirtual.com.co";
            $mail->Password = "FEMCA032016";
            $mail->Subject = $asunto;
            $mail->addAddress($email_destinatario);
            $mail->MsgHTML($mensaje);

            if ($mail->send()) {
                $this->log($email_destinatario."-> Enviado");
            } else {
                $this->log($email_destinatario." -> ".$mail->ErrorInfo);
            }
        } catch (phpmailerException $e) {
            echo $e->errorMessage(); //Pretty error messages from PHPMailer
        } catch (Exception $e) {
            echo $e->getMessage(); //Boring error messages from anything else!
        }*/
    }

    function log($email) {
        fwrite($this->file, $email . "\n");
    }

}
