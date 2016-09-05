<?php require_once('../admin/locked.php'); ?>
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
		  Agregar Investigador
          </h1>	
        </section>

        <!-- Main content -->
		
		<section class="content">
          <div class="row">
            <div class="col-xs-12">

              <div class="box">
                
                <div class="box-body">
					<form action="investigadorphp.php" method="POST" enctype="multipart/form-data" id="form1"  onsubmit="return validar()">
					<table width="80%">
					<tr>
					<td colspan="2">
					<span style=" font-style: italic;"><b>* Todos los campos son obligatorios</b></span><br>
					</tr>
					<tr>
					<td><label>*Nombre Completo:</label></td>
					<td><input class="form-control" type="text" name="Nombres" size="60" required/></td>
					</tr>

					<tr>
					<td><label>No. Documento</label></td>
					<td><input class="form-control" type="number" name="Documento" size="30"/></td>
					</tr>

					<tr>
					<td><label>Fecha de Nacimiento:</label></td>
					<td><input class="form-control" type="date" name="Nacimiento" size="15">
					</td>
					</tr>

					<tr>
					<td><label>Género:</label></td>
					<td>
					<select class="form-control" name="Genero" >
					<option>Masculino</option>
					<option>Femenino</option>
					<select>
					</td>
					</tr>
					<tr>

					<td><label>Nacionalidad</label></td>
					<td><input class="form-control" type="text" name="Nacionalidad" id="Nacionalidad" size="30"></td>
					</tr>

					<tr>
					<td><label>País de residencia:</label></td>
					<td><input class="form-control" type="text" name="Pais" size="32"/></td>
					</tr>
					<tr>
					<td><label>Departamento/Estado:</label></td>
					<td><input class="form-control" type="text" name="Depto" size="32" /></td>
					</tr>
					<tr>
					<td><label>Municipio/Ciudad:</label></td>
					<td><input class="form-control" type="text" name="Ciudad" size="32"/></td>
					</tr>

					<tr>
					<td><br></td>
					<td><br></td>
					</tr>

					<tr>
					<td><label>CvLAC:</label></td>
					<td><input class="form-control" type="url" name="CvLAC" size="30"></td>
					</tr>

					<tr>
					<td><label>Categoría de Colciencias:</label></td>
					<td>
					<select class="form-control" name="Categoria" >
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
					<select>
					</td>
					</tr>

					<tr>
					<td><label>Tipo de investigador:</label></td>
					<td>
					<select class="form-control" name="Tipo_Inves" >
					<option>No Aplica (N/A)</option>
					<option>Docente</option>
					<option>Investigador Junior</option>
					<option>Estudiante</option>
					<select>
					</td>
					</tr>

					<tr>
					<td><label>Institución</label></td>
					<td><input class="form-control" type="text" name="Institucion" size="30"/></td>
					</tr>

					<tr>
					<td><label>Año de Vinculación al Grupo</label></td>
					<td><input class="form-control" type="number" name="Vinculacion" size="30"/></td>
					</tr>

					<tr>
					<td><label>Fecha de ingreso a la institución</label></td>
					<td>
					<select class="form-control" name="Continuidad" >
					<?php
					$cont = 2005;
					while($cont <= 2020){
					echo "<option>".$cont."</option>";
					$cont++;
					}
					?>
					<select>
					</td>
					</tr>

					<tr>
					<td><br></td>
					<td><br></td>
					</tr>

					<tr>
					<td><label>Perfil:</label></td>
					<td><textarea class="form-control" name="Resena" cols="50" rows="5"></textarea></td>
					</tr>
					<tr>
					<td><label>Teléfono:</label></td>
					<td><input class="form-control" type="tel" name="Telefono"  ></textarea></td>
					</tr>
					<tr>
					<td><label>*Correo:</label></td>
					<td><input class="form-control" type="email" name="Correo" size="30" required></textarea></td>
					</tr>

					<!-- Agregar estudios -->
					<tr>
					<td><label>Estudios/Titulo:</label></td>
					<td>
					<br>
					Nivel: <select class="form-control" id="nivel">
					<option>Pregrado</option>
					<option>Posgrado</option>
					<option>Maestría</option>
					<option>Especialización</option>
					<option>Doctorado</option>
					</select><br>
					Titulo Obtenido: <input class="form-control" type="text" size="30" id="titulo" placeholder="Título Obtenido"><br>
					Institucion: <input class="form-control" type="text" size="30" id="institucion" placeholder="Institución que otorga el título"><br>
					<input class="btn btn-primary" type="button" onclick="estudios()" value="Agregar">
					<br>
					</td>
					</tr>
					<!--Mostrar estudios-->
					<tr>
					<td>&nbsp;</td>
					<td> 
					<div id="estudio"></div><br>
					</td>
					</tr>


					<!-- Agregar Reconocimiento -->
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
					<td>&nbsp;</td>
					<td> 
					<div id="ReconoCONT"></div><br>
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
					<!--Mostrar Reconocimientos-->
					<tr>
					<td>&nbsp;</td>
					<td> 
					<div id="BenefeCONT"></div><br>
					</td>
					</tr>



					<tr>
					<td><label>Horas de Estudio:</label></td>
					<td>Horas de Estudio = <input class="form-control" type="number" name="Horas"><br>
					</td>
					</tr>
					
					<tr>
					<td><label>Observaciones</label></td>
					<td><textarea class="form-control" name="observaciones" cols="50" rows="6"></textarea></td>
					</tr>

					<tr>
					<td colspan="2">
					<br>
					<b>¿Labora actualmente en UNIMINUTO? &nbsp;&nbsp;</b> <input type="checkbox" onclick="check()" id="Vinculo" name="Vinculo" value="UNIMINUTO"><br></td>
					</tr>
					</table>
					
					
					<!--VINCULADO A UNIMINUTO-->
					<table id="labora" style="display:none">
					<tr>
					<td><label>Sede Uniminuto:</label></td>
					<td><select class="form-control" name="Sede_Uniminuto" Id="camp1" >
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
<option>Rectoria UNIMINUTO Virtual y a Distancia (UVD)</option>
					<select>
					</td>
					</tr>

					<tr>
					<td><label>Facultad o Unidad:</label></td>
					<td><select class="form-control" name="Facultad">
					<option>No Aplica (N/A)</option>
					<option>Facultad de Ciencias Humanas y Sociales</option>
					<option>Facultad Ingeniería</option>
					<option>Facultad de Ciencias Empresariales</option>
					<option>Facultad de Comunicaciones</option>
					<option>Facultad de Educación</option>
					<option>Centro de Educación para el Desarrollo - CED</option>
					<option>Centro de Pensamiento Humano y Social MD - CPHS</option>
					<option>Centro Universidad Empresa - CUE</option>
					<option>Parque Científico de Innovación Social - PCIS</option>
					<select>
					</td>
					</tr>

					<tr>
					<td><label>Tipo de Contrato:</label></td>
					<td><select class="form-control" name="Tipo_Contrato" Id="camp2" >
					<option>Contrato Termino Indefinido</option>
					<option>Contrato Termino Fijo - Tiempo Completo</option>
					<option>Contrato Termino Fijo - Medio Tiempo</option>
					<option>Contrato Termino Fijo - Tiempo Parcial</option>
					<select>
					</td>
					</tr>

					<tr>
					<td><label>Año de Vinculación a UNIMINUTO</label></td>
					<td><select class="form-control" name="Ano_Vinculo" Id="camp2">
					<?php
					$anoV=2000;
					while ($anoV < 2030){
					$anoV++;
					echo "<option>".$anoV."</option>";
					}
					?>
					<select>
					</td>
					</tr>

					<tr>
					<td><label>Cargo:</label></td>
					<td><input class="form-control" type="text" name="Cargo" size="50" Id="camp3" >
					</td>
					</tr>

					<tr>
					<td><label>Salario:</label></td>
					<td><input class="form-control" type="number" name="Salario" size="50" >
					</td>
					</tr>

					<tr>
					<td><label>Horas de Investigación:</label></td>
					<td><input class="form-control" type="number" name="Horas_Inv" size="50" >
					</td>
					</tr>
					</table>					
					
					<center><input type="submit" class="btn btn-primary" value="Guardar" /></center>
					
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