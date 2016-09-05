<?php require_once('../admin/locked.php'); 

//3. Tomar los campos provenientes del Formulario
$Id_Semillero = $_POST['Id_Semillero'];
$grupo = $_POST['grupo'];
$NombreSem = $_POST['NombreSem'];
$Sede = $_POST['Sede'];
$Descripcion = $_POST['Descripcion'];
$Ano = $_POST['Ano'];
$Programa = $_POST['Programa'];
$Lider = $_POST['Lider'];
$Horas = $_POST['Horas'];
$Observaciones = $_POST['Observaciones'];

//Facultad
$Facultad = $_POST['Facultad'];
if ($Facultad == "Otro"){
	$Facultad = $_POST['Facultad2'];
}

$Id_Grupo ="";
if ($grupo != ""){
	$queryG = $conexion->query("SELECT * FROM grupos WHERE Nombres = '$grupo' ")or die ("Error 1 ".$mysqli->error);
	$veriG= mysqli_num_rows($queryG);
	if($veriG == 0){
		?>
		<script type='text/javascript'>window.alert("El Grupo No existe")</script>
		<script type='text/javascript'>history.go(-1)</script>
		<?php
		exit();
	}
	$rowG= $queryG->fetch_assoc();
	$Id_Grupo = $rowG['Id_Grupo'];
}



//Investigador Lider 
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
$Id_Investigador = $rowL['Id_Investigador'];




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
$Id_Investigadores = $acum1.$acum2;




//Actualizar Documento
$DocOld = $_POST['DocOld'];
$nombreFichero = $DocOld;

//Cambia Documento
if(isset($_FILES['doc']['name']) && $_FILES['doc']['name'] != ""){
	$directorio = "../documentos/semilleros/";
	$nombreFichero =  upload_doc($directorio);
}



//4. Insertar campos en la Base de Datos
$editar = $conexion->query("
	UPDATE semilleros SET
	Id_Grupo = '$Id_Grupo', 
	Nombres = '$NombreSem',
	Ano = '$Ano',  
	Descripcion = '$Descripcion', 
	Sede = '$Sede',
	Facultad = '$Facultad',
	Programa = '$Programa',
	Observaciones = '$Observaciones',
	Id_Investigador = '$Id_Investigador',  
	Horas = '$Horas',  
	Id_Investigadores = '$Id_Investigadores',
	Acta_Inicio = '$nombreFichero',
	Ult_Registro = '$Ult_Registro'
	WHERE Id_Semillero = '$Id_Semillero'" )or die ($mysqli->error);
	?>
	<script type='text/javascript'>window.alert("Semillero guardado Correctamente")</script>
	<script type='text/javascript'>history.go(-2)</script>
	<?php
	exit();
	?>