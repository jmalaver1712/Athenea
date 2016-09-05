<?php require_once('../admin/locked.php'); ?>

<?php
$Id_Articulo = validar_id($_GET['Id']);
$consulta = $conexion->query("SELECT * FROM articulo WHERE Id_Articulo = '$Id_Articulo' " )or die ("Error 1 ".$mysqli->error);
$row= $consulta->fetch_assoc();
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
		  Artículo
          </h1>	
        </section>

        <!-- Main content -->
		
		<section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-body">
				
				<ul class="nav nav-tabs">
				<li class="pull-right"><a onclick="return confirmDelete(this);" <?php echo "href='../eliminar/eliminar.php?Id=".$row['Id_Articulo']."&Tabla=articulo&Campo=Id_Articulo'"; ?> class="text-muted"><i class="fa fa-close"></i></a></li>
				<li class="pull-right"><a <?php echo "href='../edit/articulo.php?Id=".$row['Id_Articulo']."'" ?> class="text-muted"><i class="fa fa-edit"></i></a></li>
				</ul><br>
				
					<table border="0" width="80%">
					<tr>
					<td width="25%"><label>Titulo de Artículo:</label></td>
					<td><?php echo $row['Titulo']; ?></td>
					</tr>
					<tr>
					<td><label>Vinculado a:</label></td>
					<td><?php echo $row['Tipo_Encargado']; ?></td>
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
					<td><label>Autor(es):</label></td>
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
						<td><label>Revisa:</label></td>
						<td><?php echo $row['Revista']; ?></td>
					</tr>
					<tr>
						<td><label>ISSN:</label></td>
						<td><?php echo $row['ISSN']; ?></td>
					</tr>
					<tr>
						<td><label>Año:</label></td>
						<td><?php echo $row['Ano']; ?></td>
					</tr>
					<tr>
						<td><label>Volumen:</label></td>
						<td><?php echo $row['Volumen']; ?></td>
					</tr>
					<tr>
						<td><label>Fascículo:</label></td>
						<td><?php echo $row['Fasciculo']; ?></td>
					</tr>
					<tr>
						<td><label>Páginas:</label></td>
						<td><?php echo $row['Pags']; ?></td>
					</tr>
					<tr>
						<td><label>Indexación:</label></td>
						<td><?php echo $row['Indexacion']; ?></td>
					</tr>
					
					<tr>
						<td><label>Palabras Clave</label></td>
						<td><p style="text-align:justify"><?php echo $row['Palabras_Clave']; ?></p></td>
					</tr>
					
					<tr>
						<td>Detalles de Indexación</td>
						<td><?php echo $row['Detalles']; ?></td>
					</tr>
					<tr>
						<td><label>Ciudad:</label></td>
						<td><?php echo $row['Ciudad']; ?></td>
					</tr>
					<tr>
						<td><label>País:</label></td>
						<td><?php echo $row['Pais']; ?></td>
					</tr>
					
					<tr>
						<td><label>Par Evaluador:</label></td>
						<td><?php echo $row['Par']; ?></td>
					</tr>
					
					<tr>
						<td><label>Documento:</td>
						<td><a href="<?php
						$Tipo_Doc = $row['Tipo_Doc'];
						if ($Tipo_Doc == "Documento"){
						echo "../documentos/articulo/".$row['URL'];
						}
						else{
						echo $row['URL'];
						}
						?>" target="_blank">Ver documento</a>
					</tr>
					<tr>
					<td><label>Observaciones</label></td>
					<td><p style="text-align:justify"><?php echo $row['Observaciones'] ?></p></td>
					</tr>
					
					<tr>
					<td colspan="2" align="right"><?php echo "<font size='-1'>".$row['Ult_Registro']."</font>"; ?></td>
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