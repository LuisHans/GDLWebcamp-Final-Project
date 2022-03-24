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
        invitados
        <small>Administra los invitados desde esta página</small>
      </h1>

      
    </section>

    <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Listado de Todos los Invitados</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">

            <a href="nuevo-invitado.php" class="btn btn-success">Añadir Nuevo</a>
            <table id="registros" class="table table-bordered table-hover">
                <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Imagen</th>
                            <th>Acciones</th>
                        </tr>
                </thead>
                <tbody>

                <?php
                  try {
                    $sql = "SELECT * FROM invitados ";
                    $resultado = $conn->query($sql);
                  } catch (Exception $e) {
                    $error = $e->getMessage();
                  }

                  while($invitado = $resultado->fetch_assoc() ) {  ?>
                      <tr>
                              <td><?php echo $invitado['nombre_invitado'] . " " . $invitado['apellido_invitado']; ?></td>
                              <td><p><?php echo $invitado['descripcion']; ?></p></td>
                              <td><?php echo $invitado['url_imagen']; ?></td>
                              <td>
                                  <a href="editar-invitado.php?id=<?php echo $invitado['invitado_id']; ?>" type="button" class="btn bg-orange btn-flat margin"> <i class="fa fa-pencil" aria-hidden="true"></i></a>
                                  <a href="#" data-id="<?php echo $invitado['invitado_id']; ?>" data-tipo="invitado" type="button" class="btn bg-maroon btn-flat margin borrar_registro"><i class="fa fa-trash" aria-hidden="true"></i></a>
                             </td>
                      </tr>  
                  <?php } ?>
                  
                </tbody>
                <tfoot>
                    <tr>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Imagen</th>
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
