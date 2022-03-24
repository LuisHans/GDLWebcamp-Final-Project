<?php $template = obtener_template(); ?>
  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Buscar...">
              <span class="input-group-btn">
                  <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                  </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
            <li class="header">Menú de Administración</li>
        
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="dashboard.php"><i class="fa fa-circle-o"></i> Dashboard</a></li>
                </ul>
            </li>

            <?php $paginas = array('nuevo-evento', 'lista-eventos', 'editar-evento'); ?>
            <li class="treeview <?php echo (in_array($template, $paginas) ) ? 'active' : '' ?> ">
                <a href="#">
                    <i class="fa fa-files-o"></i> <span>Eventos </span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php echo ($template =='lista-eventos' ) ? 'active' : '' ?>">
                        <a href="lista-eventos.php"><i class="fa fa-list" aria-hidden="true"></i> Ver Todos</a>
                    </li>
                    <li class="<?php echo ($template =='nuevo-evento' ) ? 'active' : '' ?>">
                        <a href="nuevo-evento.php"><i class="fa fa-plus" aria-hidden="true"></i> Agregar</a>
                    </li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-files-o"></i> <span>Categorias Eventos </span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="lista-categorias.php"><i class="fa fa-list" aria-hidden="true"></i> Ver Todos</a></li>
                    <li><a href="nuevo-categoria.php"><i class="fa fa-plus" aria-hidden="true"></i> Agregar</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user"></i> <span>Invitados </span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="lista-invitados.php"><i class="fa fa-list" aria-hidden="true"></i> Ver Todos</a></li>
                    <li><a href="nuevo-invitado.php"><i class="fa fa-plus" aria-hidden="true"></i> Agregar</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-address-card"></i> <span>Registrados </span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="lista-registrados.php"><i class="fa fa-list" aria-hidden="true"></i> Ver Todos</a></li>
                    <li><a href="nuevo-registrado.php"><i class="fa fa-plus" aria-hidden="true"></i> Agregar</a></li>
                </ul>
            </li>

            <?php if($_SESSION['nivel'] == 1): ?>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-address-book"></i> <span>Administradores </span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="lista-admin.php"><i class="fa fa-list" aria-hidden="true"></i> Ver Todos</a></li>
                        <li><a href="nuevo-admin.php"><i class="fa fa-plus" aria-hidden="true"></i> Agregar</a></li>
                    </ul>
                </li>
            <?php endif; ?>
           
        <!-- <li class="header">LABELS</li> -->
        </ul>
    </section>
    <!-- /.sidebar -->
  </aside>