<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p><?php echo $Acc_Nombre; ?></p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form (Optional) -->
        <form action="../pags/buscar.php" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="buscar" class="form-control" placeholder="Buscar..."/>
                <span class="input-group-btn">
                    <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                </span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            
			<!-- UNIMINUTO -->
			<li class="treeview" id="UNIMINUTO" style="display:none;">
                <a href="#"><i class='fa fa-link'></i> <span>UNIMINUTO</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li class="treeview">
                        <a href="#"><i class='fa fa-link'></i> <span>Investigadores</span> <i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="../pags/investigadores.php?Sede=">Investigadores</a></li>
                            <li><a href="../pags/estudiantes.php?Sede=">Estudiantes</a></li>
                        </ul>
                    </li>
                    <li class="treeview"><a href="../pags/proyecto.php?Sede="><i class='fa fa-link'></i> <span>Proyectos</span></a></li>
                    <li class="treeview"><a href="../pags/grupo.php?Sede="><i class='fa fa-link'></i> <span>Grupos</span></a></li>
                    <li class="treeview"><a href="../pags/semilleros.php?Sede="><i class='fa fa-link'></i> <span>Semilleros</span></a></li>
                    <li class="treeview"><a href="../pags/redes.php?Sede="><i class='fa fa-link'></i> <span>Redes</span></a></li>
                    <li class="treeview">
                        <a href="#"><i class='fa fa-link'></i> <span>Productos</span> <i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="../pags/libros.php?Sede=">Libros</a></li>
                            <li><a href="../pags/articulos.php?Sede=">Artículos</a></li>
                            <li><a href="../pags/ponencias.php?Sede=">Ponencias</a></li>
							<li><a href="../pags/capitulos.php?Sede=">Capítulos</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
			
			<li class="header">Convocatorias y Noticias</li>
			
			<li class="treeview">
                <a href="#"><i class='fa fa-link'></i> <span>Convocatorias</span> <i class="fa fa-angle-left pull-right"></i></a>
					<ul class="treeview-menu">
						<li><a href="../pags/convocatoria_interna.php">Internas</a></li>
						<li><a href="../pags/convocatoria_externa.php">Externas</a></li>
					</ul>
            </li>
			<li class="treeview">
                <a href="../pags/noticias.php"><i class='fa fa-link'></i> <span>Noticias</span></a>
            </li>
			
			
			<li class="header">Sedes</li>
			
            <!--Bello-->
            <li class="treeview" id="Bello" style="display:none;">
                <a href="#"><i class='fa fa-link'></i> <span>Bello</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li class="treeview">
                        <a href="#"><i class='fa fa-link'></i> <span>Investigadores</span> <i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="../pags/investigadores.php?Sede=Bello">Investigadores</a></li>
                            <li><a href="../pags/estudiantes.php?Sede=Bello">Estudiantes</a></li>
                        </ul>
                    </li>
                    <li class="treeview"><a href="../pags/proyecto.php?Sede=Bello"><i class='fa fa-link'></i> <span>Proyectos</span></a></li>
                    <li class="treeview"><a href="../pags/grupo.php?Sede=Bello"><i class='fa fa-link'></i> <span>Grupos</span></a></li>
                    <li class="treeview"><a href="../pags/semilleros.php?Sede=Bello"><i class='fa fa-link'></i> <span>Semilleros</span></a></li>
                    <li class="treeview"><a href="../pags/redes.php?Sede=Bello"><i class='fa fa-link'></i> <span>Redes</span></a></li>
                    <li class="treeview">
                        <a href="#"><i class='fa fa-link'></i> <span>Productos</span> <i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="../pags/libros.php?Sede=Bello">Libros</a></li>
                            <li><a href="../pags/articulos.php?Sede=Bello">Artículos</a></li>
                            <li><a href="../pags/ponencias.php?Sede=Bello">Ponencias</a></li>
							<li><a href="../pags/capitulos.php?Sede=Bello">Capítulos</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
			
            <!--Bogotá Sur-->
            <li class="treeview" Id="Bogota_Sur" style="display:none;">
                <a href="#"><i class='fa fa-link'></i> <span>Bogotá Sur</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li class="treeview">
                        <a href="#"><i class='fa fa-link'></i> <span>Investigadores</span> <i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="../pags/investigadores.php?Sede=Bogota_Sur">Investigadores</a></li>
                            <li><a href="../pags/estudiantes.php?Sede=Bogota_Sur">Estudiantes</a></li>
                        </ul>
                    </li>
                    <li class="treeview"><a href="../pags/proyecto.php?Sede=Bogota_Sur"><i class='fa fa-link'></i> <span>Proyectos</span></a></li>
                    <li class="treeview"><a href="../pags/grupo.php?Sede=Bogota_Sur"><i class='fa fa-link'></i> <span>Grupos</span></a></li>
                    <li class="treeview"><a href="../pags/semilleros.php?Sede=Bogota_Sur"><i class='fa fa-link'></i> <span>Semilleros</span></a></li>
                    <li class="treeview"><a href="../pags/redes.php?Sede=Bogota_Sur"><i class='fa fa-link'></i> <span>Redes</span></a></li>
                    <li class="treeview">
                        <a href="#"><i class='fa fa-link'></i> <span>Productos</span> <i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="../pags/libros.php?Sede=Bogota_Sur">Libros</a></li>
                            <li><a href="../pags/articulos.php?Sede=Bogota_Sur">Artículos</a></li>
                            <li><a href="../pags/ponencias.php?Sede=Bogota_Sur">Ponencias</a></li>
							<li><a href="../pags/capitulos.php?Sede=Bogota_Sur">Capítulos</a></li>
                        </ul>
                    </li>
                    </ul>
                </li>
            <!--Cundinamarca-->
			
            <li class="treeview" Id="Cundinamarca" style="display:none;">
                <a href="#"><i class='fa fa-link'></i> <span>Cundinamarca</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li class="treeview">
                        <a href="#"><i class='fa fa-link'></i> <span>Investigadores</span> <i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="../pags/investigadores.php?Sede=Cundinamarca">Investigadores</a></li>
                            <li><a href="../pags/estudiantes.php?Sede=Cundinamarca">Estudiantes</a></li>
                        </ul>
                    </li>
                    <li class="treeview"><a href="../pags/proyecto.php?Sede=Cundinamarca"><i class='fa fa-link'></i> <span>Proyectos</span></a></li>
                    <li class="treeview"><a href="../pags/grupo.php?Sede=Cundinamarca"><i class='fa fa-link'></i> <span>Grupos</span></a></li>
                    <li class="treeview"><a href="../pags/semilleros.php?Sede=Cundinamarca"><i class='fa fa-link'></i> <span>Semilleros</span></a></li>
                    <li class="treeview"><a href="../pags/redes.php?Sede=Cundinamarca"><i class='fa fa-link'></i> <span>Redes</span></a></li>
                    <li class="treeview">
                        <a href="#"><i class='fa fa-link'></i> <span>Productos</span> <i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="../pags/libros.php?Sede=Cundinamarca">Libros</a></li>
                            <li><a href="../pags/articulos.php?Sede=Cundinamarca">Artículos</a></li>
                            <li><a href="../pags/ponencias.php?Sede=Cundinamarca">Ponencias</a></li>
							<li><a href="../pags/capitulos.php?Sede=Cundinamarca">Capítulos</a></li>
                        </ul>
                    </li>
                    </ul>
                </li>
            <!-- Sede Principal -->
			
            <li class="treeview" Id="Sede_Principal" style="display:none;">
                <a href="#"><i class='fa fa-link'></i> <span>Sede Principal</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li class="treeview">
                        <a href="#"><i class='fa fa-link'></i> <span>Investigadores</span> <i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="../pags/investigadores.php?Sede=Sede_Principal">Investigadores</a></li>
                            <li><a href="../pags/estudiantes.php?Sede=Sede_Principal">Estudiantes</a></li>
                        </ul>
                    </li>
                    <li class="treeview"><a href="../pags/proyecto.php?Sede=Sede_Principal"><i class='fa fa-link'></i> <span>Proyectos</span></a></li>
                    <li class="treeview"><a href="../pags/grupo.php?Sede=Sede_Principal"><i class='fa fa-link'></i> <span>Grupos</span></a></li>
                    <li class="treeview"><a href="../pags/semilleros.php?Sede=Sede_Principal"><i class='fa fa-link'></i> <span>Semilleros</span></a></li>
                    <li class="treeview"><a href="../pags/redes.php?Sede=Sede_Principal"><i class='fa fa-link'></i> <span>Redes</span></a></li>
                    <li class="treeview">
                        <a href="#"><i class='fa fa-link'></i> <span>Productos</span> <i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="../pags/libros.php?Sede=Sede_Principal">Libros</a></li>
                            <li><a href="../pags/articulos.php?Sede=Sede_Principal">Artículos</a></li>
                            <li><a href="../pags/ponencias.php?Sede=Sede_Principal">Ponencias</a></li>
							<li><a href="../pags/capitulos.php?Sede=Sede_Principal">Capítulos</a></li>
                        </ul>
                    </li>
                    </ul>
                </li>
                
            <!--UVD-->
                <li class="treeview" Id="UVD" style="display:none;">
                <a href="#"><i class='fa fa-link'></i> <span>UVD</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li class="treeview">
                        <a href="#"><i class='fa fa-link'></i> <span>Investigadores</span> <i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="../pags/investigadores.php?Sede=UVD">Investigadores</a></li>
                            <li><a href="../pags/estudiantes.php?Sede=UVD">Estudiantes</a></li>
                        </ul>
                    </li>
                    <li class="treeview"><a href="../pags/proyecto.php?Sede=UVD"><i class='fa fa-link'></i> <span>Proyectos</span></a></li>
                    <li class="treeview"><a href="../pags/grupo.php?Sede=UVD"><i class='fa fa-link'></i> <span>Grupos</span></a></li>
                    <li class="treeview"><a href="../pags/semilleros.php?Sede=UVD"><i class='fa fa-link'></i> <span>Semilleros</span></a></li>
                    <li class="treeview"><a href="../pags/redes.php?Sede=UVD"><i class='fa fa-link'></i> <span>Redes</span></a></li>
                    <li class="treeview">
                        <a href="#"><i class='fa fa-link'></i> <span>Productos</span> <i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="../pags/libros.php?Sede=UVD">Libros</a></li>
                            <li><a href="../pags/articulos.php?Sede=UVD">Artículos</a></li>
                            <li><a href="../pags/ponencias.php?Sede=UVD">Ponencias</a></li>
							<li><a href="../pags/capitulos.php?Sede=UVD">Capítulos</a></li>
                        </ul>
                    </li>
                    </ul>
                </li>

            <!--Valle-->
            <li class="treeview" Id="Valle" style="display:none;">
                <a href="#"><i class='fa fa-link'></i> <span>Valle</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li class="treeview">
                        <a href="#"><i class='fa fa-link'></i> <span>Investigadores</span> <i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="../pags/investigadores.php?Sede=Valle">Investigadores</a></li>
                            <li><a href="../pags/estudiantes.php?Sede=Valle">Estudiantes</a></li>
                        </ul>
                    </li>
                    <li class="treeview"><a href="../pags/proyecto.php?Sede=Valle"><i class='fa fa-link'></i> <span>Proyectos</span></a></li>
                    <li class="treeview"><a href="../pags/grupo.php?Sede=Valle"><i class='fa fa-link'></i> <span>Grupos</span></a></li>
                    <li class="treeview"><a href="../pags/semilleros.php?Sede=Valle"><i class='fa fa-link'></i> <span>Semilleros</span></a></li>
                    <li class="treeview"><a href="../pags/redes.php?Sede=Valle"><i class='fa fa-link'></i> <span>Redes</span></a></li>
                    <li class="treeview">
                        <a href="#"><i class='fa fa-link'></i> <span>Productos</span> <i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="../pags/libros.php?Sede=Valle">Libros</a></li>
                            <li><a href="../pags/articulos.php?Sede=Valle">Artículos</a></li>
                            <li><a href="../pags/ponencias.php?Sede=Valle">Ponencias</a></li>
							<li><a href="../pags/capitulos.php?Sede=Valle">Capítulos</a></li>
                        </ul>
                    </li>
                    </ul>
                </li>
				
				
        </ul><!-- /.sidebar-menu -->
    </section>
<!-- /.sidebar -->
</aside>

<input type="hidden" id="Rect" value="<?php echo $Acc_Rect; ?>">
<script>
var Rect = document.getElementById("Rect").value;
if (Rect == ""){
document.getElementById("UNIMINUTO").style.display = "block";
document.getElementById("Bello").style.display = "block";
document.getElementById("Bogota_Sur").style.display = "block";
document.getElementById("Cundinamarca").style.display = "block";
document.getElementById("Valle").style.display = "block";
document.getElementById("Sede_Principal").style.display = "block";
document.getElementById("UVD").style.display = "block";
}
document.getElementById(Rect).style.display = "block";
</script>