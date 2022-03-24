
<?php include_once 'includes/templates/header.php'; ?>



        <section class="seccion admin contenedor">
              <h2>Crear Administradores</h2>
              
              <?php include_once 'includes/templates/admin_nav.php'; ?>
              
              <form action="crear_admin.php" class="login" method="POST">
                    <div class="campo">
                          <label for="usuario">Usuario:</label>
                                <input type="text" id="usuario" name="usuario" placeholder="Tu Usuario">
                          
                    </div>
                    <div class="campo">
                          <label for="password">Password:</label>
                                <input type="password" id="password" name="password" placeholder="Tu Password">
                          
                    </div>
                    <div class="campo">
                          <input type="submit" name="submit" class="button" value="Crear">
                    </div>
              </form>
              
              <?php
                  if(isset($_POST['submit'])):
                        $usuario = $_POST['usuario'];
                        $password = $_POST['password'];
                        
                        if(strlen($usuario) < 5):
                              echo "El nombre de usuario debe ser más largo";
                        else:
                                
                                $opciones = array(
                                  'cost' => 12
                                );
                                
                                  $hashed_password = password_hash($password, PASSWORD_BCRYPT, $opciones);
                                
                                try {
                                  require_once('includes/funciones/bd_conexion.php');
                                  $stmt = $conn->prepare("INSERT INTO admins (usuario, hash_pass) VALUES (?,?)");
                                  $stmt->bind_param("ss", $usuario, $hashed_password);
                                  
                                  $stmt->execute();
                                  if($stmt->error):
                                    echo "<div class='mensaje error'>";
                                    echo "Hubo un error";
                                    echo "</div>";
                                  else:
                                    echo "<div class='mensaje'>";
                                    echo "Se insertó correctamente el usuario";
                                    echo "</div>";
                                  endif;    
                                  $stmt->close();
                                  $conn->close();
                                } catch(Exception $e) {
                                  echo "Error:" . $e->getMessage();
                                }
                        endif;  
                  endif;  
              
              ?>
              
            
        </section>
        
        
    <?php include_once 'includes/templates/footer.php'; ?>  