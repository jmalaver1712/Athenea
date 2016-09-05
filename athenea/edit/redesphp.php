<?php require_once('../admin/locked.php');

$Id_Red = $_POST['Id_Red'];
$Nombre = $_POST['Nombre'];
$Sede = $_POST['Sede'];
$Investigador = $_POST['Investigador'];
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

$query = $conexion->query("SELECT * FROM investigadores WHERE Nombres = '$Investigador' ")or die ("Error 1 ".$mysqli->error);
$row= $query->fetch_assoc();
$veri= mysqli_num_rows($query);
if($veri == 0){
?>
<script type='text/javascript'>window.alert("Investigador No existe")</script>
<script type='text/javascript'>history.go(-1)</script>
<?php
exit();
}
else{
$Id_Investigador = $row['Id_Investigador'];
}


$instruccion = "UPDATE redes SET
Nombre = '$Nombre', 
Sede = '$Sede', 
Id_Investigador = '$Id_Investigador', 
Fecha_Inicio = '$Fecha_Inicio', 
Fecha_Renovacion = '$Fecha_Renovacion' , 
Pagina_Web = '$Pagina_Web' , 
Tipo_Red = '$Tipo_Red', 
Tipo_Asociacion = '$Tipo_Asociacion' , 
Costo_Afiliacion = '$Costo_Afiliacion' , 
Centro_Adscrito = '$Centro_Adscrito' , 
Facultad = '$Facultad' , 
Programa = '$Programa',
Constitucion = '$Constitucion' ,
Objetivo = '$Objetivo' ,
Compromisos = '$Compromisos' ,
Importancia = '$Importancia' ,
Logros = '$Logros' ,
Observaciones = '$Observaciones',
Ult_Registro = '$Ult_Registro'
WHERE Id_Red = '$Id_Red' ";
$consulta = $conexion->query($instruccion)
or die ("Fallo en la inserción".$mysqli->error);
?>
<script type='text/javascript'>window.alert("Guardado")</script>
<script type='text/javascript'>history.go(-2)</script>
<?php
      mysqli_close();
?>