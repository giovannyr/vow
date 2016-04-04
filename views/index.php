<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
        <link rel="stylesheet" href="../resources/bootstrap/css/bootstrap.min.css">
        <script src="../js/jquery.js"></script>
        <script src="../resources/bootstrap/js/bootstrap.min.js"></script>
        <style>
            html, body{
                width: 100%;
                height: 100%;
                margin: 0;
            }
            .container-fluid{
                height: 100%;
                 background-image: url("../images/3.jpg");
            }
            .row{
                height: 50%;
            }
            .row > div{
                height: 230px;
                border-radius: 5px;
                margin-top: 10%;
                padding-top: 2%;
                color: #000;
                background-color: rgba(255, 255, 255, 0.6);
            }
        </style>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <form id="frmLogin">
                        <div class="form-group">
                            <label for="user_v">Usuario</label>
                            <input type="text" class="form-control" name="user_v" id="user_v" placeholder="Usuario" maxlength="20" autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            <label for="pass_v">Contraseña</label>
                            <input type="password" class="form-control" name="pass_v" id="pass_v" placeholder="Contraseña" maxlength="20" autocomplete="off" required>
                        </div>
                        <button type="submit" class="btn btn-default">Enviar</button>
                    </form>
                </div>
            </div>
        </div>

        <script type="text/javascript" src="../js/util.js"></script>
        <script type="text/javascript" src="../js/login.js"></script>
    </body>
</html>
