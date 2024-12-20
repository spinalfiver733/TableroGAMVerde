<?php
//Activamos el almacenamiento en el buffer
ob_start();
session_start();
date_default_timezone_set("America/Mazatlan");



if (!isset($_SESSION["nombre"]))
{
  header("Location: login.html");
}
else
{
require 'header.php';

if ($_SESSION['Administrador']==1)
{
require_once "../config/Conexion.php";

       $sql_fetch_usuarios = "select * from usuarios where direccion = 'JEFE';";
         $query_usuarios = mysqli_query($conexion, $sql_fetch_usuarios);
         $numero = mysqli_num_rows($query_usuarios);
         
         
?>

  <body>
     <div class="nav">
         <div class="row">
            <div class="col-md-4" >
                  <button class="btn" style="width:100%;height:50px;background-color: #ecdfdc;
  background-image: url('img/patron_g.png');background-size:100%;"><a href="reportes.php" style="color:black;"><li class="fa fa-list">  REPORTE GENERAL</li></a></button>

            </div>
            <div class="col-md-4">
                  <button style=";width:100%;height:50px;background-color: #ecdfdc;
  background-image: url('img/patron_g.png');background-size:100%;" class="btn"><a href="reporte_lideres.php" style="color:black;"><li class="fa fa-list">  REPORTE POR LIDER</li></a></button>

            </div>   
            <div class="col-md-4">
                  <button style="width:100%;height:50px;background-color: #9F2241;
  background-image: url('img/cinto.png');background-size:100%;" class="btn"><a href="reporte_territoriales.php" style="color:white;"><li class="fa fa-list">  REPORTE POR TERRITORIALES</li></a></button>

            </div>            
         </div>
     </div>
<form action="reporte_territoriales.php" method="GET">
  <div align="center">                        
      <span class="input-group-text" id="basic-addon1" style="background-color:#9F2241;color:white;border-radius: 5px;font-size:1.3em;">    Seleccione un jefe territorial del siguiente menú:
<br><strong>Total de jefes territoriales: </strong><span style="color:yellow;"><?php  echo $numero;?> filas</span></span>
    
    <p style="background-color:#9F2241;color:black;border-radius: 5px;font-size:1.3em;">
      <select name="lider">
        <?php



          while ($valores = mysqli_fetch_assoc($query_usuarios)) {
              ?>
            <option value="<?php echo $valores['nombre'];?>"><?php echo $valores['nombre'];?></option>  
              <?php
          }

        ?>
      </select>            

      <button type="submit" class="btn btn-success" style="width:200px;height:70px;"><li class="fa fa-eye"></li> Ver datos de territorial</button>
    </p>
  </div>
</form>
<br><br> <br><br> <br><br>

 <?php
if (isset($_GET['lider'])) {
    $lider = $_GET['lider'];
       echo '<h1 style="color:#9F2241;">REGISTROS PARA EL LIDER: '. $lider .'</h1>';
       $sql_fetch_todos = "select *  from datos_jefes where nombre = '$lider';";
         $query_reg = mysqli_query($conexion, $sql_fetch_todos);
         $numero_reg = mysqli_num_rows($query_reg);
 ?>            


<span class="input-group-text" id="basic-addon1" style="background-color:#9F2241;color:white;border-radius: 5px;font-size:1.3em;">
<strong>Total de registros: </strong><span style="color:yellow;"><?php  echo $numero_reg;?> evidencias</span></span>


                                                                                                            
                <?php
                while ($row = mysqli_fetch_array($query_reg)) { 
                        ?>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['', ''],
<?php
$sql_fetch_todos = "select *  from datos_jefes where nombre = '$lider' group by colonia;";
$query = mysqli_query($conexion, $sql_fetch_todos);
$numero = mysqli_num_rows($query);
$menos_de_50 = 500;

             if( $numero < $menos_de_50){
                while ($row = mysqli_fetch_assoc($query)) { 
                 echo "['" .$row['colonia']. "'," .$row['id']. "],";
                }}
?>
        ]);

        var options = {
          title: 'TOTAL DE EVIDENCIAS REGISTRADAS POR LIDER'
        };

        var chart = new google.visualization.PieChart(document.getElementById('menosde50'));

        chart.draw(data, options);
      }
    </script>                            
                        
    <div id="menosde50" style="width: 100%; height: 1200px;"></div>  



  <br><br> <br><br> <br><br>    


  </body>
    <!-- Fin Contenido PHP-->
    <?php
}}
else
{
 require 'noacceso.php';
}
require 'footer.php';
}}
ob_end_flush();
?>