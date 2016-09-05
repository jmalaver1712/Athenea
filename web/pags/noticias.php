<!DOCTYPE html>
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

    <!--breadcrumbs start-->
    <div class="breadcrumbs">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-sm-4">
            <h1>
             Noticias
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
            <table width='100%'>
            <?php
              $consulta = $conexion->query("SELECT * FROM noticias ORDER BY Fecha_cadu DESC LIMIT 6")or die ("Error 1 ".$mysqli->error);
              $registros = mysqli_num_rows($consulta);
                while ($row = $consulta->fetch_assoc()){
                    print("
                        
                            <tr>
                                <td rowspan='3' width='40%'><img width='80%' src='../../athenea/documentos/noticias/".$row['Imagen']."'></td>
                                <td><h2>".$row['Titulo']."</h2></td>
                            </tr>
                            <tr>
                                <td><p class='text-justify'>".$row['Resumen']."</p></td>
                            </tr>
                            <tr>
                                <td><center><a href='../pags/ver_noticia.php?Id=".$row['Id_noticia']."' class='btn btn-info btn-lg da-link'>Ver más</a></center></td>
                            </tr>
                        
                    ");
                }
            ?>
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
