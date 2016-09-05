<?php require_once('../admin/locked.php');

$Id = validar_id($_GET['Id']);
$consulta = $conexion->query("SELECT * FROM ponencia WHERE Id_Ponencia = '$Id' " )or die ("Error 1 ".$mysqli->error);
$row= $consulta->fetch_assoc();
?>

<html>
<?php require_once('../menu/head.php'); ?> 

<body class="skin-blue sidebar-mini" onload="muestra();cambia(<?php echo $row['Tipo_Encargado']; ?>)">
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
					Ponencia
				</h1>
			</section>

			<!-- Main content -->
			
			<section class="content">
				<div class="row">
					<div class="col-xs-12">
						<div class="box">
							
							<div class="box-body">

								<form action="ponenciaphp.php" method="post" enctype="multipart/form-data" name="registro">
									<table border="0" width="80%">
										<tr>
											<td colspan="2">
												<span style=" font-style: italic;"><b>* Todos los campos son obligatorios</b></span><br>
											</tr>
											<tr>
												<td width="25%"><label>Titulo:</label></td>
												<input class="form-control" type="hidden" name="Id_Ponencia" value="<?php echo $Id; ?>" >
												<td><input class="form-control" type="text" name="titulo" size="50" value="<?php echo $row['Titulo'];?>" required></td>
											</tr>

											<tr>
												<td>Buscar Integrantes</td>
												<td><input class="form-control" type='text' name='Nombres' Id='nombre1' size='40' placeholder="Buscar inventigador"/>
													<input class="btn btn-primary" type='button' onClick='agregarCampo()' value='Agregar'></td>
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
																print("<div id='VIN".$i."'><input type='text' size='40' name='Old".$i."' value='".$inte['Nombres']."' ><a href='JavaScript:quitar(".$i.");'>Quitar</a></div>");
															}
															?>
														</div>
														<br><br>
													</td>
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
													<td><label>Evento:</label></td>
													<td><input class="form-control" type="text" name="evento" value="<?php echo $row['Evento'];?>" required></td>
												</tr>
												<tr>
													<td><label>Ciudad:</label></td>
													<td><input class="form-control" type="text" name="ciudad" value="<?php echo $row['Ciudad'];?>" required></td>
												</tr>
												<tr>
													<td><label>Pais:</label></td>
													<td><input class="form-control" type="text" name="pais" value="<?php echo $row['Pais'];?>" required></td>
												</tr>
												<tr>
													<td><label>Fecha:</label></td>
													<td><input class="form-control" type="date" name="fecha" value="<?php echo $row['Fecha'];?>" required></td>
												</tr>

												<tr>
													<td><label>Observaciones:</label></td>
													<td><textarea name="Observaciones" cols="50" rows="6" ><?php echo $row['Observaciones']; ?></textarea></td>
												</tr>

												<tr>
													<td><label>Documento:</td>
													<input class="form-control" type="hidden" name="DocOld" value="<?php echo $row['URL'] ?>" >
													<input class="form-control" type="hidden" name="TipoOld" value="<?php echo $row['Tipo_Doc'] ?>" >
													<td><a href="<?php
														$Tipo_Doc = $row['Tipo_Doc'];
														if ($Tipo_Doc == "Documento"){
															echo "../documentos/ponencia/".$row['URL'];
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
													<table>
														<table id="editdoc" >
															<tr>
																<td>&nbsp;</td>
																<td>
																	<input type="radio" name="SubeDoc" id="Enlace" value="Enlace" onclick="docs()">Enlace</input> 
																	<br><input type="radio" name="SubeDoc" id="Documento" value="Documento" onclick="docs()">Ducumento</input></td>
																</tr>

																<tr>
																	<td><label>Especificar</td>
																	<td>
																		<input class="form-control" type="url" style="display:none" name="Enlace1" id="Enlace1" size="30" placeholder="URL Documento">

																		<input class="form-control" type="hidden" name="MAX_FILE_SIZE" value="2000000">
																		<input class="form-control" type="file" style="display:none" id="Documento1" name="doc" accept=".pdf"></td>
																	</tr>
																</table>
																<center><input class="btn btn-primary" type="submit" value="Guardar"></center>
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