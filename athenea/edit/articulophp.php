<?php require_once('../admin/locked.php');

$Id_Articulo = $_POST['Id_Articulo'];
$titulo = $_POST['titulo'];
$revista = $_POST['revista'];
$issn = $_POST['issn'];
$ciudad = $_POST['ciudad'];
$pais = $_POST['pais'];
$ano = $_POST['ano'];
$volumen = $_POST['volumen'];
$fasciculo = $_POST['fasciculo'];
$paginas = $_POST['paginas'];
$indexacion = $_POST['indexacion'];
$Palabras_Clave = $_POST['Palabras_Clave'];
$detalles = $_POST['detalles'];
$Par = $_POST['Par'];
$Observaciones = $_POST['Observaciones'];
$DocOld = $_POST['DocOld'];
//Tipo de Encargado	
$Tipo_Encargado = $_POST['Tipo'];
if ($Tipo_Encargado != "on"){
	if($Tipo_Encargado == "investigadores"){$Encargado = $_POST['Investigador'];}
	if($Tipo_Encargado == "grupos"){$Encargado = $_POST['Grupo'];}
	if($Tipo_Encargado == "semilleros"){$Encargado = $_POST['Semillero'];}
//Valida
	$Id_Encargado = valida_encargado($Tipo_Encargado, $Encargado);
}
else{
	$Tipo_Encargado = "";
	$Id_Encargado = 0;
}


//Investigadores
$aux = 0;
$acum1 = "";
$acum2 = "";
$Id_Investigadores = "-";
$num = count($_POST);
while($aux <= $num){




//Investigadores Nuevos
	$nombre = $_POST['Nombres'.$aux];
	if (isset($nombre)){
		$query1 = $conexion->query("SELECT * FROM investigadores WHERE Nombres = '$nombre' ")or die ("Error 1 ".$mysqli->error);
		$row1= $query1->fetch_assoc();
		$veri1= mysqli_num_rows($query1);
		if($veri1 == 0){
			?>
			<script type='text/javascript'>window.alert("El Investigador No existe")</script>
			<script type='text/javascript'>history.go(-1)</script>
			<?php
			exit();
		}
		$acum1 = $acum1.$row1['Id_Investigador']."-";
	}



//Investigadores viejos
	$nombre2 = $_POST['Old'.$aux];
	if (isset($nombre2)){
		$query2 = $conexion->query("SELECT * FROM investigadores WHERE Nombres = '$nombre2' ")or die ("Error 1 ".$mysqli->error);
		$row2 =$query2->fetch_assoc();
		$veri2 = mysqli_num_rows($query2);
		if($veri2 == 0){
			?>
			<script type='text/javascript'>window.alert("El Investigador No existe")</script>
			<script type='text/javascript'>history.go(-1)</script>
			<?php
			exit();
		}
		$acum2 = $acum2.$row2['Id_Investigador']."-";
	}
	$aux++;
}
$Id_Investigadores = $Id_Investigadores.$acum1.$acum2;



//Actualizar Documento
$DocOld = $_POST['DocOld'];
$TipoOld = $_POST['TipoOld'];
$nombreFichero = "";
$Cambia = $_POST['Cambia'];
//Cambia Documento
if ($Cambia == "Cambiar"){
	$Tipo_Doc = $_POST['SubeDoc'];

		//Elige enlace
	if($Tipo_Doc == "Enlace"){$nombreFichero = $_POST['Enlace1'];}
		//Elige Documento
	if($Tipo_Doc == "Documento"){
		unlink("../documentos/articulo/".$DocOld);
		$directorio = "../documentos/articulo/";
		$nombreFichero =  upload_doc($directorio);
	}
}

	//Si no quiere Cambiar
else{
	$nombreFichero = $DocOld;
	$Tipo_Doc = $TipoOld;
}

$instruccion = "UPDATE articulo SET
Titulo = '$titulo',
Tipo_Encargado = '$Tipo_Encargado', 
Id_Encargado = '$Id_Encargado', 
Id_Investigadores = '$Id_Investigadores', 
Revista = '$revista', 
ISSN = '$issn', 
Ciudad = '$ciudad', 
Pais = '$pais', 
Ano = '$ano', 
Volumen = '$volumen', 
Fasciculo = '$fasciculo', 
Pags = '$paginas', 
Indexacion = '$indexacion', 
Detalles = '$detalles', 
Par = '$Par', 
Palabras_Clave = '$Palabras_Clave', 
Observaciones = '$Observaciones', 
Tipo_Doc = '$Tipo_Doc', 
URL = '$nombreFichero',
Ult_Registro = '$Ult_Registro'
WHERE Id_Articulo = '$Id_Articulo'";

$consulta = $conexion->query($instruccion)or die ("Fallo en la inserción".$mysqli->error);
?>
<script type='text/javascript'>window.alert("Guardado")</script>
<script type='text/javascript'>history.go(-2)</script>
