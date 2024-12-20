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

?>
<!--Contenido-->



<style>
  .columna{
        background: linear-gradient(#e66465, #9198e5);
        color:white;
        border-radius:15%;
  }
  .columna:hover{
        background: linear-gradient(#9198e5 , #e66465);
        color:white;
        border-radius:15%;      
  }
</style>

<body>

<br>

<div class="container">
    
            <h1 style="color:#9F2241;TEXT-ALIGN:CENTER;">Seleccione el tipo de propaganda de la cual cargará evidencia:
                    <br><br><li class="fa fa-arrow-down"></li><br><br>
            </h1>    
             
     <div class="row">



            
                    <div class="col-lg-6">



                                <br><br>  
                                <a href="registro_bardas.php?concepto=PEGOTES">  
                                <button class="columna" style="width:100%;border-radius: 15px;">
		                                <h3 style="font-family: montserrat;text-align: center;font-size: 25px;"><strong>PEGOTES	
																		</strong> 	
																	  </h3>
															  </button>
															  </a>	
                                <br><br>  
                                <a href="registro_bardas.php?concepto=BARDAS">  
                                <button class="columna" style="width:100%;border-radius: 15px;">
		                                <h3 style="font-family: montserrat;text-align: center;font-size: 25px;"><strong>BARDA</strong> 	
																	  </h3>
															  </button>
															  </a>

                                <br><br>  
                                <a href="registro_bardas.php?concepto=CARTELES">  

                                <button class="columna" style="width:100%;border-radius: 15px;">
		                                <h3 style="font-family: montserrat;text-align: center;font-size: 25px;"><strong>CARTELES 		
																		</strong> 	
																	  </h3>
															  </button>
															  </a>



															  <br><br>  
                                <a href="registro_bardas.php?concepto=LONAS">  
                                <button class="columna" style="width:100%;border-radius: 15px;">
		                                <h3 style="font-family: montserrat;text-align: center;font-size: 25px;"><strong>LONAS	 	
																		</strong> 	
																	  </h3>
															  </button>
															  </a>



				 </div>
														  






														  														  
                    

                    <div class="col-lg-6">


                                <br><br>  
                                <a href="registro_bardas.php?concepto=VOLANTES">  
                                <button class="columna" style="width:100%;border-radius: 15px;">
		                                <h3 style="font-family: montserrat;text-align: center;font-size: 25px;"><strong>VOLANTES 	 	
																		</strong> 	
																	  </h3>
															  </button>
															  </a>	


                                <br><br>  
                                <a href="registro_bardas.php?concepto=MICROPERFORADOS">  
                                <button class="columna" style="width:100%;border-radius: 15px;">
		                                <h3 style="font-family: montserrat;text-align: center;font-size: 25px;"><strong>MICROPERFORADOS 		
																		</strong> 	
																	  </h3>
															  </button>
															  </a>


															  
															                                  <br><br>  
                                <a href="registro_bardas.php?concepto=SEMAFOROS">  
                                <button class="columna" style="width:100%;border-radius: 15px;">
		                                <h3 style="font-family: montserrat;text-align: center;font-size: 25px;"><strong>PROMOCIÓN EN SEMAFOROS</strong> 	
																	  </h3>
															  </button>
															  </a>														  															  															  															   
                    


</div>
                </div>



            
</div>
        <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> 



<br>
<?php
}

require 'footer.php';
?>
<script type="text/javascript" src="scripts/categoria.js"></script>
<script src="../public/js/chart.min.js"></script>
<script src="../public/js/Chart.bundle.min.js"></script> 
<script type=text/javascript>

document.oncontextmenu = function(){return false;}

</script>
<?php 
}
ob_end_flush();
?>

