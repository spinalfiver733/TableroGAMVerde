<?php

require_once "../config/Conexion.php";

    $delete_num = $_GET['id'];
    $sql_delete =  "DELETE FROM registros_material_c WHERE id = '$delete_num'";
    $query_delete = mysqli_query($conexion,$sql_delete);
    if($query_delete){
        header("Refresh: 0 , url = lista_completa.php");
        exit();

    }
    else{
        echo "<script>alert('No se pudo eliminar este Expediente')</script>";
        exit();

    }
    mysqli_close($conexion);
?>
