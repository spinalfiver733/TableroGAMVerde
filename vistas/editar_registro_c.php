<?php


require_once "../config/Conexion.php";
	
	$id = $_POST['id'];
    $fecha = $_POST['curp'];
    $direccion = $_POST["tipo"];
    $latitud = $_POST["lat"];
    $longitud = $_POST["lon"];
    $candidata = $_POST["servicio"];
    



$query="UPDATE registros_material_c SET  curp = '$fecha',tipo = '$direccion',lat = '$latitud',lon = '$longitud',servicio = '$candidata' WHERE id='$id'";
    if ($conexion->query($query)) {
        

        header("Location: lista_completa.php");           

        
    } else {
        echo "no se genero la consulta";
    }
    
     
    

    mysqli_close($conexion);

?>

