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
		  Agregar Semillero
          </h1>	
        </section>

        <!-- Main content -->
		
		<section class="content">
          <div class="row">
            <div class="col-xs-12">

              <div class="box">
                
                <div class="box-body">
					
					<form action="semillerophp.php" method="post" enctype="multipart/form-data" name="registro" >
					<table border="0" width="80%">
					<tr>
					<td colspan="2">
					<span style=" font-style: italic;"><b>* Todos los campos son obligatorios</b></span><br>
					</tr>
					<tr>
					<td width="30%"><label>*Nombre del semillero:</label></td>
					<td width="70%"><input class="form-control" name="NombreSem" type="text" size="60" required><br></td>
					</tr>
					<tr>
					<td><label>Grupo de Investigación al que se encuentra adscrito el Semillero</label></td>
					<td><input class="form-control" type="text" name="grupo" id="grupo" value=""><br></td>
					</tr>
					<tr>
					<td><label>Año de creación:</label></td>
					<td><input class="form-control" type="number" name="ano" ></td>
					</tr>
					<tr>
					<td valign="middle"><label>Perfil:</label></td>
					<td><textarea class="form-control" name="descripcion" cols="50" rows="5" ></textarea><br><br></td>
					</tr>
					<tr>
					<td><label>Sede a la que Pertenece:</label></td>
					<td>
					<select class="form-control" name="Sede">
					<option>No Aplica</option>
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
					<option>Centro Regional de Buenaventura</option>
					<option>Centro Tutorial Cali</option>
					<option>Centro Tutorial El Prado</option>
					<option>Rectoria UNIMINUTO Virtual y a Distancia (UVD)</option>
					<select class="form-control">
					</td>
					</tr>

					<tr>
					<td><label>Facultad o Unidad</label></td>
					<td>
					<select class="form-control" name="Facultad" id="Facultad" onchange="facultad(this.value)">
					<option>No Aplica (N/A)</option>
					<option>Facultad de Ciencias Humanas y Sociales</option>
					<option>Facultad de Ciencias Empresariales</option>
					<option>Facultad de Comunicaciones</option>
					<option>Facultad de Educación</option>
					<option>Facultad de Ingeniería</option>
					<option>Centro de Educación para el Desarrollo - CED</option>
					<option>Centro de Pensamiento Humano y Social MD – CPHS</option>
					<option>Otro</option>
					</select>
					<br>
					<input class="form-control" type="text" name="Facultad2" id="Facultad2" size="50" disabled placeholder="Otra Facultad o Unidad">
					</td>
					</tr> 

					<tr>
					<td><label>Programa:</label></td>
					<td><input class="form-control" type="text" name="Programa"></td>
					</tr>

					<tr>
					<td><label>*Investigador Lider:</label></td>
					<td><input class="form-control" type="text" name="Lider" Id="nombre" size="40" required /></td>
					</tr>

					<tr>
					<td><label>Horas dedicadas al semillero</label></td>
					<td><input class="form-control" type="number" name="Horas">
					</td>
					</tr>

					<tr>
					<td><label>*Buscar Integrantes:</label></td>
					<td><input class="form-control" type="text" name="Nombres" Id="nombre1" size="40" placeholder="Buscar Integrante" />
					<input class="btn btn-primary" type="button" onclick="agregarCampo()" value="Agregar"></td>
					</tr>

					<tr>
					<td>Integrantes</td>
					<td><div id="contenedorcampos"></div><br></td>
					</tr>
					
					<tr>
					<td><label>Acta de inicio</label></td>
					<td>
					<input class="form-control" type="hidden" name="MAX_FILE_SIZE" value="2000000">
					<input class="form-control" type="file" id="Acta_Inicio" name="doc" accept=".pdf">
					</td>
					</tr>
					
					<tr>
					<td><label>Observaciones</label></td>
					<td><textarea class="form-control" name="observaciones" cols="50" rows="6"></textarea></td>
					</tr>
					<tr>
					<td colspan="2"><center><br><input class="btn btn-primary" type="submit" name="enviar" value="Guardar"></center></td>
					</tr>
					</table>
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