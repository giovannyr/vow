<?php
session_start();  // validar permisos usuario

if (isset($_SESSION['autenticado']) && $_SESSION['autenticado'] == true) {
    if ($_SESSION['permisos'] == "control total") {
        ?>

        <!DOCTYPE html>
        <html>
            <head>
                <title>Envio emails</title>
                <link rel="stylesheet" href="../resources/bootstrap/css/bootstrap.min.css" />
                <script type="text/javascript" src="../js/jquery.js"></script>
                <script type="text/javascript" src="../resources/bootstrap/js/bootstrap.min.js"></script>
                <style>
                    .cont-frm{
                        /*height: 20%;*/
                        padding: 30px 20px;
                        color: #FFF;
                        border-radius: 5px;
                        position: absolute;
                        left: 50%;
                        top: 50%;
                        transform: translate(-50%, -50%);
                        -webkit-transform: translate(-50%, -50%);
                        background-color: #21252B;
                    }
                </style>
            </head>
            <body>

                <?php include "menu.php"; ?>

                <div class="container">
                    <div class="row">
                        <div class="cont-frm">
                            <form id="frm_envioEmails">
                                <label for="">Enviar emails a los usuarios</label>
                                <br>
                                <br>
                                <input type="hidden" name="data" />
                                <button class="btn btn-primary center-block">Enviar</button>
                            </form>
                            <hr />
                        </div>
                    </div>
                </div>

                <script src="../js/util.js"></script>
                <script src="../js/envioEmails.js"></script>
            </body>
        </html>

        <?php
    } elseif ($_SESSION['permisos'] == "reportes") {
        header("Location: reportes.php");
    }
} else {
    header("Location: ../index.php");
}

?>
