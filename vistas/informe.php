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

if ($_SESSION['Escritorio']==1)
{
    
    require_once "../config/Conexion.php";



?>
    <!-- Inicio Contenido PHP-->
  <head>
      
      
      <h1 style="color:#9F2241;">INFORMES GENERALES</h1>
      <br><br>
                			    <div class="container">
                			        <div class="col-md-6">
                			            <button><img src="img/sheimbaun.png" width="100%"></button>
                			        </div>
                			        
                			        <div class="col-md-6">
                			            <button><img src="img/clara.png" width="100%"></button>
                			        </div>                			        
                			    </div>
                			    
                			    
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Colaborador 1', 'Colaborador 2', 'Colaborador 3', 'Colaborador 4'],
          ['Pegotes',  1000,      400, 100,  1000],
          ['Volantes',  1170,      460, 200,  800],
          ['Tripticos',  660,       1120, 300,  100],
          ['Dipticos',  1030,      540, 400,  1800],
          ['Bardas pintadas',  130,      500, 480,  200],
          ['Micropreforados',  30,      40, 28,  56],
          ['Promocion en semaforos',  200,      300, 189,  98]
        ]);

        var options = {
          title: 'Balance de colaboradores desde el inicio',
          hAxis: {title: 'Year',  titleTextStyle: {color: '#333'}},
          vAxis: {minValue: 0}
        };

        var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="chart_div" style="width: 100%; height: 500px;"></div>
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

