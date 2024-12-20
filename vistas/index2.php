<?php
//Activamos el almacenamiento en el buffer
ob_start();
session_start();
date_default_timezone_set("America/Mazatlan");
if (!isset($_SESSION["nombre"]))
{
  header("Location: login.html");
}
require 'header.php';
?>

<head>
<link rel="stylesheet" type="text/css" href="css/style.css">
<script type="text/javascript" src="js/script.js"></script>
</head>


<body>
    
    


    <div class="container">
        <div class="table-wrapper">


            <div class="row text-center" id="loader" style="position: absolute;top: 140px;left: 50%">
				
			</div>


			<div class="table-filter">
				<div class="row">
                    
                    <div class="col-sm-9">
						<button type="button" class="btn btn-primary"><i class="fa fa-search" onclick="load(1);"></i></button>
						<div class="filter-group">
							<label>Nombre</label>
							<input type="text" class="form-control" id="name">
						</div>
						<div class="filter-group">
							<label>CANDIDATA</label>
							<select class="form-control" id="location" onchange="load(1);"> 
								<option value="">Todos</option>
								<option value="Berlin">CLAUDIA SHEIMBAUN</option>
								<option value="London">CLARA BRUGADA</option>							
							</select>
						</div>
						<div class="filter-group">
							<label>Estado</label>
							<select class="form-control" id="status" onchange="load(1);">
								<option value="">Todos</option>
								<option value="Entregado">Entregado</option>
								<option value="Enviada">Enviada</option>
								<option value="Pendiente">Pendiente</option>
								<option value="Cancelado">Cancelado</option>
							</select>
						</div>
						<span class="filter-icon"><i class="fa fa-filter"></i></span>
                    </div>

                    <div class="col-sm-3 text-right">
						<div class="show-entries">
							<span>Mostrar</span>
							<select class="form-control" id="per_page" onchange="load(1);">
								<option>5</option>
								<option>10</option>
								<option selected="">15</option>
								<option>20</option>
							</select>
							
						</div>
					</div>


                </div>
			</div>
		<div class="datos_ajax">

		</div>	
            
			
        </div>
    </div>     
</body>

<?php
require 'footer.php';
?>
