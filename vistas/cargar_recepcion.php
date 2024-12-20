<?php

require_once "../config/Conexion.php";


$nombre = $_POST['recibio'];
$fecha = $_POST['fecha'];
$hora = $_POST['hora'];
$concepto = $_POST['concepto'];
$cantidad = $_POST['cantidad'];
$icon = $_POST['icon'];
$entrego = $_POST['entrego'];




    $foto = $_FILES['foto']['name'];
    $ruta = $_FILES['foto']['tmp_name'];
    $destino = "recepciones/" . $foto;

    if ($foto != "") {
        if (copy($ruta, $destino)) {


        
        $insert = $conexion->query("INSERT INTO registros_recepcion (nombre,telefono,lat,lon,curp,direccion,foto,tipo,icon,concepto) VALUES ('$nombre','$cantidad',0,0,'$fecha','$hora','$foto','recepcion','$icon','concepto')");
        
            
            
        if($insert){
            header('Location: lista_recepcion.php');
            die();
        }else{
            echo " por favor intente de nuevo el registro ... ";
        } 

}
}

?>


<script type=text/javascript>

document.oncontextmenu = function(){return false;}

</script>