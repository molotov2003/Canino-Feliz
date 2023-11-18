<?php
include("../modelo/MySQL.php");
$conexion = new MySQL();
$pdo = $conexion->conectar();
// Consulta preparada para evitar inyección de SQL
$sql = "SELECT productos.idProductos, productos.nombre AS NombreProducto, SUM(detalle.cantidad) AS TotalVendido
FROM Productos
JOIN Detalle ON productos.idProductos = detalle.Productos_idProductos
GROUP BY productos.idProductos
ORDER BY TotalVendido DESC
LIMIT 5";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$data = array();
while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $data[] = $fila;
}
header('Content-Type: application/json');
echo json_encode($data);
