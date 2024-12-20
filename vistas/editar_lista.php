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

if ($_SESSION['Escritorio']==1 || $_SESSION['Captura']==1)
{

require "../config/Conexion.php";  




$id_registro = $_GET['id'];     
$sql="SELECT lat,lon,curp,tipo,servicio FROM registros_material_c WHERE id='$id_registro'";
$query = $conexion->query($sql);

  while($row = $query->fetch_assoc()) {

    $fecha = $row["curp"];
    $direccion = $row["tipo"];
    $latitud = $row["lat"];
    $longitud = $row["lon"];  
    $candidata = $row["servicio"];    

  }


?>







    <!-- Inicio Contenido PHP-->
    <div class="row">
            <div class="main-box clearfix">




          <form action="editar_registro.php" method="POST">      

                <h1 style="color: red;">Editar la información del registro con folio: <?php echo $id_registro; ?></h1>


                <table class="table table-striped">


                    <tr>
                        
                        <td>
                        <label>FECHA</label>
                        <br>
                             <input type="text" hidden name="id" value="<?php echo $id_registro; ?>">
                             <input type="text" name="curp" value="<?php echo $fecha; ?>">
                        </td>                        
                    </tr>

                    <tr>
                        
                        

                       
                        <td>
                        <label>DIRECCIÓN</label>
                        <br>
                             <input type="text" name="tipo" value="<?php echo $direccion; ?>" style="width: 100%;">
                        </td>                        
                    </tr>    

 

                        <td>
                        <label>LATITUD</label>
                        <br>
                             <input type="text" name="lat" value="<?php echo $latitud;?>" style="width: 50%;">
                        </td>                        
                    </tr>                      

                    <tr>
                        <td>
                        <label>LONGITUD</label>
                        <br>
                             <input type="text" name="lon" value="<?php echo $longitud;?>" style="width: 50%;">
                        </td>                        
                    </tr>                       

                    <tr>
                        <td>
                        <label>CANDIDATA</label>
                        <br>
                            <input type="text"  value="<?php echo $candidata;?>" readonly>
                             <select type="text" name="servicio">
                                 <option value="clara"></option>
                                 <option value="clara">CLARA BRUGADA</option>
                                 <option value="sheimbaun">CLAUDIA SHEIMBAUN</option>
                             </select>
                        </td>                        
                    </tr>
                    


                    <tr>
                        <td colspan="2">
                            <button style="float:left;background-color: green;color:white;"><li class="fa fa-upload"> MODIFICAR INFORMACIÓN</li></button>
                        </td>
                    </tr>   

                                                       


                </table>
</form>

            </div>
        
    </div>
    <!-- Fin Contenido PHP-->
    <?php
}
else
{
 require 'noacceso.php';
}

require 'footer.php';
?>
        <script type="text/javascript" src="scripts/clientes.js"></script>
<?php 
}
ob_end_flush();
?>

