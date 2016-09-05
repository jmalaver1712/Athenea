<?php require_once('../admin/locked.php');

$titulo = $_POST['titulo'];
$ano = $_POST['ano'];
$facultad = $_POST['facultad'];
$programa = $_POST['programa'];
$Nombre_Par = $_POST['Nombre_Par'];
$sede = $_POST['sede'];
$ciudad = $_POST['ciudad'];
$pais = $_POST['pais'];
$editorial = $_POST['editorial'];
$isbn = $_POST['isbn'];
$compilador = $_POST['compilador'];
$palabras_c = $_POST['palabras_c'];
$Observaciones = $_POST['observaciones'];

//autores	
$aux = 0;
$Id_Investigadores = "-";
$Id_aux = "";
$num = count($_POST);
while($aux <= $num){
   $aux++;
   $nombre = $_POST['Nombres'.$aux];
   if (isset($nombre)){
      $Id_aux = valida_investigador($nombre, $conexion);
      $Id_Investigadores = $Id_Investigadores.$Id_aux;
   }
}
$Id_Autores = $Id_Investigadores;


$Tipo_Encargado = "";
$Id_Encargado = "";
$Tipo_Encargado = $_POST['Tipo'];
if($Tipo_Encargado != "on"){
   if($Tipo_Encargado == "investigadores"){$Encargado = $_POST['Investigador'];}
   if($Tipo_Encargado == "grupos"){$Encargado = $_POST['Grupo'];}
   if($Tipo_Encargado == "semilleros"){$Encargado = $_POST['Semillero'];}
   $Id_Encargado = valida_encargado($Tipo_Encargado, $Encargado);
}


$nombreFichero = "";
$Tipo_Doc = $_POST['SubeDoc'];
if($Tipo_Doc != "Documento"){
   $nombreFichero = $_POST['Enlace1'];
}
else{
   $directorio =  "../documentos/libro/";
   $nombreFichero =  upload_doc($directorio);
}

$instruccion = "insert into libro (Titulo, Autores, Tipo_Encargado, Id_Encargado, Nombre_Par , Programa, Facultad, Sede, Ciudad, Pais, Editorial, ISBN, Compilador, Ano, Palabras_Claves, Tipo_Doc, URL, Observaciones, Rectoria, Sede_CR, Ult_Registro)
values ('$titulo', '$Id_Autores', '$Tipo_Encargado', '$Id_Encargado', '$Nombre_Par' , '$programa', '$facultad', '$sede', '$ciudad', '$pais','$editorial', '$isbn', '$compilador', '$ano', '$palabras_c', '$Tipo_Doc' , '$nombreFichero', '$Observaciones', '$Acc_Rect', '$Acc_Sede', '$Ult_Registro') ";


$consulta = $conexion->query($instruccion)
or die ("Fallo en la inserción");
?>
<script type='text/javascript'>window.alert("Guardado")</script>
<script type='text/javascript'>history.go(-2)</script>
<?php
mysqli_close();
?>