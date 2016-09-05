<?php
$hostname = "localhost";
$database = "athenea";
$username = "root";
$password = "";

$conexion = conectar($hostname, $username, $password, $database);

/**
*Funcion Conexion con la Base de Datos
*@author Jhonatan Malaver & Andres Marentes 
*@param String $hostname Nombre del Host 
*@param String $username Nombre del Usuario con privilegios en la base de datos
*@param String $password Contraseña de Acceso
*@param String $database Nombre de la base de datos
*@return $conexion Variable de Conexion
*/
function conectar($hostname, $username, $password, $database){
	$conexion = mysqli_connect($hostname, $username, $password, $database);
	if (!$conexion) {
		echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
		echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
		echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
		exit();
	}
	return $conexion;
}


/**
*Funcion de Validacion del ID
*@author Jhonatan Malaver & Andres Marentes
*@param Int $digitos Id del registro
*@return Mensaje Error de Id, Redirecciona y cierra sesion ; ID
*/
function validar_id($digitos){
	$patron = "/^[[:digit:]]+$/";
	if (preg_match($patron, $digitos)) {
		return $digitos;
	} else {
		mysqli_close($conexion);
		print("<meta http-equiv='refresh' content='0.1; url=../index.php' />");
	}
}

?>
