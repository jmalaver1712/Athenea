<?php require_once('../admin/locked.php');

//3. Tomar los campos provenientes del Formulario
$Nombres = $_POST['Nombres'];
$Documento = $_POST['Documento'];
$Nacimiento = $_POST['Nacimiento'];
$Genero = $_POST['Genero'];
$Nacionalidad = $_POST['Nacionalidad'];
$CvLAC = $_POST['CvLAC'];
$Categoria = $_POST['Categoria'];
$Tipo_Inves = $_POST['Tipo_Inves'];
$Institucion = $_POST['Institucion'];
$Vinculacion = $_POST['Vinculacion'];
$Continuidad = $_POST['Continuidad'];
$Pais = $_POST['Pais'];
$Depto = $_POST['Depto'];
$Ciudad = $_POST['Ciudad'];
$Resena = $_POST['Resena'];
$Telefono = $_POST['Telefono'];
$Correo = $_POST['Correo'];
$Estudios = $_POST['Estudios'];
$Especifico = $_POST['Especifico'];
$Observaciones = $_POST['observaciones'];
$Horas = $_POST['Horas'];




$Vinculo = $_POST['Vinculo'];
if ($Vinculo == "UNIMINUTO"){
$Sede = $_POST['Sede_Uniminuto'];
$Facultad = $_POST['Facultad'];
$Tipo_Contrato = $_POST['Tipo_Contrato'];
$Ano_Vinculo = $_POST['Ano_Vinculo'];
$Cargo = $_POST['Cargo'];
$Salario = $_POST['Salario'];
$Horas_Inv = $_POST['Horas_Inv'];

$insertar =$conexion->query("INSERT INTO trabajo 
(Sede, Facultad, Tipo_Contrato, Ano_Vinculo, Cargo, Salario, Horas)
VALUES 
('$Sede', '$Facultad', '$Tipo_Contrato', '$Ano_Vinculo', '$Cargo', '$Salario', '$Horas_Inv')") or die ($mysqli->error);
$Id_Trabajo = mysqli_insert_id();
}


$aux = 0;
$Estudios = "";
$Id_Recono = "%";
$Id_Beneficio = "%";
$num = count($_POST);
while($aux <= $num){
//Reconocimientos
$Fecha_Reco = $_POST['Fecha_Reco'.$aux];
$Reconocimiento = $_POST['Reconocimiento'.$aux];
$Institucion_Reco = $_POST['Institucion_Reco'.$aux];
$Observaciones_Reco = $_POST['Observaciones_Reco'.$aux];
if (isset($Reconocimiento) || isset($Institucion_Reco)){
$insertarR = mysql_query("INSERT INTO reconocimientos 
(Fecha, Reconocimiento, Institucion, Observaciones)
VALUES 
('$Fecha_Reco', '$Reconocimiento', '$Institucion_Reco', '$Observaciones_Reco')") or die ($mysqli->error);
$Id_Recono = $Id_Recono.mysqli_insert_id()."%";
}


//Beneficios
$FechaIni_Ben = $_POST['FechaIni_Ben'.$aux];
$FechaFin_Ben = $_POST['FechaFin_Ben'.$aux];
$Tipo_Ben = $_POST['Tipo_Ben'.$aux];
$Monto_Ben = $_POST['Monto_Ben'.$aux];
$Obser_Ben = $_POST['Obser_Ben'.$aux];
if (isset($Tipo_Ben) || isset($Monto_Ben)){
$insertarB =$conexion->query("INSERT INTO beneficios 
(Fecha_Ini, Fecha_Fin, Tipo, Monto, Observaciones)
VALUES 
('$FechaIni_Ben', '$FechaFin_Ben', '$Tipo_Ben', '$Monto_Ben', '$Obser_Ben')") or die ($mysqli->error);
$Id_Beneficio = $Id_Beneficio.mysqli_insert_id()."%";
}

// Estudio
$nivel = $_POST['nivel'.$aux];
$titulo = $_POST['titulo'.$aux];
$institucion = $_POST['institucion'.$aux];
if (isset($nivel) || isset($titulo) || isset($institucion) ){
$Estudios = $Estudios.$nivel."-_-".$titulo."-_-".$institucion."%%";
}
$aux++;
}


$insertar =$conexion->query("INSERT INTO investigadores 
(Nombres, Documento, Nacimiento, Genero, Nacionalidad, CvLAC, Categoria, Tipo_Inves ,Institucion, Vinculacion, 
Continuidad, Pais, Depto, Ciudad, Resena, Telefono, Correo, Estudios, Id_Beneficios, Id_Reconocimientos, Horas, Observaciones, Id_Trabajo, Rectoria, Sede_CR, Ult_Registro)
VALUES 
('$Nombres', '$Documento', '$Nacimiento', '$Genero', '$Nacionalidad', '$CvLAC', '$Categoria', '$Tipo_Inves', '$Institucion', '$Vinculacion', 
'$Continuidad', '$Pais', '$Depto', '$Ciudad', '$Resena', '$Telefono', '$Correo', '$Estudios', '$Id_Beneficio', '$Id_Recono', '$Horas', '$Observaciones' , '$Id_Trabajo', '$Acc_Rect', '$Acc_Sede', '$Ult_Registro')") or die ($mysqli->error);
?>
<script type='text/javascript'>window.alert("Guardado")</script>
<script type='text/javascript'>history.go(-2)</script>
<?php
exit();
?>