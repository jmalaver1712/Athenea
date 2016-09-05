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
					<form action="librophp.php" method="post" enctype="multipart/form-data" name="registro">
					<table border="0" width="80%">
					<tr>
					<td colspan="2">
					<span style=" font-style: italic;"><b>* Todos los campos son obligatorios</b></span><br>
					</tr>

					<tr>
					<td><label>*Titulo del Libro:</label></td>
					<td><input class="form-control" type="text" name="titulo" size="50" required><br><br></td>
					</tr>


					<tr>
					<td colspan="2">
					<span style=" font-style: italic;">Los autores deben estar guardados en la Base de Datos</span>
					</td>
					</tr>

					<tr>
					<td><label>Buscar Autor:</label></td>
					<td><input class="form-control" type="text" name="Nombres" Id="nombre1" size="40" />
					<select class="form-control" Id="RolAut" name="RolAut">
					<option>Autor</option>
					<option>Adaptador</option>
					<option>Compilador</option>
					<option>Director del Libro</option>
					<option>Fotógrafo</option>
					<option>Ilustrador</option>
					<option>Editor Literario</option>
					<option>Traductor</option>
					<option>Coordinador</option>
					<option>Prologuista</option>
					<option>Director de Colección</option>
					<option>Coautor</option>
					<option>Corrector</option>
					<option>Diseñador</option>
					</select>
					<input class="btn btn-primary" type="button" onclick="agregarAutor()" value="Agregar"></td>
					</tr>

					<tr>
					<td>Autor(es)</td>
					<td><div id="contenedorcampos"></div><br><br></td>
					</tr>

					<tr>
					<td><label>Año de Publicación:</label></td>
					<td><input class="form-control" type="number" name="ano" ></td>
					</tr>

					<tr>
					<td><label>Grupo al que se encuentra adscrito el proyecto</label></td>
					<td>
					<input type="radio" name="Tipo" value="investigadores" onclick="cambia(this.value)" style="display:none">
					<input type="radio" name="Tipo" checked>No tiene Vinculo</input><br>
					<input type="radio" name="Tipo" value="grupos" onclick="cambia(this.value)">Grupo de Investigación</input><br>
					<input type="radio" name="Tipo" value="semilleros" onclick="cambia(this.value)">Semillero</input><br>
					</td>
					</tr>

					<tr>
					<td><label>Nombre del Grupo o Semillero:</label></td>
					<td>
					<input class="form-control" type="text" name="Investigador" id="nombre" size="40" style="display:none" placeholder="Investigador">
					<input class="form-control" type="text" name="Grupo" id="grupo" size="40" style="display:none" placeholder="Grupo de Investigación">
					<input class="form-control" type="text" name="Semillero" id="semillero" size="40" style="display:none" placeholder="Semillero">
					</td>
					</tr>


					<tr>
					<td><label>Nombre del Par evaluador:</label></td>
					<td><input class="form-control" type="text" name="Nombre_Par" ></td>
					</tr>


					<tr>
					<td><label>Sede:</label></td>
					<td>
					<select class="form-control" name="sede" Id="camp1" >
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
					<option>Centro Operacional de Buenaventura</option>
					<option>Centro Tutorial Cali</option>
<option>Rectoria UNIMINUTO Virtual y a Distancia (UVD)</option>
					</select>
					<br></td>
					</tr>

					<tr>
					<td><label>Facultad:</label></td>
					<td><input class="form-control" type="text" name="facultad" ><br></td>
					</tr>

					<tr>
					<td><label>Programa:</label></td>
					<td><input class="form-control" type="text" name="programa" ><br></td>
					</tr>

					<tr>
					<td><label>Ciudad:</label></td>
					<td><input class="form-control" type="text" name="ciudad" ><br></td>
					</tr>
					<tr>
					<td><label>Pais:</label></td>
					<td><input class="form-control" type="text" name="pais" ></td>
					</tr>
					<tr>
					<td><label>Editorial:</label></td>
					<td><input class="form-control" type="text" name="editorial" ><br></td>
					</tr>
					<tr>
					<td><label>ISBN:</label></td>
					<td><input class="form-control" type="text" name="isbn" ><br></td>
					</tr>
					<tr>
					<td><label>Compilador:</label></td>
					<td><input class="form-control" type="text" name="compilador"></td>
					</tr>
					<tr>
					<td><label>Palabras claves:</label></td>
					<td><textarea class="form-control" name="palabras_c" cols="40" rows="3"></textarea></td>
					</tr>

					<tr>
					<td>Documento</td>
					<td>
					<input type="radio" name="SubeDoc" id="Enlace" value="Enlace" onclick="docs()">Enlace</input> 
					<br><input type="radio" name="SubeDoc" id="Documento" value="Documento" onclick="docs()">Documento</input></td>
					</tr>

					<tr>
					<td><label>Especificar</td>
					<td>
					<input class="form-control" type="url" style="display:none" name="Enlace1" id="Enlace1" size="30" placeholder="URL Documento">

					<input class="form-control" type="hidden" name="MAX_FILE_SIZE" value="2000000">
					<input class="form-control" type="file" style="display:none" id="Documento1" name="doc" accept=".pdf"></td>
					</tr>
					<tr>
					<td><label>Observaciones</label></td>
					<td><textarea class="form-control" name="observaciones" cols="50" rows="6"></textarea></td>
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