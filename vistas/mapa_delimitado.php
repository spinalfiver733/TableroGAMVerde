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

if ($_SESSION['Escritorio']==1)
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
   
   
   
<iframe
width="100%"
height="600px"
  src="https://www.google.com/maps/d/u/0/edit?hl=es-419&mid=1Yc70GMnQyiXvmLTfp0W_1L_Spv-OTEk&ll=19.493170536768027%2C-99.13201978273017&z=13">
</iframe>

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
