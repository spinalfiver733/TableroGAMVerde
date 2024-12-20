<?php


require_once "../config/Conexion.php";
	
	$id = $_POST['id'];
    $fecha = $_POST['curp'];
    $direccion = $_POST["tipo"];
    $latitud = $_POST["lat"];
    $longitud = $_POST["lon"];


$query="UPDATE registros_material SET  curp = '$fecha',tipo = '$direccion',lat = '$latitud',lon = '$longitud' WHERE id='$id'";
    if ($conexion->query($query)) {
 
        header("Location: ./lista.php");           

        
    } else {
        echo "Error al Registrar, vuelva a intentarlo";
    }

?>

