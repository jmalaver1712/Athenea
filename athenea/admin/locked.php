<?php if (!isset($_SESSION)) {@session_start();}
		// ** Logout the current user. **
$logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
	$logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){
		//to fully log out a visitor we need to clear the session varialbles
	$_SESSION['MM_Username'] = NULL;
	$_SESSION['MM_UserGroup'] = NULL;
	$_SESSION['PrevUrl'] = NULL;
	unset($_SESSION['MM_Username']);
	unset($_SESSION['MM_UserGroup']);
	unset($_SESSION['PrevUrl']);

	$logoutGoTo = "../index.html";
	if ($logoutGoTo) {
		header("Location: $logoutGoTo");
		exit;
	}
}
if(isset($_SESSION['MM_Username'])){
	$usuario = $_SESSION['MM_Username'];
}
else{
	$logoutGoTo = "../../index.html";
	header("Location: $logoutGoTo");
}

require_once('../../conexion/conexion.php');

$Usuario_Acceso = $_SESSION['MM_Username'];
$usuario = $conexion->query("SELECT * FROM ingreso WHERE User = '$Usuario_Acceso' ")or die ("Error 1 ".$mysqli->error);
$row_user = $usuario->fetch_assoc();

$Acc_Id = $row_user['Id_User'];
$Acc_Nombre = $row_user['Nombre'];
$Acc_Rect = $row_user['Rectoria'];
$Acc_Sede = $row_user['Sede'];

$Fec_Reg = date("d/m/Y");
$Ult_Registro = $Acc_Nombre." - ".$Fec_Reg;


/**
*Funcion Valida Encargado: Valida que los registros de los encargados si exitan en la base de datos
*@author Jhonatan Malaver & Andres Marentes
*@param String $Tipo_Encargado Tipo de encargado (Semillero, Grupo o Investigador)
*@param String $Encargado Tipo de encargado (Semillero, Grupo o Investigador)
*@return Int $Id_Encargado Id del Encargado
*/
function valida_encargado($Tipo_Encargado, $Encargado , $conexion){
	if (isset($Tipo_Encargado) || isset($Encargado) && $Encargado != 0){ 
		$query = $conexion->query("SELECT * FROM $Tipo_Encargado WHERE Nombres = '$Encargado' ")or die ("Error 1 ".$mysqli->error);
		$row= $query->fetch_assoc();
		$veri= mysqli_num_rows($query);
		if($veri == 0){
			?>
			<script type='text/javascript'>window.alert("El Encargado no Existe")</script>
			<script type='text/javascript'>history.go(-1)</script>
			<?php
			exit();
		}
		if($Tipo_Encargado == "investigadores"){$Id_Encargado = $row['Id_Investigador'];}
		if($Tipo_Encargado == "grupos"){$Id_Encargado = $row['Id_Grupo'];}
		if($Tipo_Encargado == "semilleros"){$Id_Encargado = $row['Id_Semillero'];}
	}
	else{
		$Id_Encargado = 0;
	}
	return $Id_Encargado;
}



/**
*Funcion Upload Doc: sube el documento al directorio especifico
*@author Jhonatan Malaver & Andres Marentes
*@param String $directorio Carpeta donde se Alamacena el Documento
*@return strint $nombreFichero Nombre del Documento
*/
function upload_doc($directorio){

	$copiarFichero = false;
// Copiar fichero en directorio de ficheros subidos
// Se renombra para evitar que sobreescriba un fichero existente
// Para garantizar la unicidad del nombre se añade una marca de tiempo
	if (is_uploaded_file ($_FILES['doc']['tmp_name']))
	{
		$nombreDirectorio = $directorio;
		$nombreFichero = $_FILES['doc']['name'];
		$copiarFichero = true;

//Renombrar el Archivo
		$extension = end(explode('.',$nombreFichero)); 
		$idUnico = time();
		$nombreFichero = $idUnico.".".$extension;

	}
// El fichero introducido supera el límite de tamaño permitido
	else if ($_FILES['doc']['error'] == UPLOAD_ERR_FORM_SIZE)
	{
		$maxsize = $_POST['MAX_FILE_SIZE'];
		$errores["doc"] = "¡El tamaño del fichero supera el límite permitido ($maxsize bytes)!";
		$error = true;
	}
// No se ha introducido ningún fichero
	else if ($_FILES['doc']['name'] == "")
		$nombreFichero = '';
// El fichero introducido no se ha podido subir
	else
	{
		$errores["doc"] = "¡No se ha podido subir el fichero!";
		$error = true;
	}	  

// Mover foto a su ubicación definitiva
	if ($copiarFichero)
		move_uploaded_file ($_FILES['doc']['tmp_name'], $nombreDirectorio . $nombreFichero);

	return $nombreFichero;
}




/**
*Funcion Valida Intestigador: Valida que el investigador se encuentre registrado en la base de datos
*@author Jhonatan Malaver & Andres Marentes
*@param String $nombre Nombre del Investigador para que se haga la busqueda
*@return Int $id_investigador Id del Investigador
*/
function valida_investigador($nombre, $conexion){
	$query = $conexion->query("SELECT * FROM investigadores WHERE Nombres = '$nombre' ")or die ("Error 1 ".$mysqli->error);
	$row= $query->fetch_assoc();
	$veri= mysqli_num_rows($query);
	if($veri == 0){
		?>
		<script type='text/javascript'>window.alert("Algun Integrante No existe")</script>
		<script type='text/javascript'>history.go(-1)</script>
		<?php
		exit();
	}
	else{
		$regresa = $row['Id_Investigador'];	
		return $regresa; 
	}

}


?>