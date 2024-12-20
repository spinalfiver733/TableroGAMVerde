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

if ($_SESSION['Captura_t']==1)
{
require_once "../config/Conexion.php";
date_default_timezone_set('America/Mazatlan');
$fecha_actual = date("d-m-Y");
$hora_actual = date("h:i:s");
    
    
  $user = $_SESSION["nombre"];
    
    
    
          if(getenv('HTTP_CLIENT_IP')) {
        $ip = getenv('HTTP_CLIENT_IP');
      } elseif (getenv('HTTP_X_FORWARDED_FOR')) {
        $ip = getenv('HTTP_X_FORWARDED_FOR');        
      }elseif (getenv('HTTP_FORWARDED_FOR')) {
        $ip = getenv('HTTP_FORWARDED_FOR');        
      }elseif (getenv('HTTP_FORWARDED')) {
        $ip = getenv('HTTP_FORWARDED');        
      } else {
      
      $ip = $_SERVER['REMOTE_ADDR'];
      }
  
  $meta = unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.$ip));
    
    
    
?>


<style>
    button{
        background-image: linear-gradient(to right, green, greenyellow);
    }
    button:hover {
          background-image: linear-gradient(to left, green , greenyellow);
    }
</style>


<body onload="mueveReloj()">
    <!-- Inicio Contenido PHP-->
        <div class="col-lg-12" style="background-color:#7D2735;text-align:center;">
            <div class="main-box clearfix" style="  background-image: linear-gradient( #eff1f6 ,  #d7d9de );">

                <div class="row" onload="mueveReloj()">

                
                 <div class="main-box-body clearfix" >
                    <div class="col-sm-12">
                        <div class="small-box bg-aqua">
                            
                        
                            
                            <div class="inner">
                                 <h1 style="text-align:center;font-family: montserrat;color:#9F2241;background-color:white;border-radius:20px;"><strong>Tablero de control de territoriales gam 2024</strong></h1>      
                                

                                
                                
                            <form action="cargar_t.php" method="POST" enctype="multipart/form-data" style="background-image: url('img/patron_g.png');width:100%;">   

                                <?
                                  $sql_fetch_user = "SELECT nombre FROM usuarios where nombre = '$user'";
                                  $query_user = mysqli_query($conexion, $sql_fetch_user);
                                  foreach ($query_user as $opciones_user):
                                  ?>

                                <input type="text" name="nombre" value="<?php echo $opciones_user['nombre'];?>" hidden>
                                <input type="text" name="icon" value="http://www.intranet.gamadero.cdmx.gob.mx/public/src/images/jc_icon.jpeg" hidden>                                    

                                
                                    <input id="lat" name="lat"  value="<?php echo $meta['geoplugin_latitude']; ?>" hidden>
                                    <input id="lon" name="lon"  value="<?php echo $meta['geoplugin_longitude']; ?>" hidden>
    
                                       <?php endforeach ?>

                                <br><br>
                                
                                    <tr>
                                        <td style="float:center;"><h2 style="color:#9F2241;font-family:montserrat;"><strong>Tipo de actividad: </strong></h2></td>
                                        <td style="float:left;">                                
                                            <select name="act" style="font-size:1.5em;">
                                                  <option value="APOYO" style="color:black;font-family:montserrat;">ASAMBLEA</option>
                                                  <option value="PROGRAMA" style="color:black;font-family:montserrat;">PROGRAMA</option>
                                                  <option value="SERVICIO" style="color:black;font-family:montserrat;">SERVICIO</option>
                                                  <option value="ATENCION" style="color:black;font-family:montserrat;">ATENCION</option>
                                                
                                            </select>
                                        </td>
                                    </tr>
                                    
                                    
                                 
                                        <div style="float:center;"><h2 style="color:#9F2241;font-family:montserrat;"><strong>Tema: </strong></h2>                            
                                            <select name="tema" style="font-size:1.5em;">
                                                  <option value="ALIMENTICIO" style="color:black;font-family:montserrat;">SEGURIDAD</option>
                                                  <option value="GRUPO" style="color:black;font-family:montserrat;">PROCOMUR</option>
                                                  <option value="VIVIENDA" style="color:black;font-family:montserrat;">BACHEO</option>
                                                  <option value="ADQUISICION" style="color:black;font-family:montserrat;">ALUMBRADO</option>
                                                
                                            </select>
                                        </div>
                            
                                    
                                    
                                        <div class="container" style="width:100%;">
                                            <h2 style="color:#9F2241;font-family:montserrat;"><strong> Territorial y colonia: </strong></h2>                               
                                            <select name="colonia"  style="font-size:1.5em;width:100%;">
                                                    <?php  
                                                            $sql_fetch_todos_problemas = "SELECT * FROM unidades_t";
                                                            $query_problemas = mysqli_query($conexion, $sql_fetch_todos_problemas);
                                                        foreach ($query_problemas as $opciones_problemas): 

                                                    ?>                                

                                            <option value="<?php echo $opciones_problemas ['colonia']?>" style="color:black;font-family:montserrat;"><?php echo $opciones_problemas ['cveut']?> <?php echo $opciones_problemas ['colonia']?></option>

                                                    <?php endforeach ?>
                                            </select>
                                        </div>
                                    

                                    
                                    <tr>
                                        <td style="float:center;"><h2 style="color:#9F2241;font-family:montserrat;"><strong> Beneficiarios: </strong></h2></td>
                                        <td style="float:left;">                                
                                          <input type="number" name="ben" style="color:black;font-size:1.5em;font-family:montserrat;">
                                        </td>
                                    </tr>      
                                    
                                       <tr>
                                        <td style="float:center;"><h2 style="color:#9F2241;font-family:montserrat;"><strong> Monto: </strong></h2></td>
                                        <td style="float:left;">                                
                                          <input type="number" name="monto" style="color:black;font-size:1.5em;font-family:montserrat;">
                                        </td>
                                    </tr> 
                                    <br><br>
                                    
                                
                                <div class="col-md-4"></div>
                                
                                    <div class="col-md-4">
                                        <td style="float:center;"><h2 style="color:#9F2241;font-family:montserrat;"><strong> Carga una evidencia: </strong></h2></td>                                        
                                        <td style="float:center;">
                                         <input type="file" name="foto" style="background-image: url('img/cinto.png');height:80px;border-radius:20px;">     
                                        </td>
                                    </div>
                                
                                <div class="col-md-4"></div>
                                
                                <br><br><br><br><br><br><br><br>
                                
                                <input type="text" name="fecha" value="<?php echo $fecha_actual;?>" hidden>
                                <input type="text" name="hora" value="<?php echo $hora_actual;?>" hidden>


                                    <button type="submit" style="background-image: url('img/cinto.png');width:80%;border-radius:15px;"><strong><h1 style="color:white;"><li class="fa fa-ticket"></li><strong> CARGAR EVIDENCIA</strong></h1></strong></button>

                            </form>    
<br><br><br><br><br><br>
                                
                            </div>
                        </div>
                      </div>

                </div>
                

                <div class="main-box-body clearfix" >
                </div>
                
            </div>
        </div>
    </div>
    
    
    </body>
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

<script type='text/javascript'>
	document.oncontextmenu = function(){return false}
</script>


<script type='text/javascript'>
$(function(){
    $(document).bind("contextmenu",function(e){
        return false;
    });
});
</script>