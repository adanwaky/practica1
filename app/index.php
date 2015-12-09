<?php
//PÁGINA DE INICIO
define('INS', __DIR__ . '/../install/');
define('MOD', __DIR__ . '/models/');
define('VIEW', __DIR__ . '/views/');
define('CTRL', __DIR__ . '/controllers/');
define('PLANT', __DIR__ . '/../Plantilla/');
define('APP', __DIR__ . '/');
session_start();

include(PLANT . "top_page.php");
?>
<div id="wrapper">      
    <div id="header">       
        <?php include(PLANT . "header.php"); //MUESTRA EL ENCABEZAMIENTO ?>        
    </div>  
    <div id="contenido">
        <?php include(PLANT . "pages.php"); //MUESTAS LAS PÁGINAS A LAS QUE SE ACCEDE?>        
        <br style="clear:both;" />
    </div>
    <div id="footer">          
        <?php include(PLANT . "footer.php"); //MUESTRA EL PIE DE PÁGINA?>        
    </div>
</div>