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
		  Agregar Articulo
          </h1>	
        </section>
        <!-- Main content -->
		<section class="content">
          <div class="row">
            <div class="col-xs-12">

              <div class="box">
                
                <div class="box-body">
					
					<form action="articulophp.php" method="post" enctype="multipart/form-data" name="registro">
					<table width="80%" border="0">
					<tr>
					<td colspan="2">
					<span style=" font-style: italic;"><b>* Todos los campos son obligatorios</b></span><br>
					</tr>
					<tr>
					<td><label>Título del Artículo:</label></td>
					<td><input class="form-control" type="text" name="titulo" required></td>
					</tr>

					<tr>
					<td><label>Buscar Autores:</label></td>
					<td><input class="form-control" type="text" name="Nombres" Id="nombre1" size="40" />
					<input class="btn btn-primary" type="button" onclick="agregarCampo()" value="Agregar"></td>
					</tr>

					<tr>
					<td>Autor(es)</td>
					<td><div id="contenedorcampos"></div></td>
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
					<td><label>Revista:</label></td>
					<td><input class="form-control" type="text" name="revista" required></td>
					</tr>
					<tr>
					<td><label>ISSN:</label></td>
					<td><input class="form-control" type="text" name="issn" ></td>
					</tr>
					<tr>
					<td><label>Ciudad:</label></td>
					<td><input class="form-control" type="text" name="ciudad" ></td>
					</tr>
					<tr>
					<td><label>Pais:</label></td>
					<td><input class="form-control" type="text" name="pais" ></td>
					</tr>
					<tr>
					<td><label>Año:</label></td>
					<td><input class="form-control" type="number" name="ano" ><br></td>
					</tr>
					<tr>
					<td><label>Volumen:</label></td>
					<td><input class="form-control" type="number" name="volumen" ><br></td>
					</tr>
					<tr>
					<td><label>Fasciculo:</label></td>
					<td><input class="form-control" type="number" name="fasciculo" ><br></td>
					</tr>
					<tr>
					<td><label>Paginas:</label></td>
					<td><input class="form-control" type="number" name="paginas" ><br></td>
					</tr>
					<tr>
					<td><label>Indexación:</label></td>
					<td><select class="form-control" name="indexacion" onchange="index(this.value)">
					<option value="NO">No</option>
					<option value="SI">Si</option>
					</select></td>
					</tr>
					<tr>
					<td>Detalles de Indexación</td>
					<td><input class="form-control" type="text" name="detalles" size="50" id="detalles" placeholder="Detalles de Indexación" disabled></td>
					</tr>

					<tr>
					<td>Palabras Clave</td>
					<td><textarea class="form-control" cols="50" rows="3" name="Palabras_Clave" placeholder="Palabras Clave del Artículo" ></textarea></td>
					</tr>

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
					<td><label>Nombre del Par evaluador:</label></td>
					<td><input class="form-control" type="text" name="par" id="par_evaluador" size="40"></td>
					</tr>

					<tr>
					<td><label>Observaciones</label></td>
					<td><textarea class="form-control" name="observaciones" cols="50" rows="6"></textarea></td>
					</tr>
					<tr>
					<td><br><br><input class="btn btn-primary" type="submit" name="enviar" value="Guardar"></td>
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