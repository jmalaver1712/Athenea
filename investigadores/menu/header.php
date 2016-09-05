<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="../../athenea/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p><?php echo $Acc_Nombre; ?></p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            
			<!-- UNIMINUTO -->
            <li class="treeview">
                <a href="../pags/investigador.php?Doc=<?php echo $Acc_Pass; ?>"><i class='fa fa-link'></i> <span>Investigador</span> <i class="fa pull-right"></i></a>
            </li>
			<li class="treeview">
                <a href="#"><i class='fa fa-link'></i> <span>Investigación</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li class="treeview"><a href="../pags/proyecto.php?Doc=<?php echo $Acc_Pass; ?>"><i class='fa fa-link'></i> <span>Proyectos</span></a></li>
                    <li class="treeview"><a href="../pags/grupo.php?Doc=<?php echo $Acc_Pass; ?>"><i class='fa fa-link'></i> <span>Grupos</span></a></li>
                    <li class="treeview"><a href="../pags/semilleros.php?Doc=<?php echo $Acc_Pass; ?>"><i class='fa fa-link'></i> <span>Semilleros</span></a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class='fa fa-link'></i> <span>Productos</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                            <li><a href="../pags/libros.php?Doc=<?php echo $Acc_Pass; ?>">Libros</a></li>
                            <li><a href="../pags/articulos.php?Doc=<?php echo $Acc_Pass; ?>">Artículos</a></li>
                            <li><a href="../pags/ponencias.php?Doc=<?php echo $Acc_Pass; ?>">Ponencias</a></li>
							<li><a href="../pags/capitulos.php?Doc=<?php echo $Acc_Pass; ?>">Capítulos</a></li>
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