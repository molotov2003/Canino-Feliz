<?php
$id = $_GET['id'];

include("../modelo/MySQL.php");
$conexion = new MySQL();
$pdo = $conexion->conectar();

// Consulta preparada para evitar inyección de SQL
$sql = "DELETE FROM empleados where idEmpleados = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();
