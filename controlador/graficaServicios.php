<?php
include("../modelo/MySQL.php");
$conexion = new MySQL();
$pdo = $conexion->conectar();
// Consulta preparada para evitar inyección de SQL
$sql = "SELECT servicios.idServicios, servicios.nombre AS NombreServicio, COUNT(reservas.Servicios_idServicios) AS Total
FROM servicios
JOIN reservas ON servicios.idServicios = reservas.Servicios_idServicios
GROUP BY servicios.idServicios
ORDER BY Total DESC
LIMIT 5";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$data = array();
while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $data[] = $fila;
}
header('Content-Type: application/json');
echo json_encode($data);
