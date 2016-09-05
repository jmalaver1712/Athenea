<?php 
require_once('../../conexion/conexion.php');

// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['usuario'])) {
  $loginUsername=$_POST['usuario'];
  
  $LoginRS__query=sprintf("SELECT * FROM investigadores WHERE Documento = '$loginUsername'"); 
  $LoginRS = $conexion->query($LoginRS__query) or die($mysqli->error);
  $row = $LoginRS->fetch_assoc();
  $Documento = $row['Documento'];
  
	$MM_fldUserAuthorization = "../pags/investigador.php?Doc=$Documento";
	$MM_redirectLoginSuccess = "../pags/investigador.php?Doc=$Documento";
	$MM_redirectLoginFailed = "../admin/error.php";
	$MM_redirecttoReferrer = false;

  $loginFoundUser = mysqli_num_rows($LoginRS);
 if ($loginFoundUser) {
     $loginStrGroup = "";
    
if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
  
}
?>