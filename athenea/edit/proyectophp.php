<?php require_once('../admin/locked.php');

$Id_Proyecto = $_POST['Id_Proyecto'];
$Nombre = $_POST['Nombre'];
$Codigo_Proyecto = $_POST['Codigo_Proyecto'];
$Descripcion = $_POST['Descripcion'];
$Sede = $_POST['Sede'];
$Facultad = $_POST['Facultad'];
$Programa = $_POST['Programa'];
$Fecha_Inicio = $_POST['Fecha_Inicio'];
$Fecha_Fin = $_POST['Fecha_Fin'];
$Convenio = $_POST['Convenio'];
$Convenio_Esp = $_POST['Convenio_Esp'];
$Observaciones = $_POST['Observaciones'];

$Costo_Proyecto = $_POST['Costo_Proyecto'];
$Fin_Interna = $_POST['Fin_Interna'];
$Fin_Externa = $_POST['Fin_Externa'];

$Lider = $_POST['Lider'];
$Horas = $_POST['Horas'];

$Costo_Proyecto = $_POST['Costo_Proyecto'];


//valida RED	
$Red = $_POST['Red'];
$Id_Red = "";
if (isset($Red)){
	$queryR = $conexion->query("SELECT * FROM redes WHERE Nombre = '$Red' ")or die ("Error 1 ".$mysqli->error);
	$rowR= $queryR->fetch_assoc();
	$Id_Red = $rowR['Nombre'];
}

//Valida Lider del Proyecto
$queryL = $conexion->query("SELECT * FROM investigadores WHERE Nombres = '$Lider' ")or die ("Error 1 ".$mysqli->error);
$veriL= mysqli_num_rows($queryL);
if($veriL == 0){
	?>
	<script type='text/javascript'>window.alert("El Investigador Lider No existe")</script>
	<script type='text/javascript'>history.go(-1)</script>
	<?php
	exit();
}
$rowL= $queryL->fetch_assoc();
$Id_Investigador= $rowL['Id_Investigador'];

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
		$row2 = $query2->fetch_assoc();
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
		unlink("../documentos/proyectos/".$DocOld);
		$directorio = "../documentos/proyectos/";
		$nombreFichero =  upload_doc($directorio);
	}
}
	//Si no quiere Cambiar
else{
	$nombreFichero = $DocOld;
	$Tipo_Doc = $TipoOld;
}



$i=1;
while($i<4){
	$DocsAux = "";
	$Old_doc = $_POST['Old_doc'.$i];
	if(isset($_FILES['doc'.$i]['name']) && $_FILES['doc'.$i]['name'] != ""){
		$copiarFichero = false;

	// Copiar fichero en directorio de ficheros subidos
	// Se renombra para evitar que sobreescriba un fichero existente
	// Para garantizar la unicidad del nombre se añade una marca de tiempo

		unlink("../documentos/proyectos/".$Old_doc);

		if (is_uploaded_file ($_FILES['doc'.$i]['tmp_name']))
		{
			$nombreDirectorio = "../documentos/proyectos/";
			$DocsAux = $_FILES['doc'.$i]['name'];
			$tipoFichero = $_FILES['doc'.$i]['type'];
			$copiarFichero = true;

	//Renombrar el Archivo
			$extension = end(explode('.',$DocsAux)); 
			$idUnico = time();
			$DocsAux = $idUnico.$i.".".$extension;

		}
	// El fichero introducido supera el límite de tamaño permitido
		else if ($_FILES['doc'.$i]['error'] == UPLOAD_ERR_FORM_SIZE)
		{
			$maxsize = $_POST['MAX_FILE_SIZE'];
			$errores['doc'.$i] = "¡El tamaño del fichero supera el límite permitido ($maxsize bytes)!";
			$error = true;
		}
	// No se ha introducido ningún fichero
		else if ($_FILES['doc'.$i]['name'] == "")
			$DocsAux = '';
	// El fichero introducido no se ha podido subir
		else
		{
			$errores['doc'.$i] = "¡No se ha podido subir el fichero!";
			$error = true;
		}	  

	// Mover foto a su ubicación definitiva
		if ($copiarFichero)
			move_uploaded_file ($_FILES['doc'.$i]['tmp_name'], $nombreDirectorio . $DocsAux);
		$Doc[$i]= $DocsAux;
	}

	else{
		$Doc[$i] = $Old_doc;
	}

	$i++;
}




$edito = $conexion->query("UPDATE proyectos SET
	Nombre = '$Nombre', 
	Codigo_Proyecto = '$Codigo_Proyecto', 
	Sede = '$Sede', 
	Id_Investigador = $Id_Investigador, 
	Horas = '$Horas', 
	Id_Investigadores = '$Id_Investigadores',
	Facultad = '$Facultad', 
	Programa  = '$Programa', 
	Fecha_Inicio  = '$Fecha_Inicio', 
	Fecha_Fin  = '$Fecha_Fin', 
	Descripcion  = '$Descripcion', 
	Tipo_Encargado  = '$Tipo_Encargado', 
	Id_Encargado  = '$Id_Encargado', 
	Convenio  = '$Convenio', 
	Convenio_Esp  = '$Convenio_Esp', 
	Costo_Proyecto  = '$Costo_Proyecto', 
	Fin_Interna  = '$Fin_Interna', 
	Fin_Externa  = '$Fin_Externa', 
	Observaciones  = '$Observaciones', 
	Tipo_Doc  = '$Tipo_Doc', 
	URL = '$nombreFichero',
	Doc1 = '$Doc[1]',
	Doc2 = '$Doc[2]',
	Doc3 = '$Doc[3]',
	Ult_Registro = '$Ult_Registro'
	WHERE Id_Proyecto = '$Id_Proyecto'")or die ("Fallo en la inserción".$mysqli->error);
	?>
	<script type='text/javascript'>window.alert("Proyecto Actualizado")</script>
	<script type='text/javascript'>history.go(-2)</script>
	<?php
	exit();	  

	?>