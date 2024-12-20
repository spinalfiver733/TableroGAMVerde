<?php
require_once "../modelos/Pagos.php";

$pago=new Pago();

//Variables
$idpago=isset($_POST["idpago"])? limpiarCadena($_POST["idpago"]):"";
$idprestamo=isset($_POST["idprestamo"])? limpiarCadena($_POST["idprestamo"]):"";
$usuario=isset($_POST["usuario"])? limpiarCadena($_POST["usuario"]):"";
$fecha=isset($_POST["fecha"])? limpiarCadena($_POST["fecha"]):"";
$cuota=isset($_POST["cuota"])? limpiarCadena($_POST["cuota"]):"";
$imagen=isset($_POST["imagen"])? limpiarCadena($_POST["imagen"]):"";


switch($_GET["op"]){
        
    case 'guardaryeditar':
                if (!file_exists($_FILES['imagen']['tmp_name']) || !is_uploaded_file($_FILES['imagen']['tmp_name']))
		{
			$imagen=$_POST["imagenactual"];
		}
		else 
		{
			$ext = explode(".", $_FILES["imagen"]["name"]);
			if ($_FILES['imagen']['type'] == "image/jpg" || $_FILES['imagen']['type'] == "image/jpeg" || $_FILES['imagen']['type'] == "image/png")
			{
				$imagen = round(microtime(true)) . '.' . end($ext);
				move_uploaded_file($_FILES["imagen"]["tmp_name"], "../files/comprobantes/" . $imagen);
			}
		}
        if(empty($idpago)){
            $rspta=$pago->insertar($idprestamo,$usuario,$fecha,$cuota,$imagen,$estado);
            echo $rspta ? "Pago Registrado" : "Pago No se Pudo Registrar";
        }
        else
        {
          $rspta=$pago->editar($idpago,$idprestamo,$usuario,$fecha,$cuota,$imagen,$estado);
            echo $rspta ? "Pago Actualizado" : "Pago no se pudo actualizar";
        }
    break;
        
    case 'eliminar':
        $rspta=$pago->eliminar($idpago);
        echo $rspta ? "Pago Eliminado" : "Pago no se puede eliminar";
    break;
    
        
    case 'mostrar':
        $rspta=$pago->mostrar($idpago);
        //Codificar resultado con json
        echo json_encode($idpago);
    break;
        
    case 'listar':
        $rspta=$pago->listar();
        //declaracion de array
        $data=Array();
        
        while ($reg=$rspta->fetch_object()){
            $data[]=array(
 			
            "0"=>$reg->cliente,
            "1"=>$reg->usuario,
            "2"=>$reg->fecha,
            "3"=>$reg->cuota,
            "4"=>"<img src='../files/comprobantes/".$reg->imagen."' height='100px' width='100px' >",
            "5"=>($reg->estado)?'<span class="label bg-primary">Pago validado</span>':'<span class="bg-danger">Pago Invalido</span>');
        }
        $results = array(
        "sEcho"=>1, //Informacion para el datatables
            "iTotalRecords"=>count($data), //Enviamos el total registros al datatable
            "iTotalDisplayRecords"=>count($data), //Enviamos el total de registros a visualizar
            "aaData"=>$data);
        echo json_encode($results);
    break;
        
    case 'selectPrestamo':
        require_once "../modelos/Prestamos.php";
		$prestamo = new Prestamo();
		$rspta = $prestamo->select();
		while ($reg = $rspta->fetch_object())
        {
            echo '<option value=' . $reg->idprestamo . '>' . $reg->nombre . '</option>';
        }
	break;
}
?>