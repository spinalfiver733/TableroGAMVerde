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

if ($_SESSION['Escritorio']==1)
{
    
require_once "../config/Conexion.php";

$sql_fetch_todos = "SELECT * FROM registros_material_c where servicio = 'sheimbaun' order by id DESC";
$query = mysqli_query($conexion, $sql_fetch_todos);
$numero = mysqli_num_rows($query);
$hora =  date('Y-m-d H:i:s');   
    
?>
                
<head>


<style>
.table-responsive {
    display: block;
    width: 100%;
    overflow-x: auto;
}    

.boton : hover {
    background-image: linear-gradient(#9F2241, #98989A);
}
    </style>
</head>

<body>

                			    <div class="container">
                			        <div class="col-md-6">
                			            <a href="lista.php"><button><img src="img/sheimbaun.png" width="100%"></button></a>
                			        </div>
                			        
                			        <div class="col-md-6">
                			            <a href="lista_c.php"><button><img src="img/clara.png" width="100%"></button></a>
                			        </div>                			        
                			    </div>
                			    
                		<br>
                		
                		
<h1 style="color:#AF272F;">LISTA DE REGISTROS PARA CLAUDIA SHEINBAUM <button><a href="lista_pruebas.php"><li class="fa fa-file"></li></a></button></h1>                		
        <div class="input-group" style="width:100%;background-image: linear-gradient(#98989A, #9F2241);">
          <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1" style="background-color:#9F2241;color:white;border-radius: 5px;font-size:1.3em;"><strong>Filtro de tabla: </strong><span style="color:yellow;"><?php  echo $numero;?> filas</span></span>
          </div>
          <input id="entradafilter" type="text" class="form-control" placeholder="Ingrese concepto de busqueda" aria-label="Alumno" aria-describedby="basic-addon1">
        </div> 
<br>

                		
     <div class="table-responsive">


                    
        <table class="table table-striped">
            

            <br>
            
    <script>
                $(document).ready(function () {
           $('#entradafilter').keyup(function () {
              var rex = new RegExp($(this).val(), 'i');
                $('.contenidobusqueda tr').hide();
                $('.contenidobusqueda tr').filter(function () {
                    return rex.test($(this).text());
                }).show();
        
                })
        
        });
    </script>     



	    
                			    


            <tr style="background-image: linear-gradient(#98989A, #9F2241);color:white;font-size:1.2em;">
                <th scope="col">ID</th>
                <th scope="col">COLABORADOR</th>
                <th scope="col">AUXILIAR</th>
                <th scope="col">CONCEPTO</th>     
                <th scope="col">CANTIDAD JUSTIFICADA <br> EN IMAGEN</th>                     
                <th scope="col">FECHA</th>
                <th scope="col">HORA</th>
                <th scope="col">LATITUD</th>
                <th scope="col">LONGITUD</th>
                <th scope="col">DIRECCIÓN</th>
                <th scope="col">OPCIONES</th>
            </tr>
            <tbody class="contenidobusqueda">
                <?php
                while ($row = mysqli_fetch_array($query)) { ?>
                    <tr style="font-size:1.2em;color:black;">
                        <td style="max-width: 100%;"><?php echo $row['id'] ?></td>
                        <td style="max-width: 100%;"><?php echo $row['nombre'] ?></td>
                        <td style="max-width: 100%;"><?php echo $row['auxiliar'] ?></td>
                        <td style="max-width: 100%;"><?php echo $row['concepto'] ?></td>
                        <td style="max-width: 100%;"><?php echo $row['telefono'] ?></td>
                        <td style="max-width: 100%;"><?php echo $row['curp'] ?></td>
                        <td style="max-width: 100px;"><?php echo $row['direccion'] ?></td>
                        <td style="max-width: 100px;"><?php echo $row['lat'] ?></td>
                        <td style="max-width: 100px;"><?php echo $row['lon'] ?></td>
                        <td style="max-width: 100px;"><?php echo $row['tipo'] ?></td>
                          
                        
                        
                        <td>
                        <a target="_blank" class="boton fa fa-eye btn" href="ver_evidencia.php?id=<?php echo $row['id'];?>" role="button" style="color:white;background-image: linear-gradient(#98989A, #9F2241);">
                                EVIDENCIA
                            </a>
                        <a class="boton fa fa-map-marker btn" href="mapeo.php?id=<?php echo $row['id'];?>" role="button" style="color:white;background-image: linear-gradient(#98989A, #9F2241);">
                                MAPEAR
                            </a>
                         <a class="boton fa fa-dashboard btn" href="reportes/reporte_evidencias_cs.php?id=<?php echo $row['id'];?>" role="button" style="color:white;background-image: linear-gradient(#98989A, #9F2241);">
                                DIAPOSITIVA
                            </a>      
                         <a class="boton fa fa-dashboard btn" href="https://www.google.com/maps/search/<?php echo $row['tipo'];?>" role="button" style="color:white;background-image: linear-gradient(#98989A, #9F2241);">
                                BUSCAR GEOLOCALIZACIÓN
                            </a                              

                     
                            

                        </td>

                    </tr>
                <?php
                } ?>
            </tbody>
        
            
        </table>
        <br>

    <?php
    mysqli_close($conexion);
    ?>

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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
        

<?php 
}
ob_end_flush();
?>




</body>   
