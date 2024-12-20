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
require 'scripts/scriptE.js';

if ($_SESSION['Escritorio']==1 || $_SESSION['Servicios']==1)
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
                    			       <h2>MAPA DE CLAUDIA SHEINBAUM</h2> 
<br>    
                			    <div class="container">
                			        <div class="col-md-6">
                			            <a href="mapa.php"><button><img src="img/sheimbaun.png" width="100%"></button></a>
                			        </div>
                			        
                			        <div class="col-md-6">
                			            <a href="mapa_cb.php"><button><img src="img/clara.png" width="100%"></button></a>
                			        </div>                			        
                			    </div>
                			    
                			    
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
