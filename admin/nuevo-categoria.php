<?php 
    include_once 'funciones/sesion.php';
    include_once 'funciones/funciones.php';
    include_once 'templates/header.php';
?>

<body  class="hold-transition skin-blue fixed sidebar-mini" data-elemento="Eventos">
    <!-- Site wrapper -->
    <div class="wrapper">
        <?php include_once 'templates/barra.php'; ?>
        <?php include_once 'templates/navegacion.php'; ?>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 class="text-center">
        Añadir Categoría de Eventos
        <small>Utilice el formulario para agregar una nueva categoría</small>
      </h1>

      
    </section>

    <!-- Main content -->
    <section class="content">
            
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">Información Categoría</h3>
                            </div>
                            <!-- /.box-header -->
                                <!-- form start -->
                                <form role="form" id="guardar-registro" action="modelo-categoria.php" method="post">
                                    <div class="box-body">
                                            <div class="form-group">
                                                <label for="nombre_evento">Nombre: </label>
                                                <input type="text" class="form-control" id="nombre_categoria" name="nombre_categoria" placeholder="Ej. Taller o Workshop">
                                            </div>

                                            <div class="form-group">
                                                <label>Icono:</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                         <i class="fa fa-lock" aria-hidden="true"></i>
                                                    </div>
                                                    <input id="icono" type="text" name="icono" class="form-control pull-right" placeholder="fa-icon" value="<?php echo $categoria['icono']; ?>" >
                                                </div>
                                                <!-- /.input group -->
                                            </div>
                                            
                                    </div>
                                    <!-- /.box-body -->

                                    <div class="box-footer">
                                        <input type="hidden" name="registro" value="nuevo">
                                        <button type="submit" name="agregar" id="agregar" class="btn btn-primary">Agregar</button>
                                    </div>
                                </form>
                            
                    </div>
                </div>
            </div> <!--.row-->  
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


<?php 
    $conn->close();
  
  include_once 'templates/footer.php';
  include_once 'templates/footer-scripts.php';
?>
