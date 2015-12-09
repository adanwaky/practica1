<?php
//MUESTRA UNA SERIE DE DATOS DE UNA TAREA
include_once CTRL . 'Funciones.php';
?>
<html>
    <head> 
        <script>
            $.datepicker.regional['es'] = {
                closeText: 'Cerrar',
                prevText: '<Ant',
                nextText: 'Sig>',
                currentText: 'Hoy',
                monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
                dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
                dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mié', 'Juv', 'Vie', 'Sáb'],
                dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sá'],
                weekHeader: 'Sm',
                dateFormat: 'yy-mm-dd',
                firstDay: 1,
                isRTL: false,
                showMonthAfterYear: false,
                yearSuffix: ''
            };
            $.datepicker.setDefaults($.datepicker.regional['es']);
            $(function () {
                $("#fecha").datepicker();
            });
        </script>
    </head>
    <body>
        <div class="col-xs-12">
            <table border="1" class="table table-condensed">
                <tr class="success" align="center">
                    <td> <b>Tarea</b></td>
                    <td><b>Nombre Contacto</b> </td>
                    <td><b>Teléfono</b></td>
                    <td><b>Dirección</b></td>
                    <td><b>Población</b></td>
                    <td><b>Estado</b></td>
                    <td><b>Fecha Creación</b></td>
                    <td><b>Fecha Realización</b></td>
                    <td><b>Operario</b></td>
                    <td><b>Opciones</b></td>
                </tr>
                <?php
                foreach ($resultado as $tarea) { //$resultado DECLARADO EN EL CONTROLADOR
                    ?>
                    <tr> <td> <?= $tarea['idTarea'] ?></td>
                        <td> <?= $tarea['Nombre'] ?></td>
                        <td> <?= $tarea['Telefono'] ?></td>
                        <td> <?= $tarea['Direccion'] ?></td>
                        <td> <?= $tarea['Poblacion'] ?></td>
                        <td> <?= $tarea['Estado'] ?></td>
                        <td> <?php $fecha2 = date("d/m/Y", strtotime($tarea['Fecha_creacion']));
                    echo $fecha2; ?></td>
                        <td> <?php $fecha2 = date("d/m/Y", strtotime($tarea['Fecha_realizacion']));
                    echo $fecha2; ?></td>
                        <td> <?= $tarea['Operario'] ?></td>
                        
                        <td align="center"> <a href="?page=Detallada&idTarea=<?= $tarea['idTarea'] ?>" > <img src="../assets/detalle.ico"></a>
                            <?php if (isset($_SESSION['tipo']) && $_SESSION['tipo'] == 'Administrador') { ?>
                            <!--Si el usuario es administrador mostrar esto además -->
                                <a href="?page=Modificar&idTarea=<?= $tarea['idTarea'] ?>"> <img src="../assets/modificar.ico"></a>
                                <a href="?page=BorrarTarea&idTarea=<?= $tarea['idTarea'] ?>"> <img src="../assets/borrar.ico"></a>
                    <?php } ?>
                            <a href="?page=Completada&idTarea=<?= $tarea['idTarea'] ?>"> <img src="../assets/completar.ico"></a></td>
                    </tr>
    <?php
}
?>
            </table></div>
