<?php 
    include_once 'funciones/sesion.php';
    include_once 'funciones/funciones.php';
    include_once 'templates/header.php';
 
     $id = $_GET['id'];
 
     if (!filter_var($id, FILTER_VALIDATE_INT)):
        die('ERROR!');
     else:
        
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
        Actualizar Categoria
        <small>Utilice el formulario para actualizar la Categoria</small>
      </h1>

      
    </section>

    <!-- Main content -->
    <section class="content">
            
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">Información Categoria</h3>
                            </div>
                            <!-- /.box-header -->
                                <!-- form start -->
                                <?php 
                                    $sql = "SELECT * FROM `categoria_evento` WHERE `id_categoria` = $id";
                                    $res = $conn->query($sql);
                                    $categoria = $res->fetch_assoc();
                                ?>
                                <form role="form" id="guardar-registro" action="modelo-categoria.php" method="post">
                                    <div class="box-body">
                                            <div class="form-group">
                                                <label for="nombre_evento">Nombre Categoría: </label>
                                                <input type="text" class="form-control" id="categoria" name="categoria" value="<?php echo $categoria['cat_evento']; ?>">
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
                                        <input type="hidden" name="registro" value="actualizar">
                                        <?php $id = $_GET['id']; ?>
                                        <input type="hidden" name="id_registro" value="<?php echo $id; ?>">
                                        <button type="submit" name="actualizar" id="actualizar" class="btn btn-primary btn_actualizar_admin">Actualizar</button>
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

  endif;
?>
