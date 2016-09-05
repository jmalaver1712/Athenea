<?php require_once('../admin/locked.php');
//3. Tomar los campos provenientes del Formulario
$Id_Grupo = $_POST['Id_Grupo'];
$NombreGrupo = $_POST['NombreGrupo'];
$Sede = $_POST['Sede'];
$CvLAC = $_POST['CvLAC'];
$Resena = $_POST['Resena'];
$Creacion = $_POST['Creacion'];
$Categoria = $_POST['Categoria'];
$Lider = $_POST['Lider'];
$Presentacion = $_POST['Presentacion'];
$Observaciones = $_POST['Observaciones'];

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


$query1 = $conexion->query("SELECT * FROM investigadores WHERE Nombres = '$Lider' ")or die ("Error 1 ".$mysqli->error);
$veri1= mysqli_num_rows($query1);
if($veri1 == 0){
	?>
	<script type='text/javascript'>window.alert("El Investigador Lider No existe")</script>
	<script type='text/javascript'>history.go(-1)</script>
	<?php
	exit();
}
$row1= $query1->fetch_assoc();
$Id_Investigador = $row1['Id_Investigador'];
$Correo_Grupo = $row1['Correo'];


$aux = 0;
$acum1 = "";
$acum2 = "";
$Id_Investigadores = "";
$Lineas1 = "";
$Lineas2 = "";
$Categorias = "";
$Cate1 = "";
$Cate2 = "";
$Red1 = "";
$Red2 = "";

$num = count($_POST);
while($aux <= $num){

// Lineas de Nuevas
	$dinamica1 = $_POST['dim'.$aux];
	if (isset($dinamica1)){
		$Lineas1 = $Lineas1.$dinamica1."#";
	}

// Lineas de Viejas
	$dinamica2 = $_POST['Vet'.$aux];
	if (isset($dinamica2)){
		$Lineas2 = $Lineas2.$dinamica2."#";
	}

// Categoria Nuevas
	$Categoria = $_POST['Categoria'.$aux];
	if (isset($Categoria)){
		$Cate1 = $Cate1."%%".$Categoria;
	}

// Categoria Viejas
	$Categoria = $_POST['Cate_Old'.$aux];
	if (isset($Categoria)){
		$Cate2 = $Cate2."%%".$Categoria;
	}


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



//Redes Nuevos
	$redes = $_POST['Red_G'.$aux];
	if (isset($redes)){
		$queryR = $conexion->query("SELECT * FROM redes WHERE Nombre = '$redes' ")or die ("Error 1 ".$mysqli->error);
		$rowR= $queryR->fetch_assoc();
		$veriR= mysqli_num_rows($queryR);
		if($veriR == 0){
			?>
			<script type='text/javascript'>window.alert("La Red No existe")</script>
			<script type='text/javascript'>history.go(-1)</script>
			<?php
			exit();
		}
		$Red1 = $Red1.$rowR['Id_Red']."%%";
	}



//Investigadores viejos
	$redes2 = $_POST['Red_O'.$aux];
	if (isset($redes2)){
		$queryRO = $conexion->query("SELECT * FROM redes WHERE Nombre = '$redes2' ")or die ("Error 1 ".$mysqli->error);
		$rowRO = $queryRO->fetch_assoc();
		$veriRO = mysqli_num_rows($queryRO);
		if($veriRO == 0){
			?>
			<script type='text/javascript'>window.alert("La Red No existe")</script>
			<script type='text/javascript'>history.go(-1)</script>
			<?php
			exit();
		}
		$Red2 = $Red2.$rowRO['Id_Red']."%%";
	}

	$aux++;
}
$Id_Investigadores = "-".$acum1.$acum2;
$Lineas = $Lineas1.$Lineas2;
$Categorias = $Cate1.$Cate2;
$Id_Red = "%%".$Red1.$Red2;




//Actualizar Documento
$DocOld = $_POST['DocOld'];
$nombreFichero = "";
$Cambia = $_POST['Cambia'];
//Cambia Documento
if ($Cambia == "Cambiar"){
	unlink("../documentos/grupos/".$DocOld);
	$directorio = "../documentos/grupos/";
	$nombreFichero =  upload_doc($directorio);
}
	//Si no quiere Cambiar
else{
	$nombreFichero = $DocOld;
}

//4. Insertar campos en la Base de Datos
$editar = $conexion->query("
	UPDATE grupos SET
	Nombres = '$NombreGrupo', 
	CvLAC = '$CvLAC', 
	Id_Red = '$Id_Red', 
	Sede = '$Sede', 
	Facultad = '$Facultad', 
	Resena = '$Resena', 
	Creacion = '$Creacion', 
	Id_Investigador = '$Id_Investigador', 
	Correo_Grupo = '$Correo_Grupo', 
	Id_Investigadores = '$Id_Investigadores', 
	Categoria = '$Categorias', 
	Observaciones = '$Observaciones', 
	Acta = '$nombreFichero', 
	Lineas = '$Lineas',
	Ult_Registro = '$Ult_Registro'
	WHERE Id_Grupo = '$Id_Grupo'" )or die ($mysqli->error);
	?>
	<script type='text/javascript'>window.alert("Grupo guardado Correctamente")</script>
	<script type='text/javascript'>history.go(-2)</script>
	<?php
	exit();
	?>