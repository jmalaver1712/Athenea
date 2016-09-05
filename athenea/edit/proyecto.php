<?php require_once('../admin/locked.php'); ?>

<?php
$Id_Proyecto = validar_id($_GET['Id_Proyecto']);
$consulta = $conexion->query("SELECT * FROM proyectos WHERE Id_Proyecto = '$Id_Proyecto' ")or die ("Error 1 ".$mysqli->error);
$row= $consulta->fetch_assoc();
?>

<!DOCTYPE html>
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
					Modificar Proyectos
				</h1>
			</section>

			<!-- Main content -->

			<section class="content">
				<div class="row">
					<div class="col-xs-12">
						<div class="box">

							<div class="box-body">

								<form action="proyectophp.php" method="POST" enctype="multipart/form-data">
									<input class="form-control" type="hidden" name="Id_Proyecto" value="<?php echo $Id_Proyecto; ?>" required >
									<table border="0" width="80%">
										<tr>
											<td colspan="2">
												<span style=" font-style: italic;"><b>* Todos los campos son obligatorios</b></span><br>
											</tr>
											<tr>
												<td width="30%"><label>*Nombre del Proyecto:</label></td>
												<td><input class="form-control" type="text" name="Nombre" size="40" value="<?php echo $row['Nombre']; ?>" required ></td>
											</tr>
											<tr>
												<td><label>Codigo del Proyecto</label></td>
												<td><input class="form-control" type="text" name="Codigo_Proyecto" size="40" value="<?php echo $row['Codigo_Proyecto']; ?>"></td>
											</tr>

											<tr>
												<td><label>*Lider del Proyecto:</label></td>
												<?php 
					//Lider
												$Id_Lider = $row['Id_Investigador'];
												$lider = $conexion->query("SELECT * FROM investigadores WHERE Id_Investigador = '$Id_Lider' ")or die ("Error 1 ".$mysqli->error);
												$con= $lider->fetch_assoc();
												$Id_Lider = $con['Id_Investigador'];
												print("<td><input class='form-control' type='text' name='Lider' Id='nombre' size='40' value='".$con['Nombres']."' required/></td>");
												?>
											</tr>

											<tr>
												<td><label>horas dedicadas al proyecto por parte del líder</label></td>
												<td><input class="form-control" type="number" name="Horas" value="<?php echo $row['Horas']; ?>">
												</td>
											</tr>

											<tr>
												<td>Buscar Integrantes</td>
												<td><input class="form-control" type='text' name='Nombres' Id='nombre1' size='40' /><input class="btn btn-primary" type='button' onClick='agregarCampo()' value='Agregar'></td>
											</tr>

											<tr>
												<td>Nuevos Integrantes</td>
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
														$Id_Investigadores = $row['Id_Investigadores'];
														$Investigadores = explode('-',$Id_Investigadores);
														$num = count($Investigadores)-1;
														for ($i=1;$i<$num;$i++){
															$Id = $Investigadores[$i];
															$query = $conexion->query("SELECT * FROM investigadores WHERE Id_Investigador = '$Id' ")or die ("Error 1 ".$mysqli->error);
															$inte = $query->fetch_assoc();
															print("<div id='VIN".$i."'><input class='form-control' type='text' size='40' name='Old".$i."' value='".$inte['Nombres']."' ><a href='JavaScript:quitar(".$i.");'>Quitar</a></div>");
														}
														?>
													</div><br></td>
												</tr>

												<tr>
													<td><label>Descripción del Proyecto</label></td>
													<td><textarea class="form-control" name="Descripcion" rows="4" cols="50"><?php echo $row['Descripcion']; ?></textarea><br></td>
												</tr>

												<tr>
													<td><label>Grupo al que se encuentra adscrito el proyecto</label></td>
													<td>
														<?php  
														$TE = $row['Tipo_Encargado'];
														$ENC = "";
														?>
														<input type="radio" name="Tipo" style="display:none" id="e1" <?php if($TE == "investigadores"){$ENC = "Id_Investigador"; ?> checked <?php } ?> value="investigadores" onclick="cambia(this.value)">
														<input type="radio" name="Tipo" id="e2" <?php if($TE == "grupos"){$ENC = "Id_Grupo";?> checked <?php } ?> value="grupos" onclick="cambia(this.value)">Grupo</input><br>
														<input type="radio" name="Tipo" id="e3" <?php if($TE == "semilleros"){$ENC = "Id_Semillero";?> checked <?php } ?> value="semilleros" onclick="cambia(this.value)">Semillero</input><br>
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
													<td><label>Sede:</label></td>
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
															<option>Centro Regional de Buenaventura</option>
															<option>Centro Tutorial Cali</option>
															<option>Centro Tutorial El Prado</option>
															<option>Rectoria UNIMINUTO Virtual y a Distancia (UVD)</option>
															<select class="form-control">
															</td>
														</tr>

														<tr>
															<td><label>Facultad:</label></td>
															<td><input class="form-control" type="text" name="Facultad" value="<?php echo $row['Facultad']; ?>" ></td>
														</tr> 

														<tr>
															<td><label>Programa:</label></td>
															<td><input class="form-control" type="text" name="Programa" value="<?php echo $row['Programa']; ?>" ></td>
														</tr>


														<tr>
															<td><label>Fecha Inicio:</label></td>
															<td><input class="form-control" type="date" name="Fecha_Inicio" value="<?php echo $row['Fecha_Inicio']; ?>" ></td>
														</tr>

														<tr>
															<td><label>Fecha Final:</label></td>
															<td><input class="form-control" type="date" name="Fecha_Fin" value="<?php echo $row['Fecha_Fin']; ?>" ></td>
														</tr>

														<tr>
															<td><label>Costo del Proyecto:</label></td>
															<td><input class="form-control" type="number" name="Costo_Proyecto" value="<?php echo $row['Costo_Proyecto']; ?>" ></td>
														</tr>

														<tr>
															<td><label>Financiación interna :</label></td>
															<td><input class="form-control" type="number" name="Fin_Interna" value="<?php echo $row['Fin_Interna']; ?>" ></td>
														</tr>

														<tr>
															<td><label>Financiación Externa:</label></td>
															<td><input class="form-control" type="number" name="Fin_Externa" value="<?php echo $row['Fin_Externa']; ?>" ></td>
														</tr>

														<tr>
															<td><label>Convenio</label></td>
															<td><input class="form-control" type="text" name="Convenio" value="<?php echo $row['Convenio']; ?>" ></td>
														</tr>

														<tr>
															<td><label>Especificaciones del Convenio</label></td>
															<td><textarea class="form-control" name="Convenio_Esp" rows="3" cols="50"><?php echo $row['Convenio_Esp']; ?></textarea><br><br></td>
														</tr>

														<tr>
															<td><label>Convenio o Contrato</label></td>
															<td>
																<input class="form-control" type="hidden" name="Old_doc1" value="<?php echo $row['Doc1']; ?>">
																<a target="_blank" href=<?php echo "../documentos/proyectos/".$row['Doc1']; ?>>Ver Convenio o Contrato</a>
																<br>
																Reemplazar Convenio o Contrato => <input class="form-control" type="file" id="Convenio" name="doc1" accept=".pdf">
																<br><br>
															</td>
														</tr>

														<tr>
															<td><label>Acta de inicio</label></td>
															<td>
																<input class="form-control" type="hidden" name="Old_doc2" value="<?php echo $row['Doc2']; ?>">
																<a target="_blank" href=<?php echo "../documentos/proyectos/".$row['Doc2']; ?>>Ver Acta de inicio</a>
																<br>
																Reemplazar Acta de Inicio => <input class="form-control" type="file" id="Acta_Ini" name="doc2" accept=".pdf">
																<br><br>
															</td>
														</tr>

														<tr>
															<td><label>Acta de finalización</label></td>
															<td>
																<input class="form-control" type="hidden" name="Old_doc3" value="<?php echo $row['Doc3']; ?>">
																<a target="_blank" href=<?php echo "../documentos/proyectos/".$row['Doc3']; ?>>Ver Acta de finalización</a>
																<br>
																Reemplazar Acta de finalización => <input class="form-control" type="file" id="Acta_Fin" name="doc3" accept=".pdf">
																<br><br>
															</td>
														</tr>

														<tr>
															<td><label>Observaciones:</label></td>
															<td><textarea class="form-control" name="Observaciones" cols="50" rows="6" ><?php echo $row['Observaciones']; ?></textarea><br></td>
														</tr>

														<tr>
															<td><label>Documento:<br>
																<sup>Proyecto completo</sup></td>
																<input type="hidden" name="DocOld" value="<?php echo $row['URL'] ?>" >
																<input class="form-control" type="hidden" name="TipoOld" value="<?php echo $row['Tipo_Doc'] ?>" >
																<td><a href="<?php
																	$Tipo_Doc = $row['Tipo_Doc'];
																	if ($Tipo_Doc == "Documento"){
																		echo "../documentos/proyectos/".$row['URL'];
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
																		<input type="hidden" name="Cambia" id="Cambia">
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
																	<center><input class="btn btn-primary" type="submit" name="enviar" value="Enviar"></center></center>
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