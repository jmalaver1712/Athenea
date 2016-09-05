<?PHP
require_once('../../conexion/conexion.php');

$Id_Inves = $_POST['Id_Inves'];
$Id_Grupo = $_POST['Id_Grupo'];

$insertarR = $conexion->query("DELETE FROM fechas WHERE Id_Investigador = '$Id_Inves' AND Id_Grupo = '$Id_Grupo'", $conexion) or die ($mysqli->error);



$aux = 0;
$num = count($_POST);
while($aux <= $num){
// Nuevos
$Fecha_Ini = $_POST['Fecha_Ini'.$aux];
$Fecha_Fin = $_POST['Fecha_Fin'.$aux];
if (isset($Fecha_Ini) || isset($Fecha_Fin)){
$insertarR = $conexion->query("INSERT INTO fechas
(Id_Investigador, Id_Grupo, Fechas_Ini, Fechas_Fin)
VALUES 
('$Id_Inves', '$Id_Grupo', '$Fecha_Ini', '$Fecha_Fin')", $conexion) or die ($mysqli->error);
}


$Fecha_Ini_Old = $_POST['Fecha_Ini_Old'.$aux];
$Fecha_Fin_Old = $_POST['Fecha_Fin_Old'.$aux];
if (isset($Fecha_Ini_Old) || isset($Fecha_Fin_Old)){
$insertarR = $conexion->query("INSERT INTO fechas
(Id_Investigador, Id_Grupo, Fechas_Ini, Fechas_Fin)
VALUES 
('$Id_Inves', '$Id_Grupo', '$Fecha_Ini_Old', '$Fecha_Fin_Old')", $conexion) or die ($mysqli->error);
}

$aux++;
}

?>
<script type='text/javascript'>window.alert("Trayectoria Guardada")</script>
<script type='text/javascript'>history.go(-2)</script>
<?php
exit();
?>