<?php
session_start();

$id = $_GET['id'];

include("../modelo/MySQL.php");
$conexion = new MySQL();
$pdo = $conexion->conectar();

// Consulta preparada para evitar inyección de SQL
$sql = "DELETE FROM servicios where idServicios = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();

$_SESSION['mensaje2'] = "Felicidades";
$_SESSION['mensaje'] = "El Servicio se ha eliminado con éxito";
header("Location: ../vista/agregarServicio.php");
