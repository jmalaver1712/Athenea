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
              Revistas
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
              <tr><td rowspan="3" width="30%"><img src="http://biblioteca.uniminuto.edu/ojs/public/journals/9/journalThumbnail_es_ES.jpg" width="60%"></td><td width="70%"><h2>Praxis Pedagógica</h2></td></tr>
                  <tr><td><p>Revista de la Facultad de Educación de la Corporación Universitaría Minuto de Dios</p></td></tr><tr><td><a href="http://biblioteca.uniminuto.edu/ojs/index.php/praxis" class="btn btn-info btn-lg da-link">Ver  Revista</a></td></tr>
                  
                  <tr><td rowspan="3" width="30%"><img src="http://biblioteca.uniminuto.edu/ojs/public/journals/6/journalThumbnail_es_ES.jpg" width="60%"></td><td><h2>Desarrollo & Gestión</h2></td></tr>
                  <tr><td><p>El Objetivo de Desarrollo y Gestión lo constituye ser un canal de divulgación, interacción y reflexión de las funciones sustantivas de docencia, investigación y proyección social; todo esto en relación con las nuevas tendencias y paradigmas de las ciencias empresariales para que transciendan en la formación y el desarrollo de estudiantes, profesores e investigadores de la facultad y otros espacios académicos de la vida nacional e internacional.</p></td></tr><tr><td><a href="http://biblioteca.uniminuto.edu/ojs/index.php/DYG" class="btn btn-info btn-lg da-link">Ver  Revista</a></td></tr>
                  
                  <tr><td rowspan="3" width="30%"><img src="http://biblioteca.uniminuto.edu/ojs/public/journals/5/journalThumbnail_es_ES.jpg" width="60%"></td><td><h2>Mediaciones</h2></td></tr>
                  <tr><td><p>Publicación de difusión científica y académica, de periodicidad semestral, editada por la Facultad de Ciencias de la Comunicación de la Corporación Universitaria Minuto de Dios - UNIMINUTO.</p></td></tr><tr><td><a href="http://biblioteca.uniminuto.edu/ojs/index.php/med" class="btn btn-info btn-lg da-link">Ver  Revista</a></td></tr>
                  
                  <tr><td rowspan="3" width="30%"><img src="http://biblioteca.uniminuto.edu/ojs/public/journals/4/journalThumbnail_es_ES.jpg" width="60%"></td><td><h2>Polisemia</h2></td></tr>
                  <tr><td><p>Revista de la Facultad de Ciencias Humanas y Sociales y el Centro de Invetigación Humano y Social CEIHS.</p></td></tr><tr><td><a href="http://biblioteca.uniminuto.edu/ojs/index.php/POLI" class="btn btn-info btn-lg da-link">Ver  Revista</a></td></tr>
                  
                  <tr><td rowspan="3" width="30%"><img src="http://biblioteca.uniminuto.edu/ojs/public/journals/2/homepageImage_es_ES.png" width="60%"></td><td><h2>Iventum</h2></td></tr>
                  <tr><td><p>Publicación semestral de los resultados de investigación de la Facultad de Ingeniería..</p></td></tr><tr><td><a href="http://biblioteca.uniminuto.edu/ojs/index.php/Inventum" class="btn btn-info btn-lg da-link">Ver  Revista</a></td></tr>
                  
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
