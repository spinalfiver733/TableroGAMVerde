<?php

include("database.php");
class registros_material extends database {
	public $mysqli;
	public $counter;//Propiedad para almacenar el numero de registro devueltos por la consulta

	function __construct(){
		$this->mysqli = $this->conectar();
    }
	
	public function countAll($sql){
		$query=$this->mysqli->query($sql);
		$count=$query->num_rows;
		return $count;
	}
	
	public function getData($tables,$campos,$search){
		$offset=$search['offset'];
		$per_page=$search['per_page'];
		$sWhere=" registros_material.nombre LIKE '%".$search['query']."%'";
		if ($search['servicio']!=""){
			$sWhere.=" and registros_material.servicio = '".$search['servicio']."'";
		}
		if ($search['concepto']!=""){
			$sWhere.=" and registros_material.concepto = '".$search['concepto']."'";
		}
		$sWhere.=" order by registros_material.id desc";
		$sql="SELECT $campos FROM  $tables where $sWhere LIMIT $offset,$per_page";
		
		$query=$this->mysqli->query($sql);
		$sql1="SELECT $campos FROM  $tables where $sWhere";
		$nums_row=$this->countAll($sql1);
		//Set counter
		$this->setCounter($nums_row);
		return $query;
	}
	function setCounter($counter) {
		$this->counter = $counter;
	}
	function getCounter() {
		return $this->counter;
	}
}

