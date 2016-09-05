<?php require_once('../admin/locked.php');

$NombreSem = $_POST['NombreSem'];
$grupo = $_POST['grupo'];
$ano = $_POST['ano'];
$descripcion = $_POST['descripcion'];
$Sede = $_POST['Sede'];
$Programa = $_POST['Programa'];
$Lider = $_POST['Lider'];
$Horas = $_POST['Horas'];
$Observaciones = $_POST['observaciones'];

//Facultad
$Facultad = $_POST['Facultad'];
if ($Facultad == "Otro"){
	$Facultad = $_POST['Facultad2'];
}

$Id_Investigador = valida_investigador($Lider, $conexion);


//Consulta Grupo 
$Id_Grupo ="";
if ($grupo != ""){
	$query2 = $conexion->query("SELECT * FROM grupos WHERE Nombres = '$grupo' ")or die ("Error 1 ".$mysqli->error);
	$veri2= mysqli_num_rows($query2);
	if($veri2 == 0){
		?>
		<script type='text/javascript'>window.alert("El Grupo No existe")</script>
		<script type='text/javascript'>history.go(-1)</script>
		<?php
		exit();
	}
	$row2= mysql_fetch_assoc($query2);
	$Id_Grupo = $row2['Id_Grupo'];
}

//Investigadores*
$aux = 0;
$Id_Investigadores = "-";
$Id_aux = "";
$num = count($_POST);
while($aux <= $num){
   $nombre = $_POST['Nombres'.$aux];
   if (isset($nombre)){
      $Id_aux = valida_investigador($nombre, $conexion);
      $Id_Investigadores = $Id_Investigadores.$Id_aux."-";
   }
   $aux++;
}

//Actualizar Documento
$nombreFichero = "";
$directorio =  "../documentos/semilleros/";
$nombreFichero =  upload_doc($directorio);

$consulta = $conexion->query ("INSERT INTO semilleros (Id_Grupo, Nombres, Ano, Descripcion, Sede, Facultad, Programa, Id_Investigador, Horas, Id_Investigadores, Acta_Inicio, Observaciones, Rectoria, Sede_CR, Ult_Registro) 
	values ('$Id_Grupo,', '$NombreSem', '$ano', '$descripcion', '$Sede', '$Facultad', '$Programa', '$Id_Investigador', '$Horas', '$Id_Investigadores', '$nombreFichero', '$Observaciones', '$Acc_Rect', '$Acc_Sede' ,'$Ult_Registro')")or die ("Fallo en la inserción");
?>
<script type='text/javascript'>window.alert("Guardado Correctamente")</script>
<script type='text/javascript'>history.go(-2)</script>
<?php
exit();
?>