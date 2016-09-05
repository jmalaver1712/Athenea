<?php
require_once('../../conexion/conexion.php');

//3. Tomar los campos provenientes del Formulario
$Titulo = $_POST['Titulo'];
$Resumen = $_POST['Resumen'];
$Fecha_public = $_POST['Fecha_Publicacion'];
$Fecha_Cadu = $_POST['Fecha_Caducidad'];
$URL_Not = $_POST['URL_Not'];
$Estado = $_POST['Estado'];

$Noticia = "%%";
$num = count($_POST);
while($aux <= $num){
	// Lineas de Nuevas
	$not = $_POST['cond'.$aux];
	if (isset($not)){
		$Noticia = $Noticia.$not."%%";
	}
	$aux++;
}

//Documento o enlace
$nombreFichero = "";
$directorio =  "../documentos/noticias/";
$nombreFichero =  upload_doc($directorio);

$insertar =$conexion->query("INSERT INTO noticias
   (Titulo, Resumen, Imagen, URL, Noticia, Fecha_public, Fecha_cadu, Estado)
   VALUES 
   ('$Titulo', '$Resumen', '$nombreFichero', '$URL_not', '$Noticia', '$Fecha_public', '$Fecha_Cadu', '$Estado')") or die ($mysqli->error);

   ?>
   <script type='text/javascript'>window.alert("Guardado")</script>
   <script type='text/javascript'>history.go(-2)</script>
   <?php
   exit();
   ?>