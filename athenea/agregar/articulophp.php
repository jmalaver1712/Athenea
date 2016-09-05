<?php require_once('../admin/locked.php');

//Articulo
$titulo = $_POST['titulo'];
$revista = $_POST['revista'];
$issn = $_POST['issn'];
$ciudad = $_POST['ciudad'];
$pais = $_POST['pais'];
$ano = $_POST['ano'];
$volumen = $_POST['volumen'];
$fasciculo = $_POST['fasciculo'];
$paginas = $_POST['paginas'];
$indexacion = $_POST['indexacion'];
$Palabras_Clave = $_POST['Palabras_Clave'];
$Par = $_POST['par'];
$Observaciones = $_POST['observaciones'];

//Indexacion 
$Detalles = "";
if($indexacion == "SI"){
   $Detalles = $_POST['detalles'];
}

//Tipo de Encargado  

$Tipo_Encargado = $_POST['Tipo'];
if($Tipo_Encargado == "investigadores"){$Encargado = $_POST['Investigador'];}
if($Tipo_Encargado == "grupos"){$Encargado = $_POST['Grupo'];}
if($Tipo_Encargado == "semilleros"){$Encargado = $_POST['Semillero'];}

$Id_Encargado = valida_encargado($Tipo_Encargado, $Encargado, $conexion);


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
   $directorio = "../documentos/articulo/";
   $nombreFichero =  upload_doc($directorio);
}



$instruccion = "insert into articulo (Titulo, Tipo_Encargado, Id_Encargado, Id_Investigadores,  
Revista, ISSN, Ciudad, Pais, Ano, Volumen, Fasciculo, Pags, Indexacion, Detalles, Par, Palabras_Clave, Tipo_Doc, URL, Observaciones, Rectoria, Sede_CR, Ult_Registro) 
values ('$titulo', '$Tipo_Encargado', '$Id_Encargado', '$Id_Investigadores', '$revista', '$issn', '$ciudad', '$pais', 
'$ano', '$volumen', '$fasciculo', '$paginas', '$indexacion', '$Detalles', '$Par', '$Palabras_Clave', '$Tipo_Doc', '$nombreFichero', '$Observaciones', '$Acc_Rect', '$Acc_Sede', '$Ult_Registro') ";

$consulta = $conexion->query($instruccion) or die ("Fallo en la inserción".$mysqli->error );
?>
<script type='text/javascript'>window.alert("Guardado")</script>
<script type='text/javascript'>history.go(-2)</script>
<?php
exit();
mysqli_close();
?>