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
		  Agregar Proyecto
          </h1>	
        </section>

        <!-- Main content -->
		
		<section class="content">
          <div class="row">
            <div class="col-xs-12">

              <div class="box">
                
                <div class="box-body">
					
					<form action="proyectophp.php" method="post" enctype="multipart/form-data" name="registro">
					<table border="0" width="80%">
					<tr>
					<td colspan="2">
					<span style=" font-style: italic;"><b>* Todos los campos son obligatorios</b></span><br>

					</tr>
					<tr>
					<td><label>*Nombre del Proyecto:</label></td>
					<td><input class="form-control" type="text" name="Nombre" size="40" required ></td>
					</tr>

					<tr>
					<td><label>Codigo del Proyecto</label></td>
					<td><input class="form-control" type="text" name="Codigo_Proyecto" size="40"></td>
					</tr>

					<tr>
					<td><label>*Lider del Proyecto:</label></td>
					<td>
					<input class="form-control" type="text" name="Lider" Id="nombre" size="40" placeholder="Investigador" required />
					</td>
					</tr>

					<tr>
					<td><label>horas dedicadas al proyecto por parte del líder</label></td>
					<td><input class="form-control" type="number" name="Horas">
					</td>
					</tr>

					<tr>
					<td><label>Descripción del Proyecto</label></td>
					<td><textarea class="form-control" name="Descripcion" rows="4" cols="50"> </textarea></td>
					</tr>

					<tr>
					<td><label>Grupo al que se encuentra adscrito el proyecto</label></td>
					<td>
					<input type="radio" name="Tipo" value="on" checked>No tiene Vinculo</input><br>
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
					<td><label>Sede:</label></td>
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
					</select>
					</td>
					</tr>

					<tr>
					<td><label>Facultad:</label></td>
					<td><input class="form-control" type="text" name="Facultad" ></td>
					</tr> 

					<tr>
					<td><label>Programa:</label></td>
					<td><input class="form-control" type="text" name="Programa" ></td>
					</tr>



					<tr>
					<td><label>Buscar Integrantes:</label></td>
					<td>
					<!--
					<select class="form-control select2" style="width: 100%;"  name="Nombres" id="nombre1">
					<option selected="selected">Alabama</option>
					<option>Alaska</option>
					<option>California</option>
					<option>Delaware</option>
					<option>Tennessee</option>
					<option>Texas</option>
					<option>Washington</option>
					</select>
					-->
					<input class="form-control" type="text" name="Nombres" id="nombre1" size="40" placeholder="Nombre del Integrante" />
					<input class="btn btn-primary" type="button" onclick="agregarCampo()" value="Agregar"></td>
					</tr>

					<tr>
					<td>Integrantes</td>
					<td><div id="contenedorcampos"></div></td>
					</tr>

					<tr>
					<td><label>Fecha Inicio:</label></td>
					<td><input class="form-control" type="date" name="Fecha_Inicio" ></td>
					</tr>

					<tr>
					<td><label>Fecha Final:</label></td>
					<td><input class="form-control" type="date" name="Fecha_Fin" ></td>
					</tr>

					<tr>
					<td><label>Costo del Proyecto:</label></td>
					<td><input class="form-control" type="number" name="Costo_Proyecto" ></td>
					</tr>

					<tr>
					<td><label>Financiación interna :</label></td>
					<td><input class="form-control" type="number" name="Fin_Interna" ></td>
					</tr>

					<tr>
					<td><label>Financiación Externa:</label></td>
					<td>
					<input class="form-control" type="text" name="Convenio" placeholder="Entidad Financiadora">
					<input class="form-control" type="number" name="Fin_Externa" placeholder="Cantidad Financiada">
					<br><textarea class="form-control" cols="50" name="Convenio_Esp" placeholder="Observaciones"></textarea>
					</td>
					</tr>


					<tr>
					<td><label>Convenio o Contrato</label></td>
					<td>
					<input class="form-control" type="file" id="Convenio" name="doc1" accept=".pdf">
					</td>
					</tr>

					<tr>
					<td><label>Acta de inicio</label></td>
					<td>
					<input class="form-control" type="file" id="Acta_Ini" name="doc2" accept=".pdf">
					</td>
					</tr>

					<tr>
					<td><label>Acta de finalización</label></td>
					<td>
					<input class="form-control" type="file" id="Acta_Fin" name="doc3" accept=".pdf">
					</td>
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

					<input class="form-control" type="hidden" name="MAX_FILE_SIZE" value="9000000">
					<input class="form-control" type="file" style="display:none" id="Documento1" name="doc" accept=".pdf"></td>
					</tr>
					<tr>
					<td><label>Observaciones</label></td>
					<td><textarea class="form-control" name="observaciones" cols="50" rows="6"></textarea></td>
					</tr>

					<tr>
					<td><br></td>
					<td><br></td>
					</tr>

					<tr>
					<td colspan="2"><center><input class="btn btn-primary" type="submit" name="enviar" value="Guardar"></center></td>
					</tr>
					</table>
					</center>
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