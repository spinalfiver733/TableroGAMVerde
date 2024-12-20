
        <?php
require_once "../config/Conexion.php";
        
    $id_reg = $_GET['id'];

            $sql_fetch_todos = "select * from datos_lideres where id = '$id_reg' ";
            $query = mysqli_query($conexion, $sql_fetch_todos);
        
            if($datos=mysqli_fetch_array($query)){
                if($datos['foto']==""){?>
        <p>NO tiene archivos</p>
                <?php }else{ ?>
        <iframe src="fotos/<?php echo $datos['foto']; ?>" width="100%" height="1200px"></iframe>
                
                <?php } 
                
                
                
                
                
                
                
                } ?>

