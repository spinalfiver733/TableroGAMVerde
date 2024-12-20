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
date_default_timezone_set('America/Mazatlan');
$fecha_actual = date("d-m-Y");
$hora_actual = date("h:i:s");
?>
<!--Contenido-->

<body>

<br>
<script>
    function Saltar(pal){
if (pal=='sesamo'){window.location="secreta.html"}
else {
    alert ('Respuesta equivocada')
    
    
    
    }
}
</script>

	<!-- Termina la definición del menú -->
	<main role="main" class="container">
	    
    
				<h1 style="text-align:center;font-family: sans-serif;color:#C91313;"><strong>REGISTRAR RECEPCIÓN DE MATERIAL</h1></strong></h1>

	    
			<!-- Aquí pon las col-x necesarias, comienza tu contenido, etcétera -->
			
			
                <form action="cargar_recepcion.php" method="POST" enctype="multipart/form-data" style="background-color:#DEB9B4;width:100%;text-align:center;">
                		<br>
                			<div class="col-12">
                                <input type="text" name="recibio"  hidden value="<?php echo $_SESSION["nombre"];?>">
                                
                                
                                <label style="color:black;font-size:1.2em;">Fecha </label><input type="text" name="fecha"  value="<?php echo $fecha_actual;?>" readonly>
                                <input type="text" name="hora"  value="<?php echo $hora_actual;?>" hidden>
                                
                                
                			    <br><br>
                			    <label style="color:black;font-size:1.2em;">Concepto </label>
                			    <select name="concepto">
                			       <option value="PEGOTES">PEGOTES</option> 
                			       <option value="BARDAS">BARDAS</option> 
                			       <option value="CARTELES">CARTELES</option> 
                			       <option value="LONAS">LONAS</option> 
                			       <option value="VOLANTES">VOLANTES</option> 
                			       <option value="MICROPERFORADOS">MICROPERFORADOS</option> 
                			       <option value="SEMAFOROS">SEMÁFOROS</option> 

                			    </select>
                			    
                			    
                			    
                			    <br><br>
                			    <label style="color:black;font-size:1.2em;">Cantidad </label>
                                <input type="number" name="cantidad" placeholder="digíte la cantidad" cols="5">
                                <br><br>
                			    
                			    
                			    <input type="text" name="icon" value="https://systemx.website/sistemamorena/vistas/img/icono.png" hidden>   
                			    
                			    <label style="color:black;font-size:1.2em;">Ingrese el nombre de la persona que entrego el material</label>
                			   <br>
                                <input type="text" name="entrego" width="70%">
                			    

                                
                                <br><br>
                			    <label  style="color:red;font-size:1.5em;"><li class="fa fa-arrow-down"> </li> Adjunte fotografía de recepción <li class="fa fa-arrow-down"> </li></label>
                			    <br>                                
                                <input class="form-control text-center col-md-6" type="file" name="foto" >      
                                
                				<textarea id="latitud" name="lat" hidden></textarea>
                				<textarea id="longitud" name="lon" hidden></textarea>
                				
                				

                				               				
<br><br>
                			<br>
                		    	<button type="submit" class="btn btn-success" style="float:center;width:50%;height:80px;"><strong>REGISTRAR RECEPCIÓN DE MATERIAL</strong></button>
                			
                			</div>          

                </form>		
                

    

	</main>
	
<br><br><br>	

	<script src="scripts/script_coordenadas.js">
	</script>
  <!--Fin-Contenido-->
<?php
}

require 'footer.php';
?>
<script src="../public/js/chart.min.js"></script>
<script src="../public/js/Chart.bundle.min.js"></script> 
<script type=text/javascript>

document.oncontextmenu = function(){return false;}

</script>
<?php 
}
ob_end_flush();
?>

