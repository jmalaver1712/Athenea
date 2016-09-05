<?php require_once('../admin/locked.php'); ?>
<?php
$Tabla = "semilleros";
$PT = "Id_Semillero";

$r0 = $conexion->query("SELECT * FROM $Tabla ")or die ("Error 2 ".$mysqli->error);
	while($row0= mysql_fetch_assoc($r0)){
	$Id = $row0[$PT];
		$conexion->query("UPDATE $Tabla SET 
		Sede_CR = ''
		WHERE $PT = '$Id'")or die ("Error 3 ".$mysqli->error);
	}
	
$r1 = $conexion->query("SELECT * FROM ingreso")or die ("Error 1 ".$mysqli->error);
while($row= mysql_fetch_assoc($r1)){
$Nombre = $row['Nombre'];
$Sede = $row['Sede'];
	$r2 = $conexion->query("SELECT * FROM $Tabla WHERE Ult_Registro LIKE '%$Nombre%' ")or die ("Error 2 ".$mysqli->error);
	while($row2= mysql_fetch_assoc($r2)){
	$Id = $row2[$PT];
		$r3 = $conexion->query("UPDATE $Tabla SET 
		Sede_CR = '$Sede'
		WHERE $PT = '$Id'")or die ("Error 3 ".$mysqli->error);
		echo "<br>Exito".$Id." - ".$Sede;
	}
}

?>