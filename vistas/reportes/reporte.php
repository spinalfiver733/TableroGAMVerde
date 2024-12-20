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
require '../header.php';

if ($_SESSION['Escritorio']==1)
{
require_once "../../config/Conexion.php";
?>


  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
<?php
$sql_fetch_todos = "select *  from registros_material group by nombre ;";
$query = mysqli_query($conexion, $sql_fetch_todos);

                while ($row = mysqli_fetch_assoc($query)) { 
                 echo "['" .$row['nombre']. "'," .$row['id']. "],";
                }
?>
        ]);

        var options = {
          title: 'GRAFICA GENERAL DE AMBAS CANDIDATAS'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
    
    
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
<?php
//$sql_fetch_todos2 = "select *  from usuarios a  INNER JOIN registros_material b group by nombre on a.nombre = b.nombre;";
$sql_fetch_todos2 = "select *  from registros_material where servicio = 'clara'  group by nombre ;";

$query2 = mysqli_query($conexion, $sql_fetch_todos2);

                while ($row2 = mysqli_fetch_assoc($query2)) { 
                 echo "['" .$row2['nombre']. "'," .$row2['id']. "],";
                }
?>
        ]);

        var options = {
          title: 'GRÁFICA PARA CLARA BRUGADA POR LIDER'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart2'));

        chart.draw(data, options);
      }
    </script>   
    
    
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
<?php
//$sql_fetch_todos2 = "select *  from usuarios a  INNER JOIN registros_material b group by nombre on a.nombre = b.nombre;";
$sql_fetch_todos3 = "select *  from registros_material where servicio = 'sheimbaun'  group by nombre ;";

$query3 = mysqli_query($conexion, $sql_fetch_todos3);

                while ($row3 = mysqli_fetch_assoc($query3)) { 
                 echo "['" .$row3['nombre']. "'," .$row3['id']. "],";
                }
?>
        ]);

        var options = {
          title: 'GRÁFICA PARA CLAUDIA SHEIMBAUN POR LIDER'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart3'));

        chart.draw(data, options);
      }
    </script>
    
  </head>
  <body>
    <div id="piechart" style="width: 900px; height: 500px;"></div>
    <br>
    <div id="piechart2" style="width: 900px; height: 500px;"></div>
    <br>
    <div id="piechart3" style="width: 900px; height: 500px;"></div>    
  </body>
    <!-- Fin Contenido PHP-->
    <?php
}
else
{
 require '../noacceso.php';
}
require '../footer.php';
?>
<?php 
}
ob_end_flush();
?>