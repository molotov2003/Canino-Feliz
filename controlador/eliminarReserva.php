<?php
session_start();
$id = $_GET['id'];

include("../modelo/MySQL.php");
$conexion = new MySQL();
$pdo = $conexion->conectar();

// Consulta preparada para evitar inyección de SQL
$sql = "DELETE FROM reservas where idReservas = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();

$_SESSION['mensaje2'] = "Felicidades";
$_SESSION['mensaje'] = "Se ha eliminado correctamente la reserva";
header("Location: ../vista/listarCitas.php");
