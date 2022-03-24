<?php
include_once 'funciones/funciones.php';

// Leer los datos
$titulo = $_POST['titulo_evento'];
$categoria_id = $_POST['categoria_evento'];
$invitado_id =  $_POST['invitado_evento'];
$cupo =  $_POST['cupo_evento'];
// obtener fecha
$fecha = $_POST['fecha_evento'];
$fecha_formato = date("Y-m-d", strtotime($fecha));
//obtener hora
$hora = $_POST['hora_evento'];
$id_registro = $_POST['id_registro'];

if($_POST['registro'] == 'nuevo') {
    try {
        $stmt = $conn->prepare("INSERT INTO eventos (nombre_evento, fecha_evento, hora_evento, cupo, id_cat_evento, id_inv, fecha_creado) VALUES (?,?,?,?, ?, NOW() )");
        $stmt->bind_param("sssiss", $titulo, $fecha_formato, $hora, $cupo, $categoria_id, $invitado_id);
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

    $id_registro = $_POST['id_registro'];
    $usuario = $_POST['usuario'];
    $nuevo_password = $_POST['nuevo_password'];
    

    try {
        $opciones = array(
            'cost' => 12,
        );
        if(empty($_POST['nuevo_password']) && empty($_POST['repetir_password'])) {

            $stmt = $conn->prepare("UPDATE admins SET usuario = ?, actualizado = NOW() WHERE ID_admin = ?  ");
            $stmt->bind_param("si", $usuario, $id_registro);
            
        } else {
            $hash_password = password_hash($nuevo_password, PASSWORD_BCRYPT, $opciones);        
            $stmt = $conn->prepare("UPDATE admins SET usuario = ?,  hash_pass = ? WHERE ID_admin = ?  ");
            $stmt->bind_param("ssi", $usuario, $hash_password, $id_registro);
            
        }
   
        $stmt->execute();
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
        $stmt = $conn->prepare("DELETE FROM eventos WHERE evento_id = ? ");
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