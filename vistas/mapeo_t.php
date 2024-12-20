<?php
//Activamos el almacenamiento en el buffer
ob_start();
session_start();

if (!isset($_SESSION["nombre"]))
{
  header("Location: login.html");
}
else
{
require 'header.php';
require 'scripts/scriptE_t.js';

if ($_SESSION['Captura_t']==1 || $_SESSION['Administrador']==1)
{

?>
<!--Contenido-->




<header>
    <style>
        #mapCanvas {
    width: 100%;
    height: 650px;
}
     </style>   
</header>


<body>
    
<div id="mapCanvas"></div>




<br><br>

<script type=text/javascript>

document.oncontextmenu = function(){return false;}

</script>

  <!--Fin-Contenido-->
<?php
}

require 'footer.php';
?>
<script src="../public/js/chart.min.js"></script>
<script src="../public/js/Chart.bundle.min.js"></script> 

<?php 
}
ob_end_flush();
?>
