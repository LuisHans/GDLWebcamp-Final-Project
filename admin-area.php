<?php
include_once 'includes/funciones/funciones.php';
include_once 'includes/funciones/sesion.php';


include_once 'includes/templates/header.php'; ?>



        <section class="admin seccion contenedor">
              <h2>Panel de Administracion</h2>
              <p> Bienvenido <?php echo $_SESSION['usuario']; ?> </p>

              <?php include_once 'includes/templates/admin_nav.php'; ?>

        </section>


    <?php include_once 'includes/templates/footer.php'; ?>
