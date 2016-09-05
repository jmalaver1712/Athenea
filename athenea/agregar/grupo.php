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
		  Agregar Grupo
          </h1>	
        </section>

        <!-- Main content -->
		
		<section class="content">
          <div class="row">
            <div class="col-xs-12">

              <div class="box">
                
                <div class="box-body">
					
				<form action="grupophp.php" method="post" enctype="multipart/form-data" onsubmit="return validar()" >
				<table width="80%">
				<tr>
					<td><label>*Nombre del Grupo:</label></td>
					<td><input class="form-control" type="text" name="NombreGrupo" size="60" required/></td>
				</tr>

				<tr>
					<td><label>GrupLAC:</label></td>
					<td><input class="form-control" type="url" name="CvLAC" size="30"></td>
				</tr>
				<tr>
					<td><label>Red Vinculada</label></td>
					<td><input class="form-control" type="text" name="Redes" id="Redes"></td>
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
					<option>Centro Operacional de Buenaventura</option>
					<option>Centro Tutorial Cali</option>
<option>Sede Virtual y Distancia (UVD) </option>
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
					<td><label>Reseña:</label></td>
					<td><textarea class="form-control" name="Resena" cols="50" rows="5" ></textarea><br><br></td>
				</tr>
				<tr>
					<td><label>Año de Creación:</label></td>
					<td><input class="form-control" type="number" name="Creacion" >
					</td>
				</tr>
				<tr>
					<td><label>Categoria:</label></td>
					<td>
					<select class="form-control" name="Ano_Categoria" id="Ano_Categoria">
					<?php
					$AC = 2000;
					while($AC < 2020){ 
					echo "<option>".$AC."</option>";
					$AC++;
					}
					?>
					</select>
					<select class="form-control" name="Categoria" id="Categoria">
					<option>A1</option>
					<option>A</option>
					<option>B</option>
					<option>C</option>
					<option>D</option>
					<option>Reconocido</option>
					<option>NA (No Aplica)</option>
					</select>
					<input class="btn btn-primary" type="button" id="Agregar" value="Agregar" onclick="cateJS()">
					
					</td>
				</tr>
				<tr>
				<td></td>
				<td>
				<div id="CategoriasT"></div>
				<br>
				</td>
				</tr>

				<tr>
					<td><label>Lineas de investigación:</label></td>
					<td><input class="form-control" type="text" name="valor" id="valor" size="50" >
					<input class="btn btn-primary" type="button" onclick="dinamica()" value="Agregar"></td>
				</tr>

				<tr>
				<td>&nbsp;</td>
				<td><div id="dinamismo"></div></td>
				</tr>

				<tr>
					<td><label>Investigador Lider:</label></td>
					<td><input class="form-control" type="text" name="Lider" Id="nombre" size="40" required/></td>
				</tr>

				<tr>
					<td><label>Buscar Integrantes:</label></td>
					<td><input class="form-control" type="text" name="Nombres" Id="nombre1" size="40" />
					<input class="btn btn-primary" type="button" onclick="agregarCampo()" value="Agregar"></td>
				</tr>

				<tr>
				<td><label>Integrantes</label></td>
				<td><div id="contenedorcampos"></div></td>
				</tr>
				<tr>
					<td><label>Observaciones</label></td>
					<td><textarea class="form-control" name="observaciones" cols="50" rows="6"></textarea></td>
				</tr>

				<td><label>Acta de Inicio</label></td>
				<td>
				<input class="form-control" type="hidden" name="MAX_FILE_SIZE" value="2000000">
				<input class="form-control" type="file" name="doc" accept=".pptx"></td>
				</tr>
				<tr>
				<td>
				<br>
				<br>
				<input class="btn btn-primary" type="submit" value="Guardar" /></td>
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