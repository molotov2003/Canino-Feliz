<?php

// Se capturan las variables que vienen desde el formulario
$cedula = $_POST['cedula'];

// Se instancia la clase PDO para la conexión a la base de datos
include("../modelo/MySQL.php");
$conexion = new MySQL();
$pdo = $conexion->conectar();

// Consulta preparada para evitar inyección de SQL
$sql = "SELECT idMascotas, mascotas.nombre FROM mascotas inner JOIN clientes_has_mascotas INNER join clientes
    WHERE mascotas.idMascotas = clientes_has_mascotas.Mascotas_idMascotas and clientes.cedula = clientes_has_mascotas.Clientes_cedula and  clientes.cedula = :cedula";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':cedula', $cedula, PDO::PARAM_STR);
$stmt->execute();
$datos = array();
$fila = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ($fila as $dato) {
    $datos[] = $dato;
}
header('Content-Type: application/json');
echo json_encode($datos);
