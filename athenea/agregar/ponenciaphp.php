<?php require_once('../admin/locked.php');

$titulo = $_POST['titulo'];
$evento = $_POST['evento'];
$ciudad = $_POST['ciudad'];
$pais = $_POST['pais'];
$fecha = $_POST['fecha'];
$Observaciones = $_POST['observaciones'];


//Tipo de Encargado	
$Tipo_Encargado = "";
$Id_Encargado = "";
$Tipo_Encargado = $_POST['Tipo'];
if($Tipo_Encargado != "on"){
 if($Tipo_Encargado == "investigadores"){$Encargado = $_POST['Investigador'];}
 if($Tipo_Encargado == "grupos"){$Encargado = $_POST['Grupo'];}
 if($Tipo_Encargado == "semilleros"){$Encargado = $_POST['Semillero'];}
 
 $Id_Encargado = valida_encargado($Tipo_Encargado, $Encargado);
}


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


//Documento o enlace
$nombreFichero = "";
$Tipo_Doc = $_POST['SubeDoc'];
if($Tipo_Doc != "Documento"){
 $nombreFichero = $_POST['Enlace1'];
}
else{
  $directorio =  "../documentos/ponencia/";
  $nombreFichero =  upload_doc($directorio);
}

$instruccion = "insert into ponencia (Titulo, Id_Investigadores, Tipo_Encargado, Id_Encargado, Evento, Ciudad, Pais, Fecha, Tipo_Doc, URL, Observaciones, Rectoria, Sede_CR, Ult_Registro) 
values ('$titulo', '$Id_Investigadores', '$Tipo_Encargado', '$Id_Encargado', '$evento', '$ciudad', '$pais', '$fecha', '$Tipo_Doc', '$nombreFichero', '$Observaciones', '$Acc_Rect', '$Acc_Sede', 
'$Ult_Registro') ";

$consulta = $conexion->query ($instruccion)or die ("Fallo en la inserción");
?>
<script type='text/javascript'>window.alert("Guardado")</script>
<script type='text/javascript'>history.go(-2)</script>
<?php

mysqli_close();
?>