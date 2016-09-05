<?php require_once('../admin/locked.php');

$Nombre = $_POST['Nombre'];
$Sede = $_POST['Sede'];
$Representante = $_POST['Representante'];
$Fecha_Inicio = $_POST['Fecha_Inicio'];
$Fecha_Renovacion = $_POST['Fecha_Renovacion'];
$Pagina_Web = $_POST['Pagina_Web'];
$Tipo_Red = $_POST['Tipo_Red'];
$Tipo_Asociacion = $_POST['Tipo_Asociacion'];
$Costo_Afiliacion = $_POST['Costo_Afiliacion'];
$Centro_Adscrito = $_POST['Centro_Adscrito'];
$Facultad = $_POST['Facultad'];
$Programa = $_POST['Programa'];
$Constitucion = $_POST['Constitucion'];
$Objetivo = $_POST['Objetivo'];
$Compromisos = $_POST['Compromisos'];
$Importancia = $_POST['Importancia'];
$Logros = $_POST['Logros'];
$Observaciones = $_POST['Observaciones'];


$Id_Investigador = valida_investigador($Representante, $conexion);

$instruccion = "INSERT INTO redes (Nombre, Sede, Id_Investigador , Fecha_Inicio, Fecha_Renovacion , Pagina_Web , Tipo_Red, Tipo_Asociacion , Costo_Afiliacion , Centro_Adscrito , Facultad , Programa ,Constitucion ,Objetivo ,Compromisos ,Importancia ,Logros ,Observaciones, Rectoria, Sede_CR, Ult_Registro)
values ('$Nombre', '$Sede', '$Id_Investigador', '$Fecha_Inicio', '$Fecha_Renovacion' , '$Pagina_Web' , '$Tipo_Red', '$Tipo_Asociacion', '$Costo_Afiliacion' , '$Centro_Adscrito' , '$Facultad' , '$Programa' , '$Constitucion' ,'$Objetivo' ,'$Compromisos' ,'$Importancia' ,'$Logros' ,'$Observaciones', '$Acc_Rect', '$Acc_Sede', '$Ult_Registro')";
$consulta = $conexion->query($instruccion)or die ("Fallo en la inserción".$mysqli->error);
?>
<script type='text/javascript'>window.alert("Guardado")</script>
<script type='text/javascript'>history.go(-2)</script>
<?php
      mysqli_close();
?>