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
		  Agregar Noticia
          </h1>	
        </section>

        <!-- Main content -->
		
		<section class="content">
          <div class="row">
            <div class="col-xs-12">

              <div class="box">
                
                <div class="box-body">
				
				
				<form action="noticiaphp.php" method="post" enctype="multipart/form-data" name="form2">
                <span style=" font-style: italic;"><b>* Todos los campos son obligatorios</b></span><br>
				<table width="80%" border="0">
					
					<tr>
					<td><label>Título del Artículo:</label></td>
					<td><input class="form-control" name="Titulo" type="text" id="Titulo" required placeholder="Título del Artículo"/><br>
					</td>
					</tr>
					
					<tr>
					<td><label>Resumen:</label></td>
					<td>
					<textarea class="form-control" name="Resumen" placeholder="Resumen"></textarea><br>
					</td>
					</tr>
					
					<tr>
					<td><label>Imagen:</label></td>
					<td>
					<input class="form-control" name="doc" type="file" required id="doc">
                    <input class="form-control" type="hidden" name="MAX_FILE_SIZE" value="2000000">
					<br>
					</td>
					</tr>
					
					<tr>
					<td><label>Fecha:</label></td>
					<td>
					Publicación<input class="form-control" name="Fecha_Publicacion" type="date" placeholder="Fecha de Publicación"/><br>
					Caducidad<input class="form-control" name="Fecha_Caducudad" type="date" placeholder="Fecha de Caducidad"/><br>
					</td>
					</tr>
					
					<tr>
					<td><label>URL(Mayor Información):</label></td>
					<td>
					<input class="form-control" name="URL_Not" type="url" placeholder="URL"/><br>
					</td>
					</tr>
					
					<tr>
					<td><label>Párrafos:</label></td>
					<td>
                    <textarea class="form-control" name="valor" id="valor" placeholder="Parrafos de la Noticia"></textarea><br>
					<input type="button" onClick="dinamica()" value="Agregar" class="ui button">
					<br>
					</tr>
					
					<tr>
					<td><label>Párrafos Guardados:</label></td>
					<td>
					<div id="dinamismo"></div>
					</tr>
					
					<tr>
					<td colspan="2" align="center">
					<input class="form-control" name="Estado"  id="Estado" type="hidden" value="activado"/>
					<input class="btn btn-primary" type="submit" value="Guardar" class="ui submit button">
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