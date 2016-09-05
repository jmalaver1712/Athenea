<?php
require_once('../admin/locked.php');

$Id = validar_id($_GET['Id']);
$Tabla = $_GET['Tabla'];
$Campo = $_GET['Campo'];

if ($Tabla == 'investigadores'){
	eliminar_investigador($Id, $conexion);
}
if ($Tabla == "libro" || $Tabla == "articulo" || $Tabla == "capitulo" || $Tabla == "ponencia" || $Tabla == "proyectos"){
	eliminar_productos($Id, $Tabla, $Campo, $conexion);
}

eliminar($Id, $Tabla, $Campo, $conexion);


/**
*Funcion de Eliminación cualquier registro
*@author Jhonatan Malaver & Andres Marentes
*@param Int $Id Id del Registro
*@param String $Tabla Tabla del Registro 
*@param String $Campo Nombre del Campo Principal
*@return Mensaje Se Elimino la Información Correctamente
*/
function eliminar($Id, $Tabla, $Campo, $conexion){
	$borrar = $conexion->query("DELETE FROM $Tabla WHERE $Campo = '$Id'") or die($mysqli->error);
	print("	<script type='text/javascript'>window.alert('Se Elimino la Información Correctamente');</script> 
	<script type='text/javascript'>history.go(-2)</script>");
	exit();
}


/**
*Funcion de Eliminación de Investigadores
*@todo Elimina toda la informacion del investigador en el Sistema y sus relaciones con otras tablas
*@author Jhonatan Malaver & Andres Marentes
*@param Int $Id Id del Registro
*@return Mensaje eliminacion exitosa o fallida
*/
function eliminar_investigador($Id, $conexion){
	$consulta = $conexion->query("SELECT * FROM grupos WHERE Id_Investigadores LIKE '%$Id%' ")or die ("Error 1 ".$mysqli->error);
	while ($row= $consulta->fetch_assoc()) {
		//Busca y Elimina la informacion del investigador en los grupos como Integrante
		$Id_Investigadores = $row['Id_Investigadores'];
		$Investigadores = explode('-',$Id_Investigadores);
		$num = count($Investigadores);
		$Id_g = $row['Id_Grupo'];
		for ($i=1;$i<$num;$i++){
			$Id1 = $Investigadores[$i];
			if ($Id == $Id1)
				$new_inves = str_replace($Id."-","",$Id_Investigadores);
			$query = $conexion->query("UPDATE grupos SET Id_Investigadores = '$new_inves' WHERE Id_Grupo = '$Id_g' ")or die ("Error 1 ".$mysqli->error);
			$inte = $query->fetch_assoc();
		}		
	}


	$consulta1 = $conexion->query("SELECT * FROM semilleros WHERE Id_Investigadores LIKE '%$Id%' " )or die ("Error 1 ".$mysqli->error);
	while ($row= $consulta1->fetch_assoc()){
		//Busca y Elimina la informacion del investigador en los semilleros como Integrante
		$Id_Investigadores1 = $row['Id_Investigadores'];
		$Investigadores1 = explode('-',$Id_Investigadores1);
		$num1 = count($Investigadores1);
		$Id_s = $row['Id_Semillero'];
		for ($i=1;$i<$num1;$i++){
			$Id2 = $Investigadores1[$i];
			if ($Id == $Id2)
				$new_inves1 = str_replace($Id."-","",$Id_Investigadores);
			$query1 = $conexion->query("UPDATE semilleros SET Id_Investigadores = '$new_inves1' WHERE Id_Semillero = '$Id_s' ")or die ("Error 1 ".$mysqli->error);
			$inte1 = $query1->fetch_assoc();
		}		
	}

	$consulta2 = $conexion->query("SELECT * FROM grupos WHERE Id_Investigadores  = '$Id' " )or die ("Error 1 ".$mysqli->error);
	while ($row= $consulta2->fetch_assoc()){
		//Busca y Elimina la informacion del investigador en los grupos como Lider
		$Id_Investigador = $row['Id_Investigador'];
		$num2 = count($Id_Investigador);
		$Id_g1 = $row['Id_Grupo'];
		for ($i=1;$i<$num2;$i++){
			$query2 = $conexion->query("UPDATE grupos SET Id_Investigador = '' WHERE Id_Grupo = '$Id_g1' ")or die ("Error 1 ".$mysqli->error);
			$inte2 = $query->fetch_assoc();
		}
	}


	$consulta3 = $conexion->query("SELECT * FROM semilleros WHERE Id_Investigadores LIKE '%$Id%' " )or die ("Error 1 ".$mysqli->error);
	while ($row= $consulta3->fetch_assoc()){
		//Busca y Elimina la informacion del investigador en los grupos como Lider
		$Id_Investigador1 = $row['Id_Investigadores'];
		$num3 = count($Id_Investigador1);
		$Id_s1 = $row['Id_Semillero'];
		for ($i=1;$i<$num3;$i++){
			$query3 = $conexion->query("UPDATE semilleros SET Id_Investigadores = '' WHERE Id_Semillero = '$Id_s1' ")or die ("Error 1 ".$mysqli->error);
			$inte3 = $query1->fetch_assoc();
		}
	}
}


/**
*Funcion de Eliminación de documentos asociados a Productos de investigación (Libros, Ponencias, Articulos, Capitulos, etc.)
*@author Jhonatan Malaver & Andres Marentes
*@param Int $Id Id del Registro
*@param String $Tabla Tabla del Registro 
*@param String $Campo Nombre del Campo Principal
*@return Mensaje eliminacion exitosa o fallida
*/
function eliminar_productos($Id, $Tabla, $Campo, $conexion){
	$con1 = $conexion->query("SELECT * FROM $Tabla WHERE $Campo = '$Id' ")or die("Error 1 ".$mysqli->error);
	$row1 = $con1->fetch_assoc();
	$Doc = $row1['URL'];
	unlink("../documentos/".$Tabla."/".$Doc);
}
?>