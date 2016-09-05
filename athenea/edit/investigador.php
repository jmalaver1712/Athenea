<?php require_once('../admin/locked.php'); ?>
<?php
$Id_Inves = validar_id($_GET['Id']);
$inv = $conexion->query("SELECT * FROM investigadores WHERE Id_Investigador = '$Id_Inves' ")or die ("Error 1 ".$mysqli->error);
$row= $inv->fetch_assoc();

$edad = 0;
$anoact = date("Y");
$mesact = date("m");
$diaact = date("d");
list($anio,$mes,$dia) = explode("-",$row['Nacimiento']);
if($mes >= $mesact){
$edad=$edad-1;
}

$edad =$edad + $anoact - $anio;
?>

<!DOCTYPE html>
<html>
<?php require_once('../menu/head.php'); ?> 

<body class="skin-blue sidebar-mini">
    <div class="wrapper">
	
      <!-- Main Header -->
		<header class="main-header">
		
		
		<!-- Parte de Arriba -->
		<?php require_once('../menu/nav.php'); ?>
		
		</header>
		
		<!-- COLUMNA DERECHA - MENU -->
		<?php require_once('../menu/header.php'); ?>

    <!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
	  
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
		  Modificar Proyectos
          </h1>
        </section>

        <!-- Main content -->
		
		<section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
			  
                <div class="box-body">
					
					<form action="investigadorphp.php" method="POST" enctype="multipart/form-data" onsubmit="return validar()">
					<input class="form-control" type="hidden" name="Id_Inves" value="<?php echo $Id_Inves; ?>">
					<table>
					<tr>
					<td colspan="2">
					<span style=" font-style: italic;"><b>* Todos los campos son obligatorios</b></span><br>
					</tr>
					<tr>
					<td width="30%"><label>*Nombre:</label></td>
					<td width="70%"><input class="form-control" type="text" name="Nombres" size="60" value="<?php echo $row['Nombres']; ?>" required/></td>
					</tr>

					<tr>
					<td><label>*No. Documento</label></td>
					<td><input class="form-control" type="number" name="Documento" size="30" value="<?php echo $row['Documento']; ?>"  /></td>
					</tr>

					<tr>
					<td><label>*Fecha de Nacimiento:</label></td>
					<td><input class="form-control" type="date" name="Nacimiento" value="<?php echo $row['Nacimiento']; ?>"  >
					</td>
					</tr>

					<tr>
					<td><label>Género:</label></td>
					<td>
					<select class="form-control" name="Genero" >
					<option><?php echo $row['Genero']; ?></option>
					<option>Masculino</option>
					<option>Femenino</option>
					</select>
					</td>
					</tr>
					<tr>
					<td><label>Nacionalidad:</label></td>
					<td><input class="form-control" type="text" name="Nacionalidad" size="60" value="<?php echo $row['Nacionalidad']; ?>"/></td>
					</tr>

					<tr>
					<td><label>*Perfil CvLAC:</label></td>
					<td><input class="form-control" type="url" name="CvLAC" value="<?php echo $row['CvLAC']; ?>" size="30" ></td>
					</tr>
					<tr>
					<td><label>Categoría de Colciencias:</label></td>
					<td>
					<select class="form-control" name="Categoria" >
					<option><?php echo $row['Categoria']; ?></option>
					<option>No Aplica (N/A)</option>
					<option>Investigador Sénior (IS)</option>
					<option>Investigador Asociado (I)</option>
					<option>Investigador Junior (IJ)</option>
					<option>Estudiante de Doctorado (ED)</option>
					<option>Estudiante de Maestría o Especialidad Clínica (EM)</option>
					<option>Joven Investigador (JI)</option>
					<option>Estudiante de Pregrado (EP)</option>
					<option>Integrante vinculado con Doctorado (IVD)</option>
					<option>Integrante vinculado con Maestría o Especialidad Clínica (IVM)</option>
					<option>Integrante vinculado con Pregrado (IVP)</option>
					<option>Integrante vinculado con Especialización (IVE)</option>
					<option>Integrante vinculado (IV)</option>
					</select>
					</td>
					</tr>

					<tr>
					<td><label>Tipo de investigador:</label></td>
					<td>
					<select class="form-control" name="Tipo_Inves" >
					<option value="<?php echo $row['Tipo_Inves']; ?>"><?php echo $row['Tipo_Inves']; ?></option>
					<option>No Aplica (N/A)</option>
					<option>Docente</option>
					<option>Investigador Junior</option>
					<option>Estudiante</option>
					</select>
					</td>
					</tr>

					<tr>
					<td><br></td>
					<td><br></td>
					</tr>

					<tr>
					<td><label>Institución</label></td>
					<td><input class="form-control" type="text" name="Institucion" value="<?php echo $row['Institucion']; ?>" size="30"  /></td>
					</tr>

					<tr>
					<td><label>Año de Vinculación al Grupo</label></td>
					<td><input class="form-control" type="number" name="Vinculacion" value="<?php echo $row['Vinculacion']; ?>" size="30"/></td>
					</tr>

					<tr>
					<td><label>Fecha de ingreso a la institución</label></td>
					<td>
					<select class="form-control" name="Continuidad" >
					<option> <?php echo $row['Continuidad']; ?> </option>
					<?php
					$cont = 2005;
					while($cont <= 2020){
					echo "<option>".$cont."</option>";
					$cont++;
					}
					?>
					<select class="form-control">
					</td>
					</tr>

					<tr>
					<td><label>País:</label></td>
					<td><input class="form-control" type="text" name="Pais" value="<?php echo $row['Pais']; ?>" size="32"  /></td>
					</tr>
					<tr>
					<td><label>Departamento:</label></td>
					<td><input class="form-control" type="text" name="Depto" value="<?php echo $row['Depto']; ?>" size="32" /></td>
					</tr>
					<tr>
					<td><label>Municipio/Ciudad:</label></td>
					<td><input class="form-control" type="text" name="Ciudad" value="<?php echo $row['Ciudad']; ?>" size="32"/></td>
					</tr>
					<tr>
					<td><label>Perfil:</label></td>
					<td><textarea class="form-control" name="Resena" cols="50" rows="7"><?php echo $row['Resena']; ?></textarea></td>
					</tr>
					<tr>
					<td><label>*Teléfono:</label></td>
					<td><input class="form-control" type="tel" name="Telefono" value="<?php echo $row['Telefono']; ?>"  ></td>
					</tr>
					<tr>
					<td><label>*Correo:</label></td>
					<td><input class="form-control" type="email" name="Correo" value="<?php echo $row['Correo']; ?>" ><br><br></td>
					</tr>

					<tr>
					<td><label>Estudios/Titulo:</label></td>
					<td> 
					<select class="form-control" id="nivel">
					<option>Pregrado</option>
					<option>Posgrado</option>
					<option>Maestría</option>
					<option>Especialización</option>
					<option>Doctorado</option>
					</select>
					
					<input class="form-control" type="text" size="30" id="titulo" placeholder="Título Obtenido">
					<input class="form-control" type="text" size="30" id="institucion" placeholder="Institución que otorga el título">
					<input class="btn btn-primary" type="button" onclick="estudios()" value="Agregar">
					<br>
					</td>
					</tr>
					<!--Mostrar estudios-->
					<tr>
					<td>&nbsp;
					<script>
					function remover(l){
					var Estudio = document.getElementById("Estudi"+l);
					var contenedor= document.getElementById("estudio");
					contenedor.removeChild(Estudio);
					}
					</script>
					</td>
					<td> 
					<div id="estudio">
					<?php
					//Lineas
					$Estudios = explode('%%',$row['Estudios']);
					$est = count($Estudios)-1;
					for ($j=0;$j<$est;$j++){
					$Estud = explode ("-_-", $Estudios[$j]);
					print("<div id='Estudi".$j."'>
					<input type='text' name='nivelV".$j."' value='".$Estud[0]."'>
					<input type='text' name='tituloV".$j."' value='".$Estud[1]."'>
					<input type='text' name='institucionV".$j."' value='".$Estud[2]."'>
					<a href='JavaScript:remover(".$j.");'>Quitar</a></div>");
					}
					?>
					</div>
					<br>
					</td>
					</tr>


					<!-- Reconocimiento -->
					<tr>
					<td><label>Reconocimientos</label></td>
					<td> 
					Fecha: <input class="form-control" type="date" id="Fecha_REC"><br>
					Reconocimiento: <input class="form-control" type="text" id="Recono_REC" size='40'><br>
					Institución: <input class="form-control" type="text" id="Insti_REC" size='40'><br>
					Observaciones: <textarea class="form-control" id="Obser_REC" cols="50" rows="3"></textarea><br>
					<input class="btn btn-primary" type="button" onclick="reconoJS()" value="Agregar">
					<br>
					</td>
					</tr>
					<!--Mostrar Reconocimientos-->
					<tr>
					<td>&nbsp;
					<script>
					function removerR(l){
					var RecDIV = document.getElementById("Recono"+l);
					var contenedor= document.getElementById("ReconoCONT");
					contenedor.removeChild(RecDIV);
					}
					</script>
					</td>
					<td> 
					<div id="ReconoCONT">
					<?php
					//Lineas
					$Rec = explode('%',$row['Id_Reconocimientos']);
					$k = count($Rec)-1;
					for ($r=1;$r<$k;$r++){
					$Id_Rec = $Rec[$r];
					$reco = $conexion->query("SELECT * FROM reconocimientos WHERE Id_Reconocimiento = '$Id_Rec' ")or die ("Error 1 ".$mysqli->error);
					$rowR= $reco->fetch_assoc();
					print("<div id='Recono".$r."'>
					<input type='date' name='Fecha_Old".$r."' value='".$rowR['Fecha']."'>
					<input type='text' name='Recono_Old".$r."' value='".$rowR['Reconocimiento']."'>
					<input type='text' name='Insti_Old".$r."' value='".$rowR['Institucion']."'>
					<input type='hidden' name='Obser_Old".$r."' value='".$rowR['Observaciones']."'>
					<a href='JavaScript:removerR(".$r.");'>Quitar</a></div>");
					}
					?>
					</div>
					<br>
					</td>
					</tr>

					<!-- Agregar Beneficiom-->
					<tr>
					<td><label>Beneficios y estímulos recibidos</label></td>
					<td> 
					Tipo de Beneficio: <select class="form-control" id="Tipo_BEN">
					<option>Movilidad</option>
					<option>Beca</option>
					</select><br>
					Fecha Inicio: <input class="form-control" type="date" id="FechaIni_BEN"><br>
					Fecha Final: <input class="form-control" type="date" id="FechaFin_BEN"><br>
					Monto: $<input class="form-control" type="number" id="Monto_BEN" ><br>
					Observaciones: <textarea class="form-control" id="Obser_BEN" cols="50" rows="3"></textarea><br>
					<input class="btn btn-primary" type="button" onclick="beneJS()" value="Agregar">
					<br>
					</td>
					</tr>
					<!--Mostrar Beneficios-->
					<tr>
					<td>&nbsp;
					<script>
					function removerB(l){
					var BenDIV = document.getElementById("Bene_Old"+l);
					var contenedor= document.getElementById("BenefeCONT");
					contenedor.removeChild(BenDIV);
					}
					</script>
					</td>
					<td> 
					<div id="BenefeCONT">
					<?php
					//Lineas
					$Ben = explode('%',$row['Id_Beneficios']);
					$g = count($Ben)-1;
					for ($r=1;$r<$g;$r++){
					$Id_Ben = $Ben[$r];
					$Bene = $conexion->query("SELECT * FROM beneficios WHERE Id_Beneficio = '$Id_Ben' ")or die ("Error 1 ".$mysqli->error);
					$rowB= $Bene->fetch_assoc();
					print("<div id='Bene_Old".$r."'>
					<input type='hidden' name='FechaIni_Ben_Old".$r."' value='".$rowB['Fecha_Ini']."'>
					<input type='hidden' name='FechaFin_Ben_Old".$r."' value='".$rowB['Fecha_Fin']."'>
					<input type='text' name='Tipo_Ben_Old".$r."' value='".$rowB['Tipo']."'>
					<input type='text' name='Monto_Ben_Old".$r."' value='".$rowB['Monto']."'>
					<input type='text' name='Obser_Ben_Old".$r."' value='".$rowB['Observaciones']."'>
					<a href='JavaScript:removerB(".$r.");'>Quitar</a></div>");
					}
					?>
					</div><br>
					</td>
					</tr>



					<tr>
					<td><label>Horas de Estudio:</label></td>
					<td>Horas de Estudio = <input class="form-control" type="number" name="Horas" value="<?php echo $row['Horas'];?>" ><br>
					</td>
					</tr>

					<tr>
					<td><label>Observaciones:</label></td>
					<td><textarea class="form-control" name="Observaciones" cols="50" rows="6" ><?php echo $row['Observaciones']; ?></textarea></td>
					</tr>

					<tr>
					<td colspan="2">
					<br>
					<b>¿Labora actualmente en UNIMINUTO?</b>
					<input type="checkbox" onclick="check()" <?php
					$Id_Trabajo = $row['Id_Trabajo']; if($Id_Trabajo != "0"){ print ("checked"); }?> id="Vinculo" name="Vinculo">
					<br>
					<input class="form-control" type="hidden" value="<?php echo $Id_Trabajo; ?>" name="Id_Trabajo" id="Id_Trabajo">
					<input class="form-control" type="hidden" value="UNIMINUTO" name="Vinculo2" id="Vinculo2">
					</td>
					</tr>
					</table><br>


					<script language="javascript">
					function check(){
					if (document.getElementById("Vinculo").checked){
					document.getElementById('Uni').style.display = "block"
					document.getElementById('Id_Trabajo').value = "<?php echo $Id_Trabajo;?>"
					document.getElementById('Vinculo2').value = "UNIMINUTO"
					}
					else {
					document.getElementById('Uni').style.display = "none"
					document.getElementById('Id_Trabajo').value = "0"
					document.getElementById('Vinculo2').value = ""
					}
					}
					</script>
					<?php 
					$trab = $conexion->query("SELECT * FROM trabajo  WHERE Id_Trabajo = '$Id_Trabajo' ")or die ("Error 1 ".$mysqli->error);
					$rowT= $trab->fetch_assoc();
					?>
					<br><br>
					<table id="Uni" style="display:none">
					<tr>
					<td><label>Sede Uniminuto:</label></td>
					<td><select class="form-control" name="SedeT" Id="camp1" >
					<option><?php echo $rowT['Sede'];?></option>
					<option>Sede Principal (Calle 80)</option>
					<option>Rectoria Sede Cundinamarca</option>
					<option>Centro Regional Zipaquirá</option>
					<option>Centro Regional Soacha</option>
					<option>Centro Regional Madrid</option>
					<option>Centro Regional Girardot</option>
					<option>Seccional Bello</option>
					<option>Centro Regional Urabá</option>
					<option>Centro Regional Pereira</option>
					<option>Centro Tutorial El Bagre</option>
					<option>Centro Regional Chinchiná / Neira</option>
					<option>Sede Valle</option>
					<option>Centro Regional Buga</option>
					<option>Centro Operacional de Buenaventura</option>
					<option>Centro Tutorial Cali</option>
					</select></b></td>
					</tr>

					<tr>
					<td><label>Facultad o Unidad:</label></td>
					<td><select class="form-control" name="FacultadT">
					<option><?php echo $rowT['Facultad'];?></option>
					<option>No Aplica (N/A)</option>
					<option>Facultad de Ciencias Humanas y Sociales</option>
					<option>Facultad de Ciencias Empresariales</option>
					<option>Facultad de Ingeniería</option>
					<option>Facultad de Comunicaciones</option>
					<option>Facultad de Educación</option>
					<option>Centro de Educación para el Desarrollo - CED</option>
					<option>Centro de Pensamiento Humano y Social MD - CPHS</option>
					<option>Parque Cientifico de Innovacion Social - PCIS</option>
					</select>
					</td>
					</tr>

					<tr>
					<td><label>Tipo de Contrato:</label></td>
					<td><select class="form-control" name="Tipo_ContratoT" Id="camp2" >
					<option><?php echo $rowT['Tipo_Contrato']; ?></option>
					<option>Contrato Termino Indefinido</option>
					<option>Contrato Termino Fijo - Tiempo Completo</option>
					<option>Contrato Termino Fijo - Medio Tiempo</option>
					<option>Contrato Termino Fijo - Tiempo Parcial</option>
					</select>
					</td>
					</tr>

					<tr>
					<td><label>Año de Vinculación a UNIMINUTO</label></td>
					<td><select class="form-control" name="Ano_VinculoT" Id="camp2">
					<option><?php echo $rowT['Ano_Vinculo']; ?></option>
					<?php
					$anoV=2000;
					while ($anoV < 2030){
					$anoV++;
					echo "<option>".$anoV."</option>";
					}
					?>
					</select>
					</td>
					</tr>

					<tr>
					<td><label>Cargo:</label></td>
					<td><input class="form-control" type="text" name="CargoT" size="50" value="<?php echo $rowT['Cargo']; ?>" Id="camp3" >
					</td>
					</tr>

					<tr>
					<td><label>Salario:</label></td>
					<td><input class="form-control" type="number" name="SalarioT" size="50" value="<?php echo $rowT['Salario']; ?>" Id="camp4" >
					</td>
					</tr>

					<tr>
					<td><label>Horas de Investigación:</label></td>
					<td><input class="form-control" type="number" name="HorasT" size="50" value="<?php echo $rowT['Horas']; ?>" Id="camp5" >
					</td>
					</tr>
					</table>

					<input class="btn btn-primary" type="submit" class="submit" value="Guardar" />

					</form>  
					
				</div><!-- /.box-body -->
              </div><!-- /.box -->
			  
			  
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
		
		
		
    </div><!-- /.content-wrapper -->

        <!-- Main Footer -->
	<?php
	require_once('../menu/footer.php');
	require_once('../menu/panel.php'); 	
	?>
		   
		   
    <div class='control-sidebar-bg'></div>
	
    </div><!-- ./wrapper -->
	
	<?php require_once('../menu/js_footer.php'); ?>
	
	
  </body>
</html>				  