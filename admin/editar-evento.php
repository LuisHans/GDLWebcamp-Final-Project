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
        Actualizar Evento
        <small>Utilice el formulario para actualizar el evento</small>
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
                                <?php 
                                    $sql = "SELECT * FROM `eventos` WHERE `evento_id` = $id";
                                    $res = $conn->query($sql);
                                    $evento = $res->fetch_assoc();
                                ?>
                                <form role="form" id="guardar-registro" action="modelo-evento.php" method="post">
                                    <div class="box-body">
                                            <div class="form-group">
                                                <label for="nombre_evento">Titulo Evento</label>
                                                <input type="text" class="form-control" id="titulo_evento" name="titulo_evento" value="<?php echo $evento['nombre_evento']; ?>">
                                            </div>

                                            <div class="form-group">
                                                <label>Categoria</label>
                                                <select name="categoria_evento" class="form-control select2" style="width: 100%;">
                                                <option value="0">- Seleccione -</option>
                                                <?php 
                                                try {
                                                        $categoria = $evento['id_cat_evento'];
                                                        $sql = "SELECT * FROM `categoria_evento`";
                                                        $res = $conn->query($sql);
                                                        while($cat_eventos = $res->fetch_assoc()) { 
                                                            if($cat_eventos['id_categoria'] == $categoria) { ?>
                                                                <option value="<?php echo $cat_eventos['id_categoria'] ?>" selected><?php echo $cat_eventos['cat_evento']; ?></option>
                                                        <?php   } else { ?>
                                                            <option value="<?php echo $cat_eventos['id_categoria'] ?>"><?php echo $cat_eventos['cat_evento']; ?></option>
                                                        <?php   }    
                                                        }
                                                } catch (Exception $e) {
                                                    echo "Error:" . $e->getMessage();
                                                }
                                                ?>
                                                </select>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label>Fecha:</label>
                                                <?php 
                                                    $fecha = $evento['fecha_evento'];
                                                    $fecha_formato = date("m/d/Y", strtotime($fecha));
                                                    
                                                ?>
                                                <div class="input-group date">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                    </div>
                                                    <input type="text" name="fecha_evento" class="form-control pull-right" id="datepicker" placeholder="DD/MM/AAAA" value="<?php echo $fecha_formato; ?>">
                                                </div>
                                                <!-- /.input group -->
                                            </div>

                                            <!-- time Picker -->
                                            <div class="bootstrap-timepicker">
                                                <div class="form-group">
                                                        <label>Hora:</label>
                                                        <?php
                                                            $hora = $evento['hora_evento'];
                                                            $hora_formato = date('h:i a', strtotime($hora) );
                                                        ?>
                                                        <div class="input-group">
                                                            <input type="text" name="hora_evento" class="form-control timepicker" value="<?php echo $hora_formato; ?>">
                                        
                                                            <div class="input-group-addon">
                                                                <i class="fa fa-clock-o"></i>
                                                            </div>
                                                        </div>
                                                        <!-- /.input group -->
                                                    </div>
                                                <!-- /.form group -->
                                            </div> <!--.bootstrap-timepicker-->

                                            <div class="form-group">
                                                <label>Cupo:</label>

                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-users"></i>
                                                    </div>
                                                    <input type="number" min="0" max="40" name="cupo_evento" class="form-control pull-right" placeholder="20" value="<?php echo $evento['cupo']; ?>">
                                                </div>
                                                <!-- /.input group -->
                                            </div>

                                            <div class="form-group">
                                                <label>Invitado</label>
                                                <select name="invitado_evento" class="form-control select2" style="width: 100%;">
                                                <option value="0"> - Seleccione - </option>
                                                <?php 
                                                try {
                                                        $invitado = $evento['id_inv'];
                                                        $sql = "SELECT * FROM `invitados`";
                                                        $res = $conn->query($sql);
                                                        while($invitados = $res->fetch_assoc()) { 
                                                            if($invitados['invitado_id'] == $categoria) { ?>
                                                                <option value="<?php echo $invitados['invitado_id'] ?>" selected><?php echo $invitados['nombre_invitado'] . " " . $invitados['apellido_invitado'] ?></option>
                                                        <?php   } else { ?>
                                                            <option value="<?php echo $invitados['invitado_id'] ?>"><?php echo $invitados['nombre_invitado'] . " " .  $invitados['apellido_invitado'] ?></option>
                                                        <?php   }    
                                                        }
                                                } catch (Exception $e) {
                                                    echo "Error:" . $e->getMessage();
                                                }
                                                ?>
                                                </select>
                                            </div>
                                    </div>
                                    <!-- /.box-body -->

                                    <div class="box-footer">
                                        <input type="hidden" name="registro" value="actualizar">
                                        <?php $id = $_GET['id']; ?>
                                        <input type="hidden" name="id_registro" value="<?php echo $id; ?>">
                                        <button type="submit" name="actualizar" id="actualizar" class="btn btn-primary">Actualizar</button>
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
