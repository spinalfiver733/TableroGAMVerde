
<?php


require_once('../helps/header.php');



require_once "config/Conexion.php";
            
            $id = $_GET['id'];
            $sql_fetch_todos = "select * from escuelas_2 where id=".$_GET['id'];
            $query = mysqli_query($conexion, $sql_fetch_todos);

            
             if($datos=mysqli_fetch_array($query)){

                        ?>

        |               <body style="background-image: url('/public/src/images/4x.png');">


                        <div class="container animate__animated animate__fadeInDown animate__slower">

                        <h2 style="color:#BC955C;background-color:#9F2241;">ESCUELAS DE NIVEL BÁSICO EN LA ALCALDÍA GUSTAVO A. MADERO</h2>
                        


                        <br><h3 style="color:black;">NOMBRE DEL PLANTEL: <h3 style="color:#9F2241;"><?php echo ($datos['name']);?></h3></h3>
                        <br><h3 style="color:black;">AÑO EN QUE FUE INTERVENIDO: <h3 style="color:#9F2241;"><?php echo ($datos['anio']);?></h3></h3>
                        <br><h3 style="color:black;">CONTRATO: <h3 style="color:#9F2241;"><?php echo ($datos['info']);?></h3></h3>
                        <br><h3 style="color:black;">DIRECCIÓN TERRITORIAL: <h3 style="color:#9F2241;"><?php echo ($datos['territorial']);?></h3></h3>
                        <br><h3 style="color:black;">DESCRIPCIÓN: <h3 style="color:#9F2241;"><?php echo ($datos['descripcion']);?></h3></h3>

                        </div>

                        <div class="container">



<h2 style="color:#BC955C;background-color:#9F2241;" class="animate__animated animate__fadeInLeft animate__slower">INTERVENCIONES REALIZADAS</h2>
                            
                            
<?php                            
   //Get image data from database
    $result = $conexion->query("SELECT imagen1,imagen2,imagen3,imagen4,imagen5,imagen6,imagen7,imagen8,imagen9,imagen10 FROM escuelas_2 WHERE id = {$_GET['id']}");
    
    if($result->num_rows > 0){
        $imgData = $result->fetch_assoc();

    }else{
        echo 'Image not found...';
    }
?>              
                            
                            

            <main role="main" class="container">
  



                <div class="card mb-1 box-shadow lead animate__animated animate__fadeInDown animate__slower" style="background-image: url('public/src/images/4.png');">
                        <img src="data:image/png;base64,<?php echo base64_encode($imgData['imagen1']);?>">
                </div>
                                      
                
          </main>

        </div>
                            
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script type=text/javascript>

document.oncontextmenu = function(){return false;}

</script>


                         </body>
 <?php                                       


             }



             require_once('../helps/footer.php');


?>             
