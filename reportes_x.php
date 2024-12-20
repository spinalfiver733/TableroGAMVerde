<?php

date_default_timezone_set("America/Mazatlan");



require_once "config/Conexion.php";

       $sql_fetch_usuarios = "select * from usuarios;";
         $query_usuarios = mysqli_query($conexion, $sql_fetch_usuarios);
         $numero = mysqli_num_rows($query_usuarios);
         
    
         
?>

  <head>
      
      





    
    
  </head>
  <body>
     <div class="nav">
         <div class="row">
            <div class="col-md-6">
                  <button style="width:100%;height:50px;background-image: linear-gradient(#98989A, #9F2241);" class="btn"><a style="color:white;"><li class="fa fa-list">  REPORTE POR LIDER</li></a></button>

            </div>            
         </div>
     </div>
     
     <br>
<form action="reportes_x.php" method="GET">
  <div align="center">                        
      <span class="input-group-text" id="basic-addon1" style="background-color:#9F2241;color:white;border-radius: 5px;font-size:1.3em;">    Seleccione un lider del siguiente menú:
<br><strong>Total de usuarios: </strong><span style="color:yellow;"><?php  echo $numero;?> filas</span></span>
    
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

      <button type="submit" class="btn btn-success" style="width:200px;height:70px;"><li class="fa fa-eye"></li> Ver datos de lider</button>
    </p>
  </div>
</form>

 <?php
 
 
         
if (isset($_GET['lider'])) {
    $lider = $_GET['lider'];
       echo '<h1 style="color:#9F2241;">REGISTROS PARA EL LIDER: '. $lider .'</h1>';
       $sql_fetch_todos = "select *  from registros_material_c where nombre = '$lider';";
         $query_reg = mysqli_query($conexion, $sql_fetch_todos);
         $numero_reg = mysqli_num_rows($query_reg);
         
         
  
         
         
 ?>            
      <span class="input-group-text" id="basic-addon1" style="background-color:#9F2241;color:white;border-radius: 5px;font-size:1.3em;">
<strong>Total de registros: </strong><span style="color:yellow;"><?php  echo $numero_reg;?> evidencias</span></span>

 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['CLARA BRUGADA', 'CLAUDIA SHEINBAUM'],
<?php
$sql_fetch_todos = "select *  from registros_material_c where nombre = '$lider' group by servicio;";
$query = mysqli_query($conexion, $sql_fetch_todos);

                while ($row = mysqli_fetch_assoc($query)) { 
                    
                    
                 echo "['" .$row['servicio']. "'," .$row['id']. "],";
                }
                

?>
        ]);

        var options = {
          title: 'GRÁFICA GENERAL DE AMBAS CANDIDATAS POR LIDER'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
    



     
     
        <div id="piechart" style="width: 100%; height: 500px;"></div> 

<?php

}
else{
           echo '<h1>SELECCIONE UN LIDER DE LA LISTA <li class="fa fa-arrow-up"></li></h1>';

}
 
 ?>



  <br><br> <br><br> <br><br>    


  </body>

<?php 
ob_end_flush();
?>