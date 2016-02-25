<?php
    $fileName = basename($_SERVER['PHP_SELF']);
    $dividido = explode(".", $fileName);
    $include = $dividido[0];
?>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">VOW</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li <?php echo ($include == '_view') ? 'class="active"' : '' ?>>
                    <?php
                    if(isset($_SESSION['permisos'])){
                    if($_SESSION['permisos'] == 'control total' || $_SESSION['permisos'] == 'votacion'){
                    ?>
                    <a href="_view.php">Votacion <span class="sr-only">(current)</span></a>
                    <?php
                    }
                    }
                    ?>
                </li>
                <li <?php echo ($include == 'reportes') ? 'class="active"' : '' ?>>
                    <?php
                    if(isset($_SESSION['permisos'])){
                    if($_SESSION['permisos'] == 'control total' || $_SESSION['permisos'] == 'reportes'){
                    ?>
                    <a href="reportes.php">Reportes</a>
                    <?php
                    }
                    }
                    ?>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <?php
                    if(isset($_SESSION['permisos']) && ($_SESSION['permisos'] == 'control total' || $_SESSION['permisos'] == 'reportes')){
                    ?>
                    <a href="logout.php">Cerrar Sesion</a>
                    <?php
                    }
                    ?>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
