<?php require_once('../admin/locked.php'); ?>

<?php
$Id_Proyecto = $_GET['Id'];
$inv = $conexion->query("SELECT * FROM proyectos WHERE Id_Proyecto = '$Id_Proyecto' ")or die ("Error 1 ".$mysqli->error);
$row = $inv->fetch_assoc();
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
		  Proyecto
          </h1>
        </section>

        <!-- Main content -->
		
		<section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
			  
                <div class="box-body">
				
					<ul class="nav nav-tabs">
					<li class="pull-right"><a onclick="return confirmDelete(this);" <?php echo "href='../eliminar/eliminar.php?Id=".$row['Id_Proyecto']."&Tabla=proyectos&Campo=Id_Proyecto'"; ?> class="text-muted"><i class="fa fa-close"></i></a></li>
					<li class="pull-right"><a <?php echo "href='../edit/proyecto.php?Id_Proyecto=".$row['Id_Proyecto']."'" ?> class="text-muted"><i class="fa fa-edit"></i></a></li>
					</ul><br>
					
					<table border="0">
					<tr>
					<td width="20%"><label>Nombre del Proyecto:</label></td>
					<td><?php echo $row['Nombre']; ?></td>
					</tr>

					<tr>
					<td><label>Codigo del Proyecto</label></td>
					<td><?php echo $row['Codigo_Proyecto']; ?></td>
					</tr>

					<tr>
					<td><label>Lider del Proyecto:</label></td>
					<td><?php 
					$Id_Lider = $row['Id_Investigador']; 
					$lider = $conexion->query("SELECT * FROM investigadores WHERE Id_Investigador = '$Id_Lider' ")or die ("Error 1 ".$mysqli->error);
					$con= $lider->fetch_assoc();
					$Id_Lider = $con['Id_Investigador'];
					print("<a href='../ver/investigador.php?Id=$Id_Lider'>".$con['Nombres']."</a>");
					?></td>
					</tr>

					<tr>
					<td><label>horas dedicadas al Proyecto:</label></td>
					<td><?php echo $row['Horas']; ?></td>
					</tr>

					<tr>
					<td><label>Integrantes:</label></td>
					<td>
					<?php
					//Integrantes
					$Id_Investigadores = $row['Id_Investigadores'];
					$Investigadores = explode('-',$Id_Investigadores);
					$num = count($Investigadores);
					for ($i=1;$i<$num;$i++){
					$Id = $Investigadores[$i];
					$query = $conexion->query("SELECT * FROM investigadores WHERE Id_Investigador = '$Id' ")or die ("Error 1 ".$mysqli->error);
					$inte = $query->fetch_assoc();
					print("<a href='../ver/investigador.php?Id=$Id'>".$inte['Nombres']."</a><br>");
					}
					?>
					</td>
					</tr>

					<tr>
					<td><label>Descripción del Proyecto:</label></td>
					<td><p style="text-align:justify"><?php echo $row['Descripcion']; ?></p></td>
					</tr>

					<tr>
					<td><label>Sede:</label></td>
					<td><?php echo $row['Sede']; ?></td>
					</tr>

					<tr>
					<td><label>Facultad:</label></td>
					<td><?php echo $row['Facultad']; ?></td>
					</tr> 

					<tr>
					<td><label>Programa:</label></td>
					<td><?php echo $row['Programa']; ?></td>
					</tr>

					<tr>
					<td><label>Fecha de Inicio:</label></td>
					<td><?php echo $row['Fecha_Inicio']; ?></td>
					</tr>

					<tr>
					<td><label>Fecha Final:</label></td>
					<td><?php echo $row['Fecha_Fin']; ?></td>
					</tr>

					<tr>
					<td><label>Nombre del Grupo o Semillero:</label></td>
					<td>
					<?php 
					$Id_Encargado = $row['Id_Encargado'];
					$Tipo_Encargado = $row['Tipo_Encargado'];
					$Tipo_Enl = "";
					$Campo = "";
					if($Tipo_Encargado != ""){
					if($Tipo_Encargado == "investigadores"){$Campo = "Id_Investigador"; $Tipo_Enl = "investigador";}
					if($Tipo_Encargado == "grupos"){$Campo = "Id_Grupo"; $Tipo_Enl = "grupo";}
					if($Tipo_Encargado == "semilleros"){$Campo = "Id_Semillero"; $Tipo_Enl = "semillero";}

					$query2= $conexion->query("SELECT * FROM $Tipo_Encargado WHERE $Campo = '$Id_Encargado'")or die ("Error 1 ".$mysqli->error);
					$row2= $query2->fetch_assoc();
					print("<a href='../ver/".$Tipo_Enl.".php?Id=$Id_Encargado'>".$row2['Nombres']."</a>");
					}
					?>
					<br><br>
					</td>
					</tr>

					<tr>
					<td><label>Costo del Proyecto:</label></td>
					<td><?php $Costo = $row['Costo_Proyecto'];
					echo $Costo;
					?></td>
					</tr>

					<tr>
					<td><label>Financiación interna :</label></td>
					<td><?php
					$FinInt = $row['Fin_Interna'];
					$PorInt = ($FinInt * 100)/$Costo; 
					echo $FinInt." - ".$PorInt ."%";
					?></td>
					</tr>

					<tr><td colspan="10"><br></td></tr>

					<tr>
					<td><label>Financiación Externa:</label></td>
					<td><?php 
					$FinExt = $row['Fin_Externa'];
					$PorExt = ($FinExt * 100)/$Costo; 
					echo "Cantidad Financiada: $".$FinExt." - ".$PorExt ."%<br>";
					echo "Convenio:  ".$row['Convenio']."<br>";
					echo "Especificaciones del Convenio:  ".$row['Convenio_Esp']."<br><br>";
					?>
					</td>
					</tr>

					<tr>
					<td><label>Convenio o Contrato</label></td>
					<td>
					<input type="hidden" name="Old_doc1" value="<?php echo $row['Doc1']; ?>">
					<a target="_blank" href=<?php echo "../documentos/proyectos/".$row['Doc1']; ?>>Ver Convenio o Contrato</a>
					</td>
					</tr>

					<tr>
					<td><label>Acta de inicio</label></td>
					<td>
					<input type="hidden" name="Old_doc2" value="<?php echo $row['Doc2']; ?>">
					<a target="_blank" href=<?php echo "../documentos/proyectos/".$row['Doc2']; ?>>Ver Acta de inicio</a>
					</td>
					</tr>

					<tr>
					<td><label>Acta de finalización</label></td>
					<td>
					<input type="hidden" name="Old_doc3" value="<?php echo $row['Doc3']; ?>">
					<a target="_blank" href=<?php echo "../documentos/proyectos/".$row['Doc3']; ?>>Ver Acta de finalización</a>
					</td>
					</tr>

					<tr>
					<td><label>Observaciones:</label></td>
					<td><?php echo $row['Observaciones']; ?></td>
					</tr>


					<tr>
					<td><label>Documento:</td>

					<td><a href="<?php
					$Tipo_Doc = $row['Tipo_Doc'];
					if ($Tipo_Doc == "Documento"){
					echo "../documentos/proyectos/".$row['URL'];
					}
					else{
					echo $row['URL'];
					}
					?>" target="_blank">Ver Proyecto</a>
					</tr>

					<tr>
					<td colspan="2" align="right"><?php echo "<font size='-1'>".$row1['Ult_Registro']."</font>"; ?></td>
					</tr>

					</table>
					
					
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