<?php require_once('../admin/locked.php');

//3. Tomar los campos provenientes del Formulario
$Id_Inves = $_POST['Id_Inves'];
$Nombres = $_POST['Nombres'];
$Documento = $_POST['Documento'];
$Nacimiento = $_POST['Nacimiento'];
$Genero = $_POST['Genero'];
$Nacionalidad = $_POST['Nacionalidad'];
$CvLAC = $_POST['CvLAC'];
$Categoria = $_POST['Categoria'];
$Tipo_Inves = $_POST['Tipo_Inves'];
$Vinculacion = $_POST['Vinculacion'];
$Continuidad = $_POST['Continuidad'];
$Tipo_Inves = $_POST['Tipo_Inves'];
$Observaciones = $_POST['Observaciones'];
$Institucion = $_POST['Institucion'];
$Pais = $_POST['Pais'];
$Depto = $_POST['Depto'];
$Ciudad = $_POST['Ciudad'];
$Resena = $_POST['Resena'];
$Telefono = $_POST['Telefono'];
$Correo = $_POST['Correo'];
$Horas = $_POST['Horas'];


$inv = $conexion->query("SELECT * FROM investigadores WHERE Id_Investigador = '$Id_Inves' ")or die ("Error 1 ".$mysqli->error);
$row= $inv->fetch_assoc();
$Rec = explode('%',$row['Id_Reconocimientos']);
$k = count($Rec)-1;
for ($r=1;$r<$k;$r++){
$Id_Rec = $Rec[$r];
$reco = $conexion->query("DELETE FROM reconocimientos WHERE Id_Reconocimiento = '$Id_Rec' ")or die ("Error 12 ".$mysqli->error);
}

$Ben = explode('%',$row['Id_Beneficios']);
$b = count($Ben)-1;
for ($r=1;$r<$b;$r++){
$Id_Ben = $Ben[$r];
$bene = $conexion->query("DELETE FROM beneficios WHERE Id_Beneficio = '$Id_Ben' ")or die ("Error 13 ".$mysqli->error);
}
$Id_Trabajo = $row['Id_Beneficios'];
$Trabajo = $conexion->query("DELETE FROM trabajo WHERE Id_Trabajo = '$Id_Trabajo' ")or die ("Error 14 ".$mysqli->error);


$Estudios = "";
$aux = 0;
$Estudios = "";
$Id_Recono = "%";
$Id_Beneficio = "%";

