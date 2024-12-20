<?php


require_once "../config/Conexion.php";
	
	$id = $_POST['id'];
    
    $foto = $_FILES['foto']['name'];
    $ruta = $_FILES['foto']['tmp_name'];
    $destino = "fotos/" . $foto;

    if ($foto != "") {
        if (copy($ruta, $destino)) {


$query="UPDATE registros_material_c SET  foto = '$foto' WHERE id='$id'";
    if ($conexion->query($query)) {
        

        header("Location: lista_completa.php");           

        
    } else {
        echo "no se cargo la imagen";
    }
    
        }}   
    

    mysqli_close($conexion);

?>

