<?php

// Se capturan las variables que vienen desde el formulario
$id = $_POST['idServicios'];
$arreglo = explode("/", $id);
$idservicio = $arreglo[0];


// Se instancia la clase PDO para la conexión a la base de datos
include("../modelo/MySQL.php");
$conexion = new MySQL();
$pdo = $conexion->conectar();



// Consulta preparada para evitar inyección de SQL
$sql = "SELECT servicios.precio as precio FROM servicios WHERE servicios.idServicios = :id; ";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id', $idservicio, PDO::PARAM_STR);
$stmt->execute();
$datos;
$fila = $stmt->fetch(PDO::FETCH_ASSOC);
foreach ($fila as $dato) {
    $datos = $dato['precio'];
}
header('Content-Type: application/json');
echo json_encode($datos);
