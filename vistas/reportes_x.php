<?php
//Activamos el almacenamiento en el buffer
ob_start();
date_default_timezone_set("America/Mazatlan");




require 'header.php';

if ($_SESSION['Escritorio']==1)
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
          ['Task', 'Hours per Day'],
<?php
$sql_fetch_todos = "select *  from registros_material_c group by nombre ;";
$query = mysqli_query($conexion, $sql_fetch_todos);

                while ($row = mysqli_fetch_assoc($query)) { 
                 echo "['" .$row['nombre']. "'," .$row['id']. "],";
                }
?>
        ]);

        var options = {
          title: 'GRﾃ：ICA GENERAL DE AMBAS CANDIDATAS'
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
$sql_fetch_todos2 = "select *  from registros_material_c where servicio = 'clara'  group by nombre ;";

$query2 = mysqli_query($conexion, $sql_fetch_todos2);

                while ($row2 = mysqli_fetch_assoc($query2)) { 
                 echo "['" .$row2['nombre']. "'," .$row2['id']. "],";
                }
?>
        ]);

        var options = {
          title: 'GRﾃ：ICA PARA CLARA BRUGADA POR LIDER'
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
$sql_fetch_todos3 = "select *  from registros_material_c where servicio = 'sheimbaun'  group by nombre ;";

$query3 = mysqli_query($conexion, $sql_fetch_todos3);

                while ($row3 = mysqli_fetch_assoc($query3)) { 
                 echo "['" .$row3['nombre']. "'," .$row3['id']. "],";
                }
?>
        ]);

        var options = {
          title: 'GRﾃ：ICA  PARA CLAUDIA SHEINBAUM POR LIDER'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart3'));

        chart.draw(data, options);
      }
    </script>
    
    
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['ID','CLARA', 'CLAUDIA'],
<?php
//$sql_fetch_todos2 = "select *  from usuarios a  INNER JOIN registros_material b group by nombre on a.nombre = b.nombre;";
$sql_fetch_todos4 = "select *  from registros_material_c;";

$query4 = mysqli_query($conexion, $sql_fetch_todos4);

                while ($row4 = mysqli_fetch_assoc($query4)) { 
                 echo "[" .$row4['id']. ",'" .$row4['servicio'].  "','" .$row4['nombre'].  "'],";
                }
?>
        ]);

        var options = {
          chart: {
            title: 'COMPARATIVA',
            subtitle: 'Claudia Sheinbaum y Clara Brugada',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('chart_div'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
    
    
    
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['ID','CLARA', 'CLAUDIA'],
<?php
//$sql_fetch_todos2 = "select *  from usuarios a  INNER JOIN registros_material b group by nombre on a.nombre = b.nombre;";
$sql_fetch_todos4 = "select *  from registros_material_c;";

$query4 = mysqli_query($conexion, $sql_fetch_todos4);

                while ($row4 = mysqli_fetch_assoc($query4)) { 
                 echo "[" .$row4['id']. ",'" .$row4['servicio'].  "','" .$row4['nombre'].  "'],";
                }
?>
        ]);

        var options = {
          chart: {
            title: 'COMPARATIVA',
            subtitle: 'Claudia SHeimbaun y Clara Brugada',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('chart_div'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
    
    
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['ID','CLARA', 'CLAUDIA'],
<?php
//$sql_fetch_todos2 = "select *  from usuarios a  INNER JOIN registros_material b group by nombre on a.nombre = b.nombre;";
$sql_fetch_todos5 = "select *  from registros_material_c  group by nombre;";


$query5 = mysqli_query($conexion, $sql_fetch_todos5);


                while ($row5 = mysqli_fetch_assoc($query5)) { 
                 echo "['" .$row5['nombre']. "','" .$row5['servicio'].  "'," .$row5['id'].  "],";
                }
?>
        ]);

      var options = {
        title: 'Grﾃ｡fica de avance en barras ',
        chartArea: {width: '50%'},
        hAxis: {
          title: 'CIFRAS TOTALES',
          minValue: 0,
          textStyle: {
            bold: true,
            fontSize: 12,
            color: '#4d4d4d'
          },
          titleTextStyle: {
            bold: true,
            fontSize: 18,
            color: '#4d4d4d'
          }
        },
        vAxis: {
          title: 'LIDERES',
          textStyle: {
            fontSize: 14,
            bold: true,
            color: '#848484'
          },
          titleTextStyle: {
            fontSize: 14,
            bold: true,
            color: '#848484'
          }
        }
      };

      var chart = new google.visualization.BarChart(document.getElementById('chart_div2'));
      chart.draw(data, options);
    }
    </script>
    
    

    
    
  </head>
  <body>
      
      
     <button class="btn"><a href="reporte_lista.php"><li class="fa fa-list">  VER EL REPORTE EN LISTA</li></a></button> 
    <div id="piechart" style="width: 100%; height: 500px;"></div>
    <br>
    <div id="piechart3" style="width: 100%; height: 500px;"></div>
    <br>
    <div id="piechart2" style="width: 100%; height: 500px;"></div> 
    <br>
    <div id="chart_div" style="width: 100%; height: 1000px;"></div> 
    <br>
    <div id="chart_div2" style="width: 100%; height: 1200px;"></div> 

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
<?php 

ob_end_flush();
?>