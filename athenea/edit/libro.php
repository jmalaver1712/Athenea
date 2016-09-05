<?php require_once('../admin/locked.php'); ?>
<?php 
$Id = validar_id($_GET['Id']);
$consulta = $conexion->query("SELECT * FROM libro WHERE Id_Libro = '$Id' " )or die ("Error 1 ".$mysqli->error);
$row= $consulta->fetch_assoc();
?>

<html>
<?php require_once('../menu/head.php'); ?> 

<body class="skin-blue sidebar-mini" onload="muestra()">
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
					Modificar Libro
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
												<td width="30%"><label>*Titulo del Libro:</label></td>
												<input class="form-control" type="hidden" name="Id_Libro" value="<?php echo $Id; ?>"  required>
												<td width="70%"><input class="form-control" type="text" name="Titulo" value="<?php echo $row['Titulo']; ?>"  required ></td>
											</tr>

											<tr>
												<td>Buscar Autor(es)</td>
												<td><input class="form-control" type='text' name='Nombres' Id='nombre1' size='40' placeholder="Buscar Autores " />
													<input class="btn btn-primary" type='button' onClick='agregarCampo()' value='Agregar'></td>
												</tr>

												<tr>
													<td>Autor(es)</td>
													<td>
														<script>
															function quitar(n){
																var eliminar = document.getElementById("VIN"+n);
																var contenedor= document.getElementById("contenedorcampos");
																contenedor.removeChild(eliminar);
															}
														</script>
														<div id="contenedorcampos">
															<?php
					//Integrantes
															$Id_Investigadores = $row['Autores'];
															$Investigadores = explode('-',$Id_Investigadores);
															$num = count($Investigadores)-1;
															for ($i=0;$i<$num;$i++){
																$Id = $Investigadores[$i];
																$query = $conexion->query("SELECT * FROM investigadores WHERE Id_Investigador = '$Id' ")or die ("Error 1 ".$mysqli->error);
																$inte = $query->fetch_assoc();
																print("<div id='VIN".$i."'><input type='text' size='40' name='Old".$i."' value='".$inte['Nombres']."' ><a href='JavaScript:quitar(".$i.");'>Quitar</a></div>");
															}
															?>
														</div><br><br></td>
													</tr>

													<tr>
														<td><label>Grupo al que se encuentra adscrito el proyecto</label></td>
														<td>
															<?php  
															$TE = $row['Tipo_Encargado'];
															$ENC = "";
															?>
															<input type="radio" name="Tipo" style="display:none" id="e1" <?php if($TE == "investigadores"){$ENC = "Id_Investigador"; ?> checked <?php } ?> value="investigadores" onclick="cambia(this.value)">
															<input type="radio" name="Tipo" <?php if($TE == ""){$ENC = "";?> checked <?php } ?> >No tiene Vinculo</input><br>
															<input type="radio" name="Tipo" id="e2" <?php if($TE == "grupos"){$ENC = "Id_Grupo";?> checked <?php } ?> value="grupos" onclick="cambia(this.value)">Grupo</input><br>
															<input type="radio" name="Tipo" id="e3" <?php if($TE == "semilleros"){$ENC = "Id_Semillero";?> checked <?php } ?> value="semilleros" onclick="cambia(this.value)">Semillero</input>
															<br><br>
														</td>
													</tr>

													<tr>
														<td><label>Nombre del Grupo o Semillero:</label></td>
														<td>
															<?php

															$IdE = $row['Id_Encargado'];
															if($IdE != 0){
																$consultaC = $conexion->query("SELECT * FROM $TE WHERE $ENC = '$IdE' " )or die ("Error 1 ".$mysqli->error);
																$row1= $consultaC->fetch_assoc();
															}
															?>
															<input class="form-control" type="text" name="Investigador" id="nombre" size="40" style="display:none" <?php if ($TE == "investigadores"){?> value="<?php echo $row1['Nombres'];?>" <?php } ?> placeholder="Investigador">
															<input class="form-control" type="text" name="Grupo" id="grupo" size="40" style="display:none" <?php if ($TE == "grupos"){?> value="<?php echo $row1['Nombres'];?>" <?php } ?> placeholder="Grupo">
															<input class="form-control" type="text" name="Semillero" id="semillero" size="40" style="display:none" <?php if ($TE == "semilleros"){?> value="<?php echo $row1['Nombres'];?>" <?php } ?> placeholder="Semillero">
														</td>
													</tr>

													<tr>
														<td><label>Nombre del Par evaluador:</label></td>
														<td><input class="form-control" type="text" name="Nombre_Par" value="<?php echo $row['Nombre_Par']; ?>"></td>
													</tr>

													<tr>
														<td>
															<label>Sede:</label>
														</td>
														<td>
															
															<select class="form-control" name="Sede">
																<option><?php echo $row['Sede']; ?></option>
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
															</select>
															
														</td>
													</tr>

													<tr>
														<td>
															<label>Facultad:</label>
														</td>
														<td>
															<select class="form-control" name="Facultad" id="Facultad" onchange="facultad(this.value)">
																<option><?php echo $row['Facultad']; ?></option>
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
														</tr>

														<tr>
															<td>
																<label>Programa:</label>
															</td>
															<td><input class="form-control" type="text" name="Programa" value="<?php echo $row['Programa']; ?>"><br></td>
														</tr>
														<tr>
															<td>
																<label>Ciudad:</label>
															</td>
															<td><input class="form-control" type="text" name="Ciudad" value="<?php echo $row['Ciudad']; ?>"><br></td>
														</tr>
														<tr>
															<td><label>Pais:</label></td>
															<td><input class="form-control" type="text" name="Pais" value="<?php echo $row['Pais']; ?>"></td>
														</tr>
														<tr>
															<td><label>Editorial:</label></td>
															<td><input class="form-control" type="text" name="Editorial" value="<?php echo $row['Editorial']; ?>"><br></td>
														</tr>
														<tr>
															<td><label>ISBN:</label></td>
															<td><input class="form-control" type="text" name="ISBN" value="<?php echo $row['ISBN']; ?>"><br></td>
														</tr>
														<tr>
															<td><label>Año de publicación:</label></td>
															<td><input class="form-control" type="number" name="Ano" value="<?php echo $row['Ano']; ?>"></td>
														</tr>
														<tr>
															<td><label>Compilador:</label></td>
															<td><input class="form-control" type="text" name="Compilador" value="<?php echo $row['Compilador']; ?>"></td>
														</tr>
														<tr>
															<td><label>Palabras claves:</label></td>
															<td><textarea class="form-control" name="Palabras_Claves" cols="40" rows="3"><?php echo $row['Palabras_Claves']; ?></textarea>

															</td>
														</tr>

														<tr>
															<td><label>Observaciones:</label></td>
															<td><textarea class="form-control" name="Observaciones" cols="50" rows="6" ><?php echo $row['Observaciones']; ?></textarea></td>
														</tr>

														<tr>
															<td><label>Documento:</td>
															<input class="form-control" type="hidden" name="DocOld" value="<?php echo $row['URL'] ?>" >
															<input class="form-control" type="hidden" name="TipoOld" value="<?php echo $row['Tipo_Doc'] ?>" >
															<td><a href="<?php
																$Tipo_Doc = $row['Tipo_Doc'];
																if ($Tipo_Doc == "Documento"){
																	echo "../documentos/libro/".$row['URL'];
																}
																else{
																	echo $row['URL'];
																}
																?>" target="_blank">Ver documento</a>
															</tr>

															<tr>
																<td></td>
																<td>¿Desea reemplazar el documento Existente?
																	<input type="checkbox" name="Subir" id="Subir" onclick="muestra()">
																	<input class="form-control" type="hidden" name="Cambia" id="Cambia">
																</td>
															</tr>
														</table>
														<table id="editdoc" >
															<tr>
																<td>&nbsp;</td>
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
																</table>
																<br><br>
																<center><input  class="btn btn-primary" type="submit" name="enviar" value="Actualizar"></center></td>

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
