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
		  Agregar Libro
          </h1>	
        </section>

        <!-- Main content -->
		
		<section class="content">
          <div class="row">
            <div class="col-xs-12">

              <div class="box">
                <div class="box-body">
				
					<form action="redphp.php" method="post" enctype="multipart/form-data" name="registro">
					<table border="0" width="80%">
					<tr>
					<td colspan="2">
					<span style=" font-style: italic;"><b>* Todos los campos son obligatorios</b></span><br>
					</tr>

					<tr>
					<td><label>*Nombre de la Red:</label></td>
					<td><input class="form-control" type="text" name="Nombre" size="50" required></td>
					</tr>

					<tr>
					<td><label>Sede:</label></td>
					<td>
					<select class="form-control" name="Sede">
					<option>No Aplica (NA)</option>
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
					</select>
					<br></td>
					</tr>

					<tr>
					<td><label>*Representante por UNIMINUTO</label></td>
					<td><input class="form-control" type="text" name="Representante" Id="nombre" size="40" required/></td>
					</tr>

					<tr>
					<td><label>Fecha de Inicio</label></td>
					<td><input class="form-control" type="date" name="Fecha_Inicio"/></td>
					</tr>

					<tr>
					<td><label>Fecha de Renovación</label></td>
					<td><input class="form-control" type="date" name="Fecha_Renovacion"></td>
					</tr>

					<tr>
					<td><label>Pagina Web</label></td>
					<td><input class="form-control" type="url" name="Pagina_Web"></td>
					</tr>

					<tr>
					<td><label>Tipo de Red</label></td>
					<td>
					<select class="form-control" name="Tipo_Red">
					<option>Internacional</option>
					<option>Nacional</option>
					</select>
					</td>
					</tr>

					<tr>
					<td><label>Tipo de Asociación</label></td>
					<td>
					<select class="form-control" name="Tipo_Asociacion">
					<option>Conformación</option>
					<option>Membresia</option>
					</select>
					</td>
					</tr>

					<tr>
					<td><label>Costo de Afiliación</label></td>
					<td><input class="form-control" type="text" name="Costo_Afiliacion" size="40"></td>
					</tr>

					<tr>
					<td><label>Centro Adscrito</label></td>
					<td><input class="form-control" type="text" name="Centro_Adscrito" size="40"></td>
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
					<select class="form-control">
					</td>
					</tr>

					<tr>
					<td><label>Programa:</label></td>
					<td><input class="form-control" type="text" name="Programa" ><br></td>
					</tr>

					<tr>
					<td><label>Constitución Juridica</label></td>
					<td><input class="form-control" type="text" name="Constitucion" size="40"></td>
					</tr>

					<tr>
					<td><label>Objetivo:</label></td>
					<td><textarea class="form-control" name="Objetivo" cols="40" rows="3" placeholder="Objetivo" ></textarea></td>
					</tr>

					<tr>
					<td><label>Compromisos</label></td>
					<td><textarea class="form-control" name="Compromisos" cols="40" rows="3" placeholder="Compromisos" ></textarea></td>
					</tr>

					<tr>
					<td><label>Importancia de Pertenecer a la Red</label></td>
					<td><textarea class="form-control" name="Importancia" cols="50" rows="6"></textarea></td>
					</tr>

					<tr>
					<td><label>Logros</label></td>
					<td><textarea class="form-control" name="Logros" cols="50" rows="6"  placeholder="Logros"></textarea></td>
					</tr>

					<tr>
					<td><label>Observaciones</label></td>
					<td><textarea class="form-control" name="Observaciones" cols="50" rows="6" placeholder="Observaciones"></textarea></td>
					</tr>

					<tr>
					<td colspan="2"><br><center><input class="btn btn-primary" type="submit" name="enviar" value="Guardar"></center></td>
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