<?php require_once('../admin/locked.php');


//3. Tomar los campos provenientes del Formulario
$NombreGrupo = $_POST['NombreGrupo'];

$CvLAC = $_POST['CvLAC'];
$Resena = $_POST['Resena'];
$Sede = $_POST['Sede'];
$Creacion = $_POST['Creacion'];
$Categoria = $_POST['Categoria'];
$Lider = $_POST['Lider'];
$Presentacion = $_POST['Presentacion'];
$Observaciones = $_POST['observaciones'];

//Redes
$Redes = $_POST['Redes'];
if($Redes == ""){
	$Id_Red = 0;
}
else{
	$queryR = $conexion->query("SELECT * FROM redes WHERE Nombre = '$Redes' ")or die ("Error 1 ".$mysqli->error);
	$veriR = mysqli_num_rows($queryR);
	if($veriR == 0){
		?>
		<script type='text/javascript'>window.alert("La Red No existe")</script>
		<?php
	}
	$rowR= $queryR->fetch_assoc();
	$Id_Red = $rowR['Id_Red'];
}


//Facultad
$Facultad = $_POST['Facultad'];
if ($Facultad == "Otro"){
	$Facultad = $_POST['Facultad2'];
}


$query1 = $conexion->query("SELECT * FROM investigadores WHERE Nombres = '$Lider'")or die ("Error 1 ".$mysqli->error);
$veri1= mysqli_num_rows($query1);
if($veri1 == 0){
	?>
	<script type='text/javascript'>window.alert("El Investigador Lider No existe")</script>
	<script type='text/javascript'>history.go(-1)</script>
	<?php
	exit();
}
$row1= mysql_fetch_assoc($query1);
$Id_Investigador = $row1['Id_Investigador'];

$Correo_Grupo = $row1['Correo'];



$aux = 0;
$Id_Investigadores = "-";
$Lineas = "";
$Categorias = "";
$Id_aux = "";
$num = count($_POST);
while($aux <= $num){

// Lineas de Investigacion
	$dinamica = $_POST['dim'.$aux];
	if (isset($dinamica)){
		$Lineas = $Lineas.$dinamica."#";
	}

// Categoria
	$Categoria = $_POST['Categoria'.$aux];
	if (isset($Categoria)){
		$Categorias = $Categorias."%%".$Categoria;
	}

//Investigadores 
	$nombre = $_POST['Nombres'.$aux];
	if (isset($nombre)){
		$Id_aux = valida_investigador($nombre, $conexion);
		$Id_Investigadores = $Id_Investigadores.$Id_aux."-";
	}
	$aux++;
}


$directorio =  "../documentos/grupos/";
$nombreFichero =  upload_doc($directorio);


//4. Insertar campos en la Base de Datos (No inserto el id_empleado ya que se genera automaticamente)
$insertar = $conexion->query("INSERT INTO grupos 
	(Nombres, CvLAC, Id_Red, Sede, Facultad, Resena, Creacion, Id_Investigador, Correo_Grupo, Id_Investigadores, Categoria, Lineas, Observaciones, Acta, Rectoria, Sede_CR, Ult_Registro)
	VALUES('$NombreGrupo', '$CvLAC', '$Id_Red', '$Sede', '$Facultad', '$Resena', '$Creacion', '$Id_Investigador', '$Correo_Grupo', '$Id_Investigadores', '$Categorias', '$Lineas', '$Observaciones', '$nombreFichero','$Acc_Rect', '$Acc_Sede', '$Ult_Registro')")or die ($mysqli->error);
	?>
	<script type='text/javascript'>window.alert("Grupo guardado Correctamente")</script>
	<script type='text/javascript'>history.go(-2)</script>
	<?php
	exit();
	?>