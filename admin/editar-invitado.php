<?php 
    $id = $_GET['id'];
    if (!filter_var($id, FILTER_VALIDATE_INT)):
       die('ERROR!');
    endif;

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
        Editar Invitados
        <small>Utilice el formulario para editar un invitado</small>
      </h1>

      
    </section>

    <!-- Main content -->
    <section class="content">
            
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">Información Invitado</h3>
                            </div>
                            <!-- /.box-header -->
                                <?php 
                                    $sql = "SELECT * FROM invitados WHERE invitado_id = $id ";
                                    $resultado = $conn->query($sql);
                                    $invitado = $resultado->fetch_assoc();
                                ?>

                                <!-- form start -->
                                <form role="form" id="guardar-registro-archivo" action="modelo-invitado.php" method="post" enctype="multipart/form-data">
                                    <div class="box-body">
                                            <div class="form-group">
                                                <label for="nombre_invitado">Nombre: </label>
                                                <input type="text" class="form-control" id="nombre_invitado" name="nombre_invitado" placeholder="Nombre" value="<?php echo $invitado['nombre_invitado']; ?>">
                                            </div>  
                                            <div class="form-group">
                                                <label for="apellido_invitado">Apellido: </label>
                                                <input type="text" class="form-control" id="apellido_invitado" name="apellido_invitado" placeholder="Apellido" value="<?php echo $invitado['apellido_invitado']; ?>">
                                            </div> 
                                            <div class="form-group">
                                                <label for="biografia_invitado">Biografía: </label>
                                                <textarea class="form-control" id="biografia_invitado" name="biografia_invitado" placeholder="Biografia" rows="8"><?php echo $invitado['descripcion']; ?></textarea>
                                            </div> 

                                            <div class="form-group">
                                                <label>Imagen Actual</label>
                                                <br>
                                                <img src="../img/invitados/<?php echo $invitado['url_imagen']; ?>" width="200">
                                            </div>
                                            <div class="form-group">
                                                <label for="archivo_imagen">Imagen</label>
                                                <input type="file" id="archivo_imagen" name="archivo_imagen">

                                                <p class="help-block">Añada una imagen aquí</p>
                                            </div>
                                    </div>
                                    <!-- /.box-body -->

                                    <div class="box-footer">
                                        <input type="hidden" name="registro" value="actualizar">
                                        <input type="hidden" name="id_registro" value="<?php echo $invitado['invitado_id'] ?>">
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
