<!DOCTYPE html>
<?php
	$Id = $_GET['Id'];
?>
<html lang="en">
   <?php
    require_once ('../principal/head.php');
    ?>

  <body>
    <!--header start-->
    <?php
        require_once('../principal/header.php');
      ?>
    <!--header end-->
    <?php
        $query = $conexion->query("SELECT * FROM noticias WHERE Id_noticia = '$Id' ")or die ("Error 1 ".$mysqli->error);
        $row= $query->fetch_assoc();
    ?>
    <!--breadcrumbs start-->
    <div class="breadcrumbs">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-sm-4">
            <h1>
              <a href="javascript:history.back(1)">< </a> Noticias
            </h1>
          </div>
          
        </div>
      </div>
    </div>
    <!--breadcrumbs end-->
      
    <!--container start-->
    <div class="container">
      <div class="row">
        <!--blog start-->
        <div class="col-lg-9 ">
          <div class="blog-item">
            
           <table width="100%">
            <tr>
               <td><h2><?php echo $row['Titulo']?></h2></td>
               </tr>
               <tr>
               <td align="center"><img width="60%" src="../../athenea/documentos/noticias/<?php echo $row['Imagen']?>" width="100%"></td>
               </tr>
               <tr>
								<td>
									<font size="+1"><?php echo $row['Resumen']?></font>
								</td>
							</tr>
							<tr>
								<td align="justify">
									<font size="+1"><?php
										//Lineas
										$Lineas = $row['Noticia'];
										$Linea = explode('%%',$Lineas);
										$num = count($Linea);
										for ($j=0;$j<$num;$j++){
											echo $Linea[$j]."</font><br><br>";
										}?>
								</td>
							</tr>
							<tr>
								<td>
									<center>
										<font size="+1">
										   <?php 
												$a = $row['URL'];
												if($a!=' '){
													echo "<a target='_blank' href='".$row['URL']."'>Mayor información clic aquí</a>";
												}
												else echo "";
										   ?>
										</font>
									</center>
								</td>
							</tr>
           </table>
              
          </div>
          
          

          

        </div>

        <div class="col-lg-3">
          <div class="blog-side-item">
            <div class="search-row">
              <input type="text" class="form-control" placeholder="Buscar aquí">
            </div>

              <?php require_once('../principal/sede.php'); ?>
              
            <?php require_once('../principal/etiquetas.php'); ?>
          </div>
        </div>

        <!--blog end-->
      </div>

    </div>
    <!--container end-->

    <!--footer start-->
    
    <!-- footer end -->
     <?php require_once('../principal/footer.php'); ?>

    <!--small footer end-->

    <!-- js placed at the end of the document so the pages load faster -->
    <?php 
        require_once('../principal/footerscript.php');
?>

  </body>
</html>
