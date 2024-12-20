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
?>


  <head>
      
    
    
    
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['', ''],
<?php
$sql_fetch_todos = "select *  from datos_jefes group by colonia ;";
$query = mysqli_query($conexion, $sql_fetch_todos);

                while ($row = mysqli_fetch_assoc($query)) { 
                 echo "['" .$row['colonia']. "'," .$row['id']. "],";
                }
?>
        ]);

        var options = {
          title: 'GRÁFICA GENERAL DE COLONIAS'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
    
   
    

    
    
    
    

        <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['ID','TIPO','COLONIA'],
<?php
//$sql_fetch_todos2 = "select *  from usuarios a  INNER JOIN registros_material b group by nombre on a.nombre = b.nombre;";
$sql_fetch_todos4 = "select * from datos_jefes";

$query4 = mysqli_query($conexion, $sql_fetch_todos4);

                while ($row4 = mysqli_fetch_assoc($query4)) { 
                 echo "[" .$row4['id']. ",'" .$row4['tema'].  "','" .$row4['colonia']."'],";
                }
?>
        ]);

        var options = {
          chart: {
            title: 'EVIDENCIAS',
            subtitle: 'COLONIAS',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('chart_div2'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>


    
    
  </head>


  <body>
      
     <div class="nav">
         <div class="row">
            <div class="col-md-4" >
                  <button class="btn" style="width:100%;height:50px;background-color: #9F2241;
  background-image: url('img/cinto.png');background-size:100%;"><a href="reportes.php" style="color:white;"><li class="fa fa-list"><strong> REPORTE GENERAL</strong></li></a></button>

            </div>
            <div class="col-md-4">
                  <button style="width:100%;height:50px;background-color: #ecdfdc;
  background-image: url('img/patron_g.png');background-size:100%;" class="btn"><a href="reporte_lideres.php" style="color:black;"><li class="fa fa-list">  REPORTE POR LIDER</li></a></button>

            </div>   
            <div class="col-md-4">
                  <button style="width:100%;height:50px;background-color: #ecdfdc;
  background-image: url('img/patron_g.png');background-size:100%;" class="btn"><a href="reporte_territoriales.php" style="color:black;"><li class="fa fa-list">  REPORTE POR TERRITORIAL</li></a></button>

            </div>            
         </div>
     </div>
    <div id="piechart" style="width: 100%; height: 500px;"></div>
    <br>
    <!--<div id="chart_div2" style="width: 100%; height: 1200px;"></div> -->

  <br><br><br><br><br><br>

  </body>    

    <!-- Fin Contenido PHP-->


    <?php
}
else
{
 require 'noacceso.php';
}
require 'footer.php';
}
ob_end_flush();
?>