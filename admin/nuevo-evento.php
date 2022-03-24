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
        Añadir Evento
        <small>Utilice el formulario para agregar un nuevo evento</small>
      </h1>

      
    </section>

    <!-- Main content -->
    <section class="content">
            
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">Información Evento</h3>
                            </div>
                            <!-- /.box-header -->
                                <!-- form start -->
                                <form role="form" id="guardar-registro" action="modelo-evento.php" method="post">
                                    <div class="box-body">
                                            <div class="form-group">
                                                <label for="nombre_evento">Titulo Evento</label>
                                                <input type="text" class="form-control" id="titulo_evento" name="titulo_evento" placeholder="Ej. Creando una Tienda Virtual">
                                            </div>

                                            <div class="form-group">
                                                <label>Categoria</label>
                                                <select name="categoria_evento" class="form-control select2" style="width: 100%;">
                                                <option value="0">- Seleccione -</option>
                                                <?php 
                                                try {
                                                    $sql = "SELECT * FROM `categoria_evento`";
                                                    $res = $conn->query($sql);
                                                    while($cat_eventos = $res->fetch_assoc()) { ?>
                                                        <option value="<?php echo $cat_eventos['id_categoria'] ?>"><?php echo $cat_eventos['cat_evento']; ?></option>
                                                    <?php  }
                                                    } catch (Exception $e) {
                                                        echo "Error:" . $e->getMessage();
                                                    }
                                                ?>
                                                </select>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label>Fecha:</label>

                                                <div class="input-group date">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                    </div>
                                                    <input type="text" name="fecha_evento" class="form-control pull-right" id="datepicker" placeholder="DD/MM/AAAA">
                                                </div>
                                                <!-- /.input group -->
                                            </div>

                                            <div class="form-group">
                                                <label>Cupo:</label>

                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-users"></i>
                                                    </div>
                                                    <input type="number" min="0" max="40" name="cupo_evento" class="form-control pull-right" placeholder="20">
                                                </div>
                                                <!-- /.input group -->
                                            </div>

                                            <!-- time Picker -->
                                            <div class="bootstrap-timepicker">
                                                <div class="form-group">
                                                        <label>Hora:</label>
                                        
                                                        <div class="input-group">
                                                            <input type="text" name="hora_evento" class="form-control timepicker">
                                        
                                                            <div class="input-group-addon">
                                                                <i class="fa fa-clock-o"></i>
                                                            </div>
                                                        </div>
                                                        <!-- /.input group -->
                                                    </div>
                                                <!-- /.form group -->
                                            </div> <!--.bootstrap-timepicker-->
                                            <div class="form-group">
                                                <label>Invitado</label>
                                                <select name="invitado_evento" class="form-control select2" style="width: 100%;">
                                                <option value="0"> - Seleccione - </option>
                                                <?php 
                                                try {
                                                    $sql = "SELECT `invitado_id`, `nombre_invitado`, `apellido_invitado` FROM `invitados`";
                                                    $res_invitados = $conn->query($sql);
                                                    while($invitados = $res_invitados->fetch_assoc()){ ?>
                                                        <option value="<?php echo $invitados['invitado_id'] ?>">
                                                            <?php echo $invitados['nombre_invitado'] . " " . $invitados['apellido_invitado']; ?>
                                                        </option>
                                                    <?php  }
                                                    } catch (Exception $e) {
                                                    echo "Error:" . $e->getMessage();
                                                    }
                                                ?>
                                                </select>
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
