<?php 
    include_once 'includes/funciones/funciones.php';
    session_start();
    usuario_autenticado();
if(isset($_POST['submit'])):
  $nombre = $_POST['nombre'];
  $fecha = $_POST['fecha'];
  $hora = $_POST['hora'];
  $id_cat = $_POST['categorias'];
  $id_invitado = $_POST['invitado'];
  try {
    require_once('includes/funciones/bd_conexion.php');
    $stmt = $conn->prepare("SELECT cat_evento, COUNT(DISTINCT nombre_evento) FROM eventos INNER JOIN categoria_evento ON eventos.id_cat_evento=categoria_evento.id_categoria WHERE id_cat_evento = ? ");
    $stmt->bind_param("s", $id_cat);
    $stmt->execute();
    $stmt->bind_result($categoria_evento, $total);
    $stmt->store_result();
    $sql = "INSERT INTO `eventos` (nombre_evento, fecha_evento, hora_evento, id_cat_evento, id_inv, clave) VALUES (?,?,?,?,?,?);";
    $stmt2 = $conn->prepare($sql);
    $stmt->fetch();
    (int) $total = $total;
    $total++;
    $clave = strtolower(substr($categoria_evento, 0, 5)) . "_" . $total;
    $stmt2->bind_param("ssssss", $nombre, $fecha, $hora, $id_cat, $id_invitado, $clave);
    $stmt2->execute();
    $stmt2->close();
    $stmt->close();
    $conn->close();
    header('Location:agregar_evento.php?exitoso=1');
  } catch(Exception $e) {
    echo "Error:" . $e->getMessage();
  }
endif;
?>

<?php include_once 'includes/templates/header.php'; ?>

    

        <section class="admin seccion contenedor">
              <h2>Agregar Evento</h2>
              <p>Bienvenido <?php echo $_SESSION['usuario']; ?> </p>  
              
              <?php include_once 'includes/templates/admin_nav.php'; ?>
          
              <form class="invitado" action="agregar_evento.php" method="post">
                  <div class="campo">
                        <label for="nombre">Nombre Evento:</label>
                        <input type="text" id="nombre" name="nombre" placeholder="Nombre" required>
                  </div>
                  <div class="campo">
                        <label for="fecha">Fecha:</label>
                        <input type="date" id="fecha" name="fecha" required>
                  </div>
                  <div class="campo">
                        <label for="hora">Hora:</label>
                        <input type="time" id="hora" name="hora" required>
                  </div>
                  <div class="campo">
                        <label for="categoria">Categoria:  </label><br>
                        <?php 
                            try {
                              require_once('includes/funciones/bd_conexion.php');
                              $sql = "SELECT * FROM `categoria_evento`";
                              $res = $conn->query($sql);
                              while($cat_eventos = $res->fetch_assoc()) {
                                  echo '<input type="radio" name="categorias" value=' . $cat_eventos['id_categoria'] . '> ' . $cat_eventos['cat_evento'] . '<br/>';
                              }
                            } catch (Exception $e) {
                              echo "Error:" . $e->getMessage();
                            }
                         ?>
                  </div>
                  
                  <div class="campo">
                        <label for="invitado">Invitado:</label>
                      
                          <?php 
                              try {
                                require_once('includes/funciones/bd_conexion.php');
                                $sql = "SELECT `invitado_id`, `nombre_invitado`, `apellido_invitado` FROM `invitados`";
                                $res_invitados = $conn->query($sql);
                                echo "<select name='invitado'>";
                                while($invitados = $res_invitados->fetch_assoc()){ ?>
                                  <option value="<?php echo $invitados['invitado_id'] ?>">
                                        <?php echo $invitados['nombre_invitado'] . " " . $invitados['apellido_invitado']; ?>
                                  </option>
                              <?php  }
                                echo "</select>";
                              } catch (Exception $e) {
                                echo "Error:" . $e->getMessage();
                              }
                           ?>
                  </div>
  
                  <div class="campo">
                        <input type="submit" name="submit" value="Agregar" class="button" > 
                  </div>
              </form>
              
              <?php if(isset($_GET['exitoso'])): ?>
                    <div class="mensaje">
                          Se subió correctamente
                    </div>
              <?php endif; ?>  
              
              
              <?php $conn->close(); ?>
        </section>
        
        
    <?php include_once 'includes/templates/footer.php'; ?>  