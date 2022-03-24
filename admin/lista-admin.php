<?php 
include_once 'funciones/sesion.php';
include_once 'funciones/funciones.php';
include_once 'templates/header.php'; ?>


<body class="hold-transition skin-blue fixed sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
    <?php include_once 'templates/barra.php'; ?>
    <?php include_once 'templates/navegacion.php'; ?>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Administradores
        <small>Maneja los accesos al sitio aquí</small>
      </h1>

      
    </section>

    <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Listado de Todos los Administradores</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">

            <a href="nuevo-admin.php" class="btn btn-success">Añadir Nuevo</a>
            <table id="registros" class="table table-bordered table-hover">
                <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Acciones</th>
                        </tr>
                </thead>
                <tbody>

                <?php
                    try {

                        $sql = "SELECT ID_admin, usuario FROM `admins` ";
                        $resultado = $conn->query($sql);
                    } catch (Exception $e) {
                        $error = $e->getMessage();
                    } ?>

                    
                        <?php while($admin = $resultado->fetch_assoc() ) { ?>
                            <tr>
                                <td><?php echo $admin['usuario']; ?></td>

                                <td>
                                        <a href="editar-admin.php?id=<?php echo $admin['ID_admin']; ?>" type="button" class="btn bg-orange btn-flat margin"> <i class="fa fa-pencil" aria-hidden="true"></i></a>
                                        <a href="#" data-id="<?php echo $admin['ID_admin']; ?>" data-tipo="admin" type="button" class="btn bg-maroon btn-flat margin borrar_registro"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                   

                </tbody>
                <tfoot>
                        <tr>
                            <th>Nombre</th>
                            <th>Acciones</th>
                        </tr>
                </tfoot>
            </table>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


<?php 
  $conn->close();
  include_once 'templates/footer.php';
  include_once 'templates/footer-scripts.php';


?>
