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

if ($_SESSION['Escritorio']==1)
{
    
    

$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
if($action == 'ajax'){
	
	include('clases/orders.php');
	$database=new orders();
	//Recibir variables enviadas
	$query=strip_tags($_REQUEST['query']);
	$location=strip_tags($_REQUEST['location']);
	$status=strip_tags($_REQUEST['status']);
	$per_page=intval($_REQUEST['per_page']);
	$tables="orders";
	$campos="*";
	//Variables de paginación
	$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
	$adjacents  = 4; //espacio entre páginas después del número de adyacentes
	$offset = ($page - 1) * $per_page;
	
	
	$search=array("query"=>$query,"location"=>$location,"status"=>$status,"per_page"=>$per_page,"offset"=>$offset);
	//consulta principal para recuperar los datos
	$datos=$database->getData($tables,$campos,$search);
	$countAll=$database->getCounter();
	$row = $countAll;
	
	if ($row>0){
		$numrows = $countAll;;
	} else {
		$numrows=0;
	}	
	$total_pages = ceil($numrows/$per_page);
	
	
	//Recorrer los datos recuperados

	if ($numrows>0){
		?>
	 <table class="table table-striped table-hover ">	
		<thead>
            <tr>
                <th>#</th>
                <th>LIDER</th>
				<th>CANTIDAD</th>
				<th>FECHA</th>						
                <th>CANDIDATA</th>						
				<th>CONCEPTO</th>
				<th>ACCIÓN</th>
            </tr>
        </thead>
        <tbody>
		<?php
		$finales=0;
		foreach ($datos as $key=>$row){
				$status_order=$row['servicio'];
				if ($status_order=='clara'){
					$class_css="text-success";
				} elseif ($status_order=='sheimbaun'){
					$class_css="text-danger";
				} else {
					$class_css="";
				}
			?>
		<tr>
		    <td><?=$row['id'];?></td>
		    <td><a href="#"><img src="img/1.png" class="avatar" alt="Avatar"> <?=$row['name'];?></a></td>
			<td><?=$row['location'];?></td>
		    <td><?=date("d/m/Y", strtotime($row['date']));?></td>                        
			<td><span class="status <?=$class_css; ?>">&bull;</span> <?=$status_order;?></td>
			<td><?=$row['auxiliar'];?></td>
                        <td>
                        <a target="_blank" class="boton fa fa-eye btn" href="ver_evidencia.php?id=<?php echo $row['id'];?>" role="button" style="color:white;background-image: linear-gradient(#98989A, #9F2241);">
                                EVIDENCIA
                            </a>
                        <a class="boton fa fa-map-marker btn" href="mapeo.php?id=<?php echo $row['id'];?>" role="button" style="color:white;background-image: linear-gradient(#98989A, #9F2241);">
                                MAPEAR
                            </a>
                        <a class="boton fa fa-edit btn" href="editar_lista.php?id=<?php echo $row['id'];?>" role="button" style="color:white;background-image: linear-gradient(#98989A, #9F2241);">
                                EDITAR
                            </a>                            

                     
                            

                        </td>		</tr>
			<?php
			$finales++;
		}	
	?>
		</tbody>
		</table>
		<div class="clearfix">
			<?php 
				$inicios=$offset+1;
				$finales+=$inicios -1;
				echo '<div class="hint-text">Mostrando '.$inicios.' al '.$finales.' de '.$numrows.' registros</div>';
				
				
				include 'clases/pagination.php'; //include pagination class
				$pagination=new Pagination($page, $total_pages, $adjacents);
				echo $pagination->paginate();

			?>
        </div>
	<?php
	}
}
?>



    </div>   

    <!-- Fin Contenido PHP-->
    <?php
}
else
{
 require 'noacceso.php';
}
?>
        <script type="text/javascript" src="scripts/clientes.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
        

<?php 
}
ob_end_flush();
?>