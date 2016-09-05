<?php require_once('../admin/locked.php');

$Autor = $_POST['Autor'];
$ano = $_POST['ano'];
$titulo = $_POST['titulo'];
$libro = $_POST['libro'];
$Compilador = $_POST['Compilador'];
$paginas = $_POST['paginas'];
$ciudad = $_POST['ciudad'];
$pais = $_POST['pais'];
$editorial = $_POST['editorial'];
$isbn = $_POST['isbn'];
$Nombre_Par = $_POST['Nombre_Par'];
$Observaciones = $_POST['observaciones'];


$Tipo_Encargado = "";
$Id_Encargado = "";
$Tipo_Encargado = $_POST['Tipo'];
if($Tipo_Encargado != "on"){
   if($Tipo_Encargado == "investigadores"){$Encargado = $_POST['Investigador'];}
   if($Tipo_Encargado == "grupos"){$Encargado = $_POST['Grupo'];}
   if($Tipo_Encargado == "semilleros"){$Encargado = $_POST['Semillero'];}

   $Id_Encargado = valida_encargado($Tipo_Encargado, $Encargado);
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

//Documento o enlace
$nombreFichero = "";
$Tipo_Doc = $_POST['SubeDoc'];
if($Tipo_Doc != "Documento"){
   $nombreFichero = $_POST['Enlace1'];
}
else{
	$directorio =  "../documentos/capitulo/";
   $nombreFichero =  upload_doc($directorio);
}

$instruccion = "insert into capitulo (Tipo_Encargado, Id_Encargado, Titulo, Id_Investigadores, Libro, Compilador, Nombre_Par, Pags, Ciudad, Pais, Editorial, ISBN, Ano, Tipo_Doc, URL, Observaciones, Rectoria, Sede_CR, Ult_Registro) 
values ('$Tipo_Encargado', '$Id_Encargado', '$titulo', '$Id_Investigadores', '$libro', '$Compilador', '$Nombre_Par', '$paginas', '$ciudad', '$pais', '$editorial', '$isbn', '$ano', '$Tipo_Doc', '$nombreFichero', '$Observaciones', '$Acc_Rect', '$Acc_Sede', '$Ult_Registro') ";


$consulta = $conexion->query($instruccion) or die ("Fallo en la inserción".$mysqli->error);
?>
<script type='text/javascript'>window.alert("Guardado")</script>
<script type='text/javascript'>history.go(-2)</script>
<?php
mysqli_close();
?>