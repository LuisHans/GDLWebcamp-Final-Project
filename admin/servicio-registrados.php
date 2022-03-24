<?php
include_once 'funciones/funciones.php';
include_once 'funciones/sesion.php';


$sql = " SELECT fecha_registro, COUNT(*) as resultado from registrados group by DATE(fecha_registro) order by fecha_registro ";
$resultado = $conn->query($sql);

$arreglo_registros = array();

while($registros_dia = $resultado->fetch_assoc()) {
    $fecha = $registros_dia['fecha_registro'];
    $registro['fecha'] = date('Y-m-d', strtotime($fecha) );
    $registro['cantidad'] = $registros_dia['resultado'];

    $arreglo_registros[] = $registro;
}
echo json_encode($arreglo_registros);
