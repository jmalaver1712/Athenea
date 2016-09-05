<?php require_once('../admin/locked.php');

$Nombre = $_POST['Nombre'];
$Codigo_Proyecto = $_POST['Codigo_Proyecto'];
$Descripcion = $_POST['Descripcion'];
$Sede = $_POST['Sede'];
$Facultad = $_POST['Facultad'];
$Programa = $_POST['Programa'];
$Fecha_Inicio = $_POST['Fecha_Inicio'];
$Fecha_Fin = $_POST['Fecha_Fin'];
$Convenio = $_POST['Convenio'];
$Convenio_Esp = $_POST['Convenio_Esp'];

$Costo_Proyecto = $_POST['Costo_Proyecto'];
$Fin_Interna = $_POST['Fin_Interna'];
$Fin_Externa = $_POST['Fin_Externa'];

$Lider = $_POST['Lider'];
$Horas = $_POST['Horas'];

$Costo_Proyecto = $_POST['Costo_Proyecto'];
$Observaciones = $_POST['observaciones'];


//Valida Lider del Proyecto
$Id_Investigador = valida_investigador($Lider, $conexion);


//Tipo de Encargado  
$Tipo_Encargado = "";
$Id_Encargado = "";
$Tipo_Encargado = $_POST['Tipo'];
if($Tipo_Encargado != "on"){
 if($Tipo_Encargado == "investigadores"){$Encargado = $_POST['Investigador'];}
 if($Tipo_Encargado == "grupos"){$Encargado = $_POST['Grupo'];}
 if($Tipo_Encargado == "semilleros"){$Encargado = $_POST['Semillero'];}
 $Id_Encargado = valida_encargado($Tipo_Encargado, $Encargado);
}


$aux = 0;
$Id_Investigadores = "-";
$Nombres_Investigadores = "-";
$num = count($_POST);
while($aux <= $num){

//Investigadores 
 $nombre = $_POST['Nombres'.$aux];
 if (isset($nombre)){
  $Id_aux = valida_investigador($nombre, $conexion);
  $Id_Investigadores = $Id_Investigadores.$Id_aux."-";
}
$aux++;
}



$nombreFichero = "";
$Tipo_Doc = $_POST['SubeDoc'];
if($Tipo_Doc != "Documento"){
 $nombreFichero = $_POST['Enlace1'];
}
else{  
  $directorio =  "../documentos/proyectos/";
  $nombreFichero =  upload_doc($directorio);
}




$i=1;
while($i<4){
 $DocsAux = "";
 if(isset($_FILES['doc'.$i]['name'])){
   $copiarFichero = false;

   // Copiar fichero en directorio de ficheros subidos
   // Se renombra para evitar que sobreescriba un fichero existente
   // Para garantizar la unicidad del nombre se añade una marca de tiempo
   if (is_uploaded_file ($_FILES['doc'.$i]['tmp_name']))
   {
    $nombreDirectorio = "../documentos/proyectos/";
    $DocsAux = $_FILES['doc'.$i]['name'];
    $tipoFichero = $_FILES['doc'.$i]['type'];
    $copiarFichero = true;

		//Renombrar el Archivo
    $extension = end(explode('.',$DocsAux)); 
    $idUnico = time();
    $DocsAux = $idUnico.$i.".".$extension;

  }
   // El fichero introducido supera el límite de tamaño permitido
  else if ($_FILES['doc'.$i]['error'] == UPLOAD_ERR_FORM_SIZE)
  {
    $maxsize = $_POST['MAX_FILE_SIZE'];
    $errores['doc'.$i] = "¡El tamaño del fichero supera el límite permitido ($maxsize bytes)!";
    $error = true;
  }
   // No se ha introducido ningún fichero
  else if ($_FILES['doc'.$i]['name'] == "")
   $DocsAux = '';
   // El fichero introducido no se ha podido subir
 else
 {
   $errores['doc'.$i] = "¡No se ha podido subir el fichero!";
   $error = true;
 }	  

      // Mover foto a su ubicación definitiva
 if ($copiarFichero)
   move_uploaded_file ($_FILES['doc'.$i]['tmp_name'], $nombreDirectorio . $DocsAux);

}
$Doc[$i]= $DocsAux;
$i++;
}



$consulta = $conexion->query ("INSERT INTO proyectos 
 (Nombre, Codigo_Proyecto, Sede, Id_Investigador, Nombre_Lider, Horas, Id_Investigadores, Nombres_Inves, Facultad, Programa, Fecha_Inicio, Fecha_Fin, Descripcion, Tipo_Encargado, Id_Encargado, Convenio, Convenio_Esp, Costo_Proyecto, Fin_Interna, Fin_Externa, Tipo_Doc , URL, Doc1, Doc2, Doc3, Observaciones, Rectoria, Sede_CR, Ult_Registro) 
 values ('$Nombre', '$Codigo_Proyecto', '$Sede', '$Id_Investigador', '$Lider', '$Horas', '$Id_Investigadores', '$Nombres_Investigadores', '$Facultad', '$Programa', '$Fecha_Inicio', '$Fecha_Fin' , '$Descripcion', '$Tipo_Encargado', 
 '$Id_Encargado', '$Convenio', '$Convenio_Esp', '$Costo_Proyecto' , '$Fin_Interna' , '$Fin_Externa' , '$Tipo_Doc', '$nombreFichero', '$Doc[1]', '$Doc[2]', '$Doc[3]', '$Observaciones', '$Acc_Rect', '$Acc_Sede', '$Ult_Registro')")or die ("Fallo en la inserción".$mysqli->error);
 ?>
 <script type='text/javascript'>window.alert("Proyecto Guardado")</script>
 <script type='text/javascript'>history.go(-2)</script>
 <?php
 exit();	  

 ?>