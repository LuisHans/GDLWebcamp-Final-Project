<?php
include_once 'funciones/funciones.php';

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];

// boletos
$boletos_adquiridos = $_POST['boletos'];
// Pedido
$camisas = $_POST['pedido_extra']['camisas']['cantidad'];
$etiquetas = $_POST['pedido_extra']['etiquetas']['cantidad'];

$pedido = productos_json($boletos_adquiridos, $camisas, $etiquetas);
$total = $_POST['total_pedido'];
$regalo = $_POST['regalo'];
$eventos = $_POST['registro_evento'];
$registro_eventos = eventos_json($eventos);

$id_registro = $_POST['id_registro'];
$fecha_registro = $_POST['fecha_registro'];

if($_POST['registro'] == 'nuevo') {

    try {
        $stmt = $conn->prepare("INSERT INTO registrados (nombre_registrado, apellido_registrado, email_registrado, fecha_registro, pases_articulos, talleres_registrados, regalo, total_pagado, pagado) VALUES (?,?,?, NOW(),?,?,?,?,1)");
        $stmt->bind_param("sssssis", $nombre, $apellido, $email, $pedido, $registro_eventos, $regalo, $total);
        $stmt->execute();
        if($stmt->affected_rows) {
            $respuesta = array(
                'respuesta' => 'correcto',
                'id_insertado' => $stmt->insert_id
            );

        } else {
            $respuesta = array(
                'respuesta' => 'error'
            );
        }
        $stmt->close();
        $conn->close();
        
    } catch(Exception $e) {
        $respuesta = array(
            'respuesta' =>  $e->getMessage()
        );
    }

    die(json_encode($respuesta));
}

if($_POST['registro'] == 'actualizar') {
    try {
        $stmt = $conn->prepare("UPDATE registrados SET nombre_registrado = ?,  apellido_registrado = ?, email_registrado = ?, fecha_registro = ?, pases_articulos = ?, talleres_registrados = ?, regalo = ?, total_pagado = ?, pagado = 1   WHERE ID_Registrado = ?  ");
        $stmt->bind_param("ssssssisi", $nombre, $apellido, $email, $fecha_registro, $pedido, $registro_eventos, $regalo, $total, $id_registro);
        $stmt->execute();
        $resultado = $stmt->get_result();
        if($stmt->affected_rows) {
            $respuesta = array(
                'respuesta' => 'correcto',
                'id_actualizado' => $stmt->insert_id
            );

        } else {
            $respuesta = array(
                'respuesta' => 'error'
            );
        }
        $stmt->close();
        $conn->close();
        
    } catch(Exception $e) {
        $respuesta = array(
            'respuesta' =>  $e->getMessage()
        );
    }

    die(json_encode($respuesta));
}

if($_POST['registro'] == 'eliminar'){
    $id_borrar = $_POST['id']; 

    try {
        $stmt = $conn->prepare("DELETE FROM registrados WHERE ID_Registrado = ? ");
        $stmt->bind_param("i", $id_borrar);
        $stmt->execute();
        if($stmt->affected_rows) {
            $respuesta = array(
                'respuesta' => 'correcto',
                'id_eliminado' => $id_borrar
            );
        } else {
            $respuesta = array(
                'respuesta' => 'error'
            );
        }
        $stmt->close();
        $conn->close();
        
    } catch(Exception $e) {
        $respuesta = array(
            'respuesta' =>  $e->getMessage()
        );
    }

    die(json_encode($respuesta));
}