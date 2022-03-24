<?php 
    include_once 'includes/templates/header.php'; 

    use PayPal\Rest\ApiContext;
    use PayPal\Api\PaymentExecution ;
    use PayPal\Api\Payment;
    require 'includes/paypal.php';
?>  
<section class="seccion contenedor">
    <h2>Resumen Registro</h2>
    
    <?php
        $resultado = $_GET['exito'];
        $paymentId = $_GET['paymentId'];
        $id_pago = (int) $_GET['id_pago'];
        
        $payment = Payment::get($paymentId, $apiContext);
        $execution = new PaymentExecution();
        $execution->setPayerId( $_GET['PayerID'] );

        
        //Execute the payment
        $result = $payment->execute($execution, $apiContext);
    
        // echo "<pre>";
        // var_dump(json_decode( $result ) );
        // echo "</pre>";
        echo "<hr>";

        $respuesta = $result->transactions[0]->related_resources[0]->sale->state;

        if($respuesta == "completed"){
              echo "<div class='resultado correcto'>";
              echo "El pago se realizó correctamente <br/>";
              echo "el ID es {$paymentId}";
              echo "</div>";
              
              require_once('includes/funciones/bd_conexion.php');
              $stmt = $conn->prepare("UPDATE `registrados` SET `pagado` = ? WHERE `ID_registrado` =  ? ");
              $pagado = 1;
              $stmt->bind_param("ii", $pagado, $id_pago);
              $stmt->execute();
              $stmt->close();
              $conn->close();
        } else {
            echo "<div class='resultado error'>";
            echo "El pago no se realizo";
            echo "</div>";
        }
    
    ?>
    
  
    
</section>


<?php include_once 'includes/templates/footer.php'; ?>  