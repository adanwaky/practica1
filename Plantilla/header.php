<!-- ENCABEZAMIENTO DE LA PÁGINA -->
<head>
    <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../assets/bootstrap/css/freelancer.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../assets/bootstrap/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
<div class="col-xs-12">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div style="height:70px" class="panel-title"> 
                        <a href="index.php?page=inicio_pag"><img src="../assets/logo.png"> <img src="../assets/paco.png"></a>
                        <?php if (isset($_SESSION['user'])) { ?>	
                            &nbsp;&nbsp;|&nbsp;&nbsp;
                            <a href="?page=buscar_pag"><img src="../assets/buscartarea.png"></a>
                            <!--SI EL TIPO ES ADMINISTRADOR -->
                            <?php if (isset($_SESSION['tipo']) && $_SESSION['tipo'] == "Administrador") { ?>
                                &nbsp;&nbsp;|&nbsp;&nbsp; 
                                <a href="?page=NuevaTarea"><img src="../assets/nuevatarea.png"></a>&nbsp;&nbsp;|&nbsp;&nbsp;
                                <a href="?page=ListaUser"><img src="../assets/listaruser.png"></a>&nbsp;&nbsp;|&nbsp;&nbsp;
                                <a href="?page=AddUser"><img src="../assets/nuevouser.png"></a>

                                <!--SI EL TIPO ES OPERARIO -->
                            <?php } if (isset($_SESSION['tipo']) && $_SESSION['tipo'] == "Operario") { ?>
                                <a href="?page=ModUser&idusers=<?= $_SESSION['id'] ?>">&nbsp;&nbsp;|&nbsp;&nbsp;<img src="../assets/editaruser.png"></a>   
                            <?php } ?>

                            <p style="float:right"> Conectado como <?php if (isset($_SESSION['user'])) echo $_SESSION['user'] ?> 
                                <br>Inicio de sesión: <?php if (isset($_SESSION['hora'])) echo $_SESSION['hora']; ?><br>
                                <a style="float:right; color:white" href="?page=cerrarSesion">
                                    <button type="button" class="btn btn-warning">Cerrar Sesión</button></a></p>
                                <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

