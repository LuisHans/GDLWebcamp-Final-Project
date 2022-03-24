<?php 
if(isset($_POST['submit'])):
  
  
endif;
?>

<?php include_once 'includes/templates/header.php'; ?>

    

        <section class="seccion contenedor">
              <h2>Iniciar Sesión</h2>
              
              <form action="login.php" class="login" method="POST">
                    <div class="campo">
                          <label for="usuario">Usuario:</label>
                                <input type="text" id="usuario" name="usuario" placeholder="Tu Usuario">
                          
                    </div>
                    <div class="campo">
                          <label for="password">Password:</label>
                                <input type="password" id="password" name="password" placeholder="Tu Password">
                          
                    </div>
                    <div class="campo">
                          <input type="submit" name="submit" class="button" value="Iniciar Sesión">
                    </div>
              </form>
              
              <?php
                  echo $resultado;
              ?>
              
            
        </section>
        
        
    <?php include_once 'includes/templates/footer.php'; ?>  