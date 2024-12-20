<?php

    require_once "../config/Conexion.php";
 
$fecha = $_POST['fecha'];
$hora = $_POST['hora'];
$act = $_POST['act'];
$colonia = $_POST['colonia'];
$tema = $_POST['tema'];
$ben = $_POST['ben'];
$monto = $_POST['monto'];
$nombre = $_POST['nombre'];
$icon = $_POST['icon'];

$lat = $_POST['lat'];
$lon = $_POST['lon'];


              $sql_fetch_colonias = "SELECT cveut FROM unidades_t where colonia = '$colonia'";
              $query_colonias = mysqli_query($conexion, $sql_fetch_colonias);
              foreach ($query_colonias as $opciones_colonias):
              $cveut = $opciones_colonias['cveut'];

    
    
    
    
    
    $foto = $_FILES['foto']['name'];
    $ruta = $_FILES['foto']['tmp_name'];
    $destino = "fotos/" . $foto;
    if ($foto != "") {
        if (copy($ruta, $destino)) {


        $sql = "INSERT INTO datos_lideres (cveut,nombre,fecha,hora,act,colonia,tema,ben,monto,lat,lon,icon,foto) VALUES ('$cveut','$nombre','$fecha','$hora','$act','$colonia','$tema','$ben','$monto','$lat','$lon','$icon','$foto')";

        
                
                 
                
        if($conexion->query($sql)){
            echo "<script>alert('SE A REGISTRADO LA ACTIVIDAD')</script>";
            header("Refresh:0 , url = lista_l.php");
            exit();

        }
        else{
            echo "<script>alert('NO SE REGISTRO LA ACTIVIDAD')</script>";
            header("Refresh:0 , url = lista_l.php");
            exit();

        }
    
        }}

    mysqli_close($conexion);
endforeach
?>
