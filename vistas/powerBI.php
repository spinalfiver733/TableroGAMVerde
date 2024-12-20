<?php
//Activamos el almacenamiento en el buffer
ob_start();
session_start();
date_default_timezone_set("America/Mazatlan");



if (!isset($_SESSION["nombre"]))
{
  header("Location: login.html");
}
else
{
require 'header_bi.php';

if ($_SESSION['Administrador']==1)
{
    $nombre = $_SESSION["nombre"];

$hora =  date('Y-m-d H:i:s');   
    
?>


<iframe src="https://app.powerbi.com/view?r=eyJrIjoiZmUxZmViMTktZGUwOC00MTM1LWE3YjEtZWVkOWVkYWNmNzU2IiwidCI6IjlkZjY1ZjIwLTE1ZjQtNDNiZi1iM2YzLWE0Zjk0NWM0Zjg1ZiJ9"  width="100%" height="1000px" frameborder="0" scrolling="no">

</iframe>
        <br><br><br><br><br><br><br>

    <?php

    
    
}}
?>
    
    
<footer style="background-color:black;float:center;">
<img src="../vistas/img/logam_jc_sf.png" width="35%" style="float:center;">
</footer>