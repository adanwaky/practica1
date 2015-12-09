<!-- Formulario de entrada de usuario-->
<html>
    <head>
        <link href="../../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="../../assets/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="../../assets/bootstrap/css/freelancer.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="../../assets/bootstrap/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="col-xs-4"></div>
        <div class="col-xs-4">
            <div class="panel panel-primary" align="center">
                <div class="panel-heading">
                    <div class="panel-title" align="center">LOGIN</div>
                </div>
                <div class="panel-body">
                    <form role="form" method="post" action="" class="form-horizontal">
                        <div class="form-group" style="padding-left:8px">
                            <div class="row">
                                <label class="col-xs-3 control-label">Usuario: </label>
                                <input class="col-xs-7" class="form-control" type="text" name="user" value="" >	
                            </div>
                            <div class="row">
                                <label class="col-xs-3 control-label">Contraseña: </label>
                                <input class="col-xs-7" class="form-control" type="password" name="pass" value="" >	
                            </div>
                            <div class="row">
                                <label class="col-xs-4 control-label">Tipo: </label>
                                <input  type="radio" value="Operario" name="tipo" >Operario
                                <input type="radio" name="tipo" value="Administrador">Administrador	
                            </div>
                        </div>
                </div >
                <div class="row" style="padding-bottom:8px"> 
                    <input  class="btn btn-success" type="submit" value="ENTRAR"></div>
                </form>
            </div>
        </div>
