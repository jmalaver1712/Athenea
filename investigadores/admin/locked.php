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

		$logoutGoTo = "../../index.html";
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
		$usuario = $conexion->query("SELECT * FROM investigadores WHERE Documento = '$Usuario_Acceso' ")or die ("Error 1 ".$mysqli->error);
        $registro = mysqli_num_rows($usuario);
		$row_user = $usuario->fetch_assoc();
		
		$Acc_Id = $row_user['Id_investigador'];
		$Acc_Pass = $row_user['Documento'];
		$Acc_Nombre = $row_user['Nombres'];
		$Acc_Rect = $row_user['Institucion'];
		$Acc_Sede = $row_user['Nacionalidad'];
		

		$Fec_Reg = date("d/m/Y");
		$Ult_Registro = $Acc_Nombre." - ".$Fec_Reg;
		
		// '$Acc_Rect', '$Acc_Sede'
		?>