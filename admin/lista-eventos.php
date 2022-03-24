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
        Eventos
        <small>Administra los eventos desde esta página</small>
      </h1>

      
    </section>

    <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Listado de Todos los Eventos</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">

            <a href="nuevo-evento.php" class="btn btn-success">Añadir Nuevo</a>
            <table id="registros" class="table table-bordered table-hover">
                <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Fecha y Hora</th>
                            <th>Categoria</th>
                            <th>Invitado</th>
                            <th>Acciones</th>
                        </tr>
                </thead>
                <tbody>

                <?php
                  try {

                    $sql = "SELECT `evento_id`, `nombre_evento`, `fecha_evento`, `hora_evento` , `cat_evento`, `nombre_invitado`, `apellido_invitado` ";
                    $sql .= "FROM `eventos` ";
                    $sql .= "INNER JOIN `categoria_evento` ";
                    $sql .= "ON eventos.id_cat_evento=categoria_evento.id_categoria ";
                    $sql .= "INNER JOIN `invitados` ";
                    $sql .= "ON eventos.id_inv=invitados.invitado_id ";
                    $sql .= "ORDER BY `evento_id` ";
                    $resultado = $conn->query($sql);
                  } catch (Exception $e) {
                    $error = $e->getMessage();
                  }

                  while($eventos = $resultado->fetch_assoc() ) {  ?>
                      <tr>
                              <td><?php echo $eventos['nombre_evento']; ?></td>
                              <td><?php echo $eventos['fecha_evento'] ." ". $eventos['hora_evento'];  ?></td>
                              <td><?php echo $eventos['cat_evento'] ?></td>
                              <td><?php echo $eventos['nombre_invitado'] . " " . $eventos['apellido_invitado']; ?></td>
                              <td>
                                  <a href="editar-evento.php?id=<?php echo $eventos['evento_id']; ?>" type="button" class="btn bg-orange btn-flat margin"> <i class="fa fa-pencil" aria-hidden="true"></i></a>
                                  <a href="#" data-id="<?php echo $eventos['evento_id']; ?>" data-tipo="evento" type="button" class="btn bg-maroon btn-flat margin borrar_registro"><i class="fa fa-trash" aria-hidden="true"></i></a>
                             </td>
                      </tr>  
                  <?php } ?>
                  
                </tbody>
                <tfoot>
                      <tr>
                          <th>Nombre</th>
                          <th>Fecha y Hora</th>
                          <th>Categoria</th>
                          <th>Invitado</th>
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