$num = count($_POST);
while($aux <= $num){
//Nuevos Reconocimientos
$Fecha_Reco = $_POST['Fecha_Reco'.$aux];
$Reconocimiento = $_POST['Reconocimiento'.$aux];
$Institucion_Reco = $_POST['Institucion_Reco'.$aux];
$Observaciones_Reco = $_POST['Observaciones_Reco'.$aux];
if (isset($Reconocimiento) || isset($Institucion_Reco)){
$insertarR = $conexion->query("INSERT INTO reconocimientos 
(Fecha, Reconocimiento, Institucion, Observaciones) VALUES 
('$Fecha_Reco', '$Reconocimiento', '$Institucion_Reco', '$Observaciones_Reco')") or die ($mysqli->error);
$Id_Recono = $Id_Recono.mysqli_insert_id()."%";
}
//Viejos Reconocimeitos
$Fecha_Old = $_POST['Fecha_Old'.$aux];
$Recono_Old = $_POST['Recono_Old'.$aux];
$Insti_Old = $_POST['Insti_Old'.$aux];
$Obser_Old = $_POST['Obser_Old'.$aux];
if (isset($Recono_Old) || isset($Insti_Old)){
$insertarR = $conexion->query("INSERT INTO reconocimientos 
(Fecha, Reconocimiento, Institucion, Observaciones) VALUES 
('$Fecha_Old', '$Recono_Old', '$Insti_Old', '$Obser_Old')") or die ($mysqli->error);
$Id_Recono = $Id_Recono.mysqli_insert_id()."%";
}


//Nuevos Beneficios
$FechaIni_Ben = $_POST['FechaIni_Ben'.$aux];
$FechaFin_Ben = $_POST['FechaFin_Ben'.$aux];
$Tipo_Ben = $_POST['Tipo_Ben'.$aux];
$Monto_Ben = $_POST['Monto_Ben'.$aux];
$Obser_Ben = $_POST['Obser_Ben'.$aux];
if (isset($Tipo_Ben) || isset($Monto_Ben)){
$insertarB = $conexion->query("INSERT INTO beneficios 
(Fecha_Ini, Fecha_Fin, Tipo, Monto, Observaciones)
VALUES 
('$FechaIni_Ben', '$FechaFin_Ben', '$Tipo_Ben', '$Monto_Ben', '$Obser_Ben')") or die ($mysqli->error);
$Id_Beneficio = $Id_Beneficio.mysqli_insert_id()."%";
}


//Nuevos Beneficios
$FechaIni_Ben_Old = $_POST['FechaIni_Ben_Old'.$aux];
$FechaFin_Ben_Old = $_POST['FechaFin_Ben_Old'.$aux];
$Tipo_Ben_Old = $_POST['Tipo_Ben_Old'.$aux];
$Monto_Ben_Old = $_POST['Monto_Ben_Old'.$aux];
$Obser_Ben_Old = $_POST['Obser_Ben_Old'.$aux];
if (isset($Tipo_Ben_Old) || isset($Monto_Ben_Old)){
$insertarB = $conexion->query("INSERT INTO beneficios 
(Fecha_Ini, Fecha_Fin, Tipo, Monto, Observaciones)
VALUES 
('$FechaIni_Ben_Old', '$FechaFin_Ben_Old', '$Tipo_Ben_Old', '$Monto_Ben_Old', '$Obser_Ben_Old')") or die ($mysqli->error);
$Id_Beneficio = $Id_Beneficio.mysqli_insert_id()."%";
}


//Estudios Nuevos
$nivel = $_POST['nivel'.$aux];
$titulo = $_POST['titulo'.$aux];
$institucion = $_POST['institucion'.$aux];
if (isset($nivel) || isset($titulo) || isset($institucion) ){
$Estudios = $Estudios.$nivel."-_-".$titulo."-_-".$institucion."%%";
}


//Estudios Viejos
$nivelV = $_POST['nivelV'.$aux];
$tituloV = $_POST['tituloV'.$aux];
$institucionV = $_POST['institucionV'.$aux];
if (isset($nivelV) || isset($tituloV) || isset($institucionV) ){
$Estudios = $Estudios.$nivelV."-_-".$tituloV."-_-".$institucionV."%%";
}
$aux++;
}


$Vinculo2 = $_POST['Vinculo2'];
if ($Vinculo2 == "UNIMINUTO"){
$SedeT = $_POST['SedeT'];
$FacultadT = $_POST['FacultadT'];
$Tipo_ContratoT = $_POST['Tipo_ContratoT'];
$Ano_VinculoT = $_POST['Ano_VinculoT'];
$CargoT = $_POST['CargoT'];
$SalarioT = $_POST['SalarioT'];
$HorasT = $_POST['HorasT'];

$insertar = $conexion->query("INSERT INTO trabajo 
(Sede, Facultad, Tipo_Contrato, Ano_Vinculo, Cargo, Salario, Horas)
VALUES 
('$SedeT', '$FacultadT', '$Tipo_ContratoT', '$Ano_VinculoT', '$CargoT', '$SalarioT', '$HorasT')") or die ($mysqli->error);
$Id_Trabajo = mysqli_insert_id();
}



//4. Insertar campos en la Base de Datos (No inserto el id_empleado ya que se genera automaticamente)
$insertar = $conexion->query("UPDATE investigadores SET
Nombres = '$Nombres',
Documento = '$Documento',
Nacimiento = '$Nacimiento',
Genero = '$Genero',
Nacionalidad = '$Nacionalidad',
CvLAC = '$CvLAC',
Categoria = '$Categoria',
Tipo_Inves = '$Tipo_Inves',
Institucion = '$Institucion',
Vinculacion = '$Vinculacion', 
Continuidad = '$Continuidad',
Pais = '$Pais',
Depto = '$Depto',
Ciudad = '$Ciudad',
Resena = '$Resena',
Telefono = '$Telefono',
Correo = '$Correo',
Estudios = '$Estudios',
Id_Reconocimientos = '$Id_Recono',
Id_Beneficios = '$Id_Beneficio',
Horas = '$Horas',
Observaciones = '$Observaciones',
Id_Trabajo = '$Id_Trabajo',
Ult_Registro = '$Ult_Registro'
WHERE Id_Investigador = '$Id_Inves' ") or die ($mysqli->error);

?>
<script type='text/javascript'>window.alert("Guardado")</script>
<script type='text/javascript'>history.go(-2)</script>
<?php
exit();
?>