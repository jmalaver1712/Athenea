<?php require_once('../admin/locked.php'); ?>

<?php
$Id_Grupo = $_GET['Id'];
$grup = $conexion->query("SELECT * FROM grupos WHERE Id_Grupo = '$Id_Grupo' ")or die ("Error 1 ".$mysqli->error);
$row= $grup->fetch_assoc();
?>

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
		  Grupo de Investigación
          </h1>	
        </section>

        <!-- Main content -->
		
		<section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-body">
				<!-- START CUSTOM TABS -->
				<div class="row">
				  <!-- Custom Tabs -->
				  <div class="nav-tabs-custom">
					<ul class="nav nav-tabs">
					  <li class="active"><a href="#tab_1" data-toggle="tab">Grupo</a></li>
					  <li><a href="#tab_2" data-toggle="tab">Productos</a></li>
					  <li><a href="#tab_3" data-toggle="tab">Proyectos</a></li>
					  <li><a href="#tab_4" data-toggle="tab">Semilleros</a></li>
					  
					  <li class="pull-right"><a onclick="return confirmDelete(this);" 
					  <?php echo "href='../eliminar/eliminar.php?Id=".$row['Id_Grupo']."&Tabla=grupos&Campo=Id_Grupo'"; ?> class="text-muted"><i class="fa fa-close"></i></a></li>
					<li class="pull-right"><a <?php echo "href='../edit/grupo.php?Id=".$row['Id_Grupo']."'" ?> class="text-muted"><i class="fa fa-edit"></i></a></li>
					  
					</ul>
					<div class="tab-content">
					<div class="tab-pane active" id="tab_1">
						<table>
						<tr>
						<td width="20%"><label>Nombre:</label></td>
						<td width="80%"><?php echo $row['Nombres']; ?></td>
						</tr>

						<tr>
						<td><label>Perfil GrupLac :</label></td>
						<td><a href="<?php echo $row['CvLAC']; ?>" target="_blank"> GrupLAC </a></td>
						</tr>

						<tr>
						<td><label>Categoría:</label></td>
						<td>
						<?php
						//Categorias
						$Categoria = $row['Categoria'];
						$Cate = explode('%%',$Categoria);
						$CN = count($Cate);
						for ($f=1;$f<$CN;$f++){
						echo $Cate[$f]."<br>";
						}
						?>
						<br>
						</td>
						</tr>

						<tr>
						<td><label>Red(es) Vinculada:</label></td>
						<td>
						<?php

						$Redes = $row['Id_Red'];
						$Red = explode('%%',$Redes);
						$RN = count($Red);
						for ($f=1;$f<$RN;$f++){
						$Id_Red = $Red[$f];
						$queryR = $conexion->query("SELECT * FROM redes WHERE Id_Red = '$Id_Red'")or die ("Error 1 ".$mysqli->error);
						$rowR= $queryR->fetch_assoc();
						print("<a href='../ver/redes.php?Id=$Id_Red'>".$rowR['Nombre']."</a><br>");
						}
						?></td>
						</tr>

						<tr>
						<td><label>Sede:</label></td>
						<td><?php echo $row['Sede']; ?></td>
						</tr>

						<tr>
						<td><label>Facultad o Unidad:</label></td>
						<td><?php echo $row['Facultad']; ?><br><br></td>
						</tr>

						<tr>
						<td><label>Reseña:</label></td>
						<td><p style="text-align:justify"><?php echo $row['Resena']; ?></p></td>
						</tr>

						<tr>
						<td><label>Creación (Año):</label></td>
						<td><?php echo $row['Creacion']; ?></td>
						</tr>

						<tr>
						<td><br></td>
						<td><br></td>
						</tr>

						<tr>
						<td><label>Investigador Lider:</label></td>
						<td>
						<?php 
						//Lider
						$Id_Lider = $row['Id_Investigador'];
						$lider = $conexion->query("SELECT * FROM investigadores WHERE Id_Investigador = '$Id_Lider' ")or die ("Error 1 ".$mysqli->error);
						$con= $lider->fetch_assoc();
						$Id_Lider = $con['Id_Investigador'];
						print("<a href='../ver/investigador.php?Id=$Id_Lider'>".$con['Nombres']."</a>");
						?>
						</td>
						</tr>

						<tr>
						<td><label>Correo Electronico:</label></td>
						<td><?php echo $row['Correo_Grupo']; ?></td>
						</tr>

						<tr>
						<td><br></td>
						</tr>
						<tr>
						<td><label>Integrantes:</label></td>
						<td>
						<?php
						//Integrantes
						$Id_Investigadores = $row['Id_Investigadores'];
						$Investigadores = explode('-',$Id_Investigadores);
						$num = count($Investigadores);
						$numI = $num - 1;
						$numII = $numI - 1;  
						print ("<h4>$numII Integrante(s)</h4>");
						for ($i=1;$i<$numI;$i++){
						$Id = $Investigadores[$i];
						$query = $conexion->query("SELECT * FROM investigadores WHERE Id_Investigador = '$Id' ")or die ("Error 1 ".$mysqli->error);
						$act = $conexion->query("SELECT * FROM fechas WHERE (Id_Investigador = '$Id') AND (Id_Grupo = '$Id_Grupo') AND Fechas_Fin = 'ACTUALIDAD'")or die ("Error 1 ".$mysqli->error);
						$actN = mysqli_num_rows($act);
						$estado = "";
						if($actN == 0){$estado = "Inactivo";}
						if($actN == 1){$estado = "Activo";}

						$inte = $query->fetch_assoc();
						//Consulta Trayectoria
						print("<p style='line-height: 1'><a href='../ver/investigador.php?Id=$Id'>".$inte['Nombres']."</a>(".$inte['Tipo_Inves'].")&nbsp;&nbsp;&nbsp;<a href='../agregar/fecha.php?Id_Inves=$Id&Id_Grupo=$Id_Grupo'><img src='../dist/img/tpg.png'></a>".$estado."<br>");
						//Trayectorias
						$tray = $conexion->query("SELECT * FROM fechas WHERE Id_Investigador = '$Id' AND Id_Grupo = '$Id_Grupo' ORDER BY Fechas_Ini ASC")or die ("Error 1 ".$mysqli->error);
						while($tra = $tray->fetch_assoc()){
						$FI = date_create($tra['Fechas_Ini']);
						$FFI = date_format($FI, 'd-M-Y');

						$FFF = $tra['Fechas_Fin'];
						if($tra['Fechas_Fin'] != "ACTUALIDAD"){
						$FF = date_create($tra['Fechas_Fin']);
						$FFF = date_format($FF, 'd-M-Y');
						}

						echo "<font size='-1'>".$FFI." / ".$FFF."</font>&rarr;";
						}
						echo "</p>";
						}
						?>
						<br>
						</td>
						</tr>

						<tr>
						<td><label>Lineas de Investigación:</label></td>
						<td>
						<?php
						//Lineas
						$Lineas = $row['Lineas'];
						$Linea = explode('#',$Lineas);
						$num = count($Linea);
						for ($j=0;$j<$num-1;$j++){
						echo "&rArr;".$Linea[$j]."<br>";
						}
						?>
						</td>

						</td>
						</tr>

						<tr>
						<td><label>Acta de inicio</td>
						<td><a href="<?php echo "../documentos/grupos/".$row['Acta'].""; ?>" target="_blank">Ver Acta de Inicio</a>
						</tr>

						<tr>
						<td><label>Observaciones</label></td>
						<td><p style="text-align:justify"><?php echo $row['Observaciones']; ?></p></td>
						</tr>

						<tr>
						<td colspan="2" align="right"><?php echo "<font size='-1'>".$row['Ult_Registro']."</font>"; ?></td>
						</tr>

					</table>
					   
				</div><!-- /.tab-pane -->
				<div class="tab-pane" id="tab_2">

					<h3>Libros</h3>
					<?php
						$consultal = $conexion->query("SELECT * FROM libro WHERE Tipo_Encargado = 'grupos' AND Id_Encargado = '$Id_Grupo'" )or die ("Error 1 ".$mysqli->error);
						$num10 = mysqli_num_rows($consultal);
						if($num10 == "0"){
						print("No se encuentran registros<br><br>");
						}
						else{
							print("<font size='+2'>".$num10." Libros encontrados</font>
								<table width='100%'>
									<tr>
										<td bgcolor='#CCCCCC' width='30%' align='center'>Título</td>
										<td bgcolor='#CCCCCC' width='5%'></td>
										<td bgcolor='#CCCCCC' width='10%' align='center' >Año</td>
										<td bgcolor='#CCCCCC' width='5%'></td>
										<td bgcolor='#CCCCCC' width='30%' align='center' >Palabras Claves</td>
								   </tr>
							");
							while ($row1= $consultal->fetch_assoc()){
							print("<tr>
								<td><p align='justify'><a href='../ver/libro.php?Id=".$row1['Id_Libro']."'>".$row1['Titulo']."</a></p></td>
								<td></td>
								<td align='center'>".$row1['Ano']."</td>
								<td></td>
								<td><p align='justify'>".$row1['Palabras_Claves']."</p></td>
								</tr>
								<tr><td colspan='10' bgcolor='#CCCCCC'>&nbsp;</td></tr>
							");
							
							}
							print("</table><br><br>");
						}
							
					?>
					<h3>Artículo</h3>
					<?php
						$consultaar = $conexion->query("SELECT * FROM articulo WHERE Tipo_Encargado = 'grupos' AND Id_Encargado = '$Id_Grupo'" )or die ("Error 1 ".$mysqli->error);
						$num11 = mysqli_num_rows($consultaar);
						if($num11 == "0"){
						print("No se encuentran registros<br><br>");
						}
						else{
							print("
							<font size='+2'>".$num11." Artículos encontrados</font>
								<table width='100%'>
									<tr>
									<td bgcolor='#CCCCCC' width='30%' align='center'>Título</td>
										<td bgcolor='#CCCCCC' width='5%'></td>
										<td bgcolor='#CCCCCC' width='30%' align='center' >Revista</td>
										<td bgcolor='#CCCCCC' width='5%'></td>
										<td bgcolor='#CCCCCC' width='10%' align='center' >Año</td>
								   </tr>
							");
							while ($row2= $consultaar->fetch_assoc()){
							print("<tr>
								<td><p align='justify'><a href='../ver/articulo.php?Id=".$row2['Id_Articulo']."'>".$row2['Titulo']."</a></p></td>
								<td></td>
								<td><p align='justify'>".$row2['Revista']."</p></td>
								<td></td>
								<td align='center'>".$row2['Ano']."</td>
								</tr>
								<tr><td colspan='10' bgcolor='#CCCCCC'>&nbsp;</td></tr>
							");
							
							}
						print("</table><br><br>");
						}
					?>
					<h3>Ponencia</h3>
					<?php
						$consultap = $conexion->query("SELECT * FROM ponencia WHERE Tipo_Encargado = 'grupos' AND Id_Encargado = '$Id_Grupo'" )or die ("Error 1 ".$mysqli->error);
						$num12 = mysqli_num_rows($consultap);
						if($num12 == "0"){
						print("No se encuentran registros<br><br>");
						}
						else{
							print("
							<font size='+2'>".$num12." Ponencias encontradas</font>
								<table width='100%'>
								<tr>
									<td bgcolor='#CCCCCC' width='30%' align='center'>Título</td>
										<td bgcolor='#CCCCCC' width='5%'></td>
										<td bgcolor='#CCCCCC' width='30%' align='center' >Evento</td>
										<td bgcolor='#CCCCCC' width='5%'></td>
										<td bgcolor='#CCCCCC' width='10%' align='center' >Fecha</td>
								   </tr>
							");
							while ($row3= $consultap->fetch_assoc()){
							print("<tr>
								<td><p align='justify'><a href='../ver/ponencia.php?Id=".$row3['Id_Ponencia']."'>".$row3['Titulo']."</a></p></td>
								<td></td>
								<td><p align='justify'>".$row3['Evento']."</p></td>
								<td></td>
								<td>".$row3['Fecha']."</td>
								</tr>
								<tr><td colspan='10' bgcolor='#CCCCCC'>&nbsp;</td></tr>
							");
							
							}
						print("</table><br><br>");
						}
					?>
					<h3>Capítulo</h3>
					<?php
						$consultacap = $conexion->query("SELECT * FROM capitulo WHERE Tipo_Encargado = 'grupos' AND Id_Encargado = '$Id_Grupo'" )or die ("Error 1 ".$mysqli->error);
						$num13 = mysqli_num_rows($consultacap);
						if($num13 == "0"){
						print("No se encuentran registros");
						}
						else{
							print("
							<font size='+2'>".$num13." Capítulos encontrados</font>
							<table width='100%'>
								<tr>
									<td bgcolor='#CCCCCC' width='30%' align='center'>Título</td>
									<td bgcolor='#CCCCCC' width='5%'></td>
									<td bgcolor='#CCCCCC' width='30%' align='center' >Libro</td>
									<td bgcolor='#CCCCCC' width='5%'></td>
									<td bgcolor='#CCCCCC' width='10%' align='center' >Editorial</td>
							   </tr>
						");
							while ($row4= $consultacap->fetch_assoc()){
							print("<tr>
								<td><p align='justify'><a href='../ver/capitulo.php?Id=".$row4['Id_Capitulo']."'>".$row4['Titulo']."</a></p></td>
								<td></td>
								<td><p align='justify'>".$row4['Libro']."</p></td>
								<td></td>
								<td>".$row4['Editorial']."</td>
								</tr>
								<tr><td colspan='10' bgcolor='#CCCCCC'>&nbsp;</td></tr>
							");
							
							}
						print("</table><br><br>");
						}
					?>
					<h3>Multimedia</h3>
					<?php
						$consultamul = $conexion->query("SELECT * FROM multimedia WHERE Tipo_Encargado = 'grupos' AND Id_Encargado = '$Id_Grupo' " )or die ("Error 1 ".$mysqli->error);
						$num5 = mysqli_num_rows($consultamul);
						if($num5 == "0"){
						print("No se encuentran registros<br><br>");
						}
						else{
							print("
							<font size='+2'>".$num5." Productos multimedia encontrados</font>
							<table width='100%'>
								<tr>
									<td bgcolor='#CCCCCC' width='30%' align='center'>Título</td>
									<td bgcolor='#CCCCCC' width='5%'></td>
									<td bgcolor='#CCCCCC' width='30%' align='center' >Fecha</td>
									<td bgcolor='#CCCCCC' width='5%'></td>
									<td bgcolor='#CCCCCC' width='10%' align='center' >Lugar</td>
							   </tr>
						");
							while ($row5= $consultamul->fetch_assoc()){
							print("<tr>
								<td><p align='justify'><a href='../ver/multimedia.php?Id=".$row5['Id_Multimedia']."'>".$row5['Titulo']."</a></p></td>
								<td></td>
								<td><p align='justify'>".$row5['Fecha_Publicacion']."</p></td>
								<td></td>
								<td>".$row5['Lugar_Publicacion']."</td>
								</tr>
								<tr><td colspan='10' bgcolor='#DDDDDD'>&nbsp;</td></tr>
							");
							}
						print("</table>");
						}
					?>
					
				</div><!-- /.tab-pane -->


				<div class="tab-pane" id="tab_3">
					<h3>Proyectos</h3>
					<?php
						$consultapro = $conexion->query("SELECT * FROM proyectos WHERE Tipo_Encargado = 'grupos' AND Id_Encargado = '$Id_Grupo'" )or die ("Error 1 ".$mysqli->error);
						$num2 = mysqli_num_rows($consultapro);
						if($num2 == "0"){
						print("No se encuentran registros");
						}
						else{
							print("
							<font size='+2'>".$num2." Proyectos encontrados</font>
								<table width='100%'>
									<tr>
										<td bgcolor='#CCCCCC' width='30%'>Nombre</td>
										<td bgcolor='#CCCCCC' width='5%'></td>
										<td bgcolor='#CCCCCC' width='60%'>Descripción</td>
								   </tr>
							");
							while ($row7= $consultapro->fetch_assoc()){
							print("<tr>
								<td><p align='justify'><a href='../ver/proyecto.php?Id=".$row7['Id_Proyecto']."'>".$row7['Nombre']."</a></p></td>
								<td></td>
								<td><p align='justify'>".$row7['Descripcion']."</p></td>
								</tr>
								<tr><td colspan='10' bgcolor='#CCCCCC'>&nbsp;</td></tr>
							");
							
							}
						print("</table>");
						}
					?>
				</div>
				<div class="tab-pane" id="tab_4">
					<h3>Semilleros</h3>
				<?php
					$consultasem = $conexion->query("SELECT * FROM semilleros WHERE Id_Grupo = '$Id_Grupo'" )or die ("Error 1 ".$mysqli->error);
					$num3 = mysqli_num_rows($consultasem);
					if($num3 == "0"){
					print("No se encuentran registros");
					}
					else{
						print("
						<font size='+2'>".$num3." Semilleros encontrados</font>
							<h3>Semilleros</h3>
							<table width='100%'>
								<tr>
									<td bgcolor='#CCCCCC' width='30%'>Nombre</td>
									<td bgcolor='#CCCCCC' width='60%'>Descripción</td>
							   </tr>
						");
						while ($row8= $consultasem->fetch_assoc()){
						print("<tr>
							<td><a href='../ver/semillero.php?Id=".$row8['Id_Semillero']."'>".$row8['Nombres']."</a></td>
							<td>".$row8['Descripcion']."</td>
							<tr><td colspan='10' bgcolor='#CCCCCC'>&nbsp;</td></tr>
							</tr>
						");
						
						}
					print("</table>");
					}
				?>

				</div><!-- /.tab-pane -->
					  
					</div><!-- /.tab-content -->
				  </div><!-- nav-tabs-custom -->

						
						
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