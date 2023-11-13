<?php
session_start();

$id = $_POST['id'];
$nomServicio = $_POST['servicio'];
$fecha = $_POST['fechaCita'];




include("../modelo/MySQL.php");
$conexion = new MySQL();
$pdo = $conexion->conectar();

$arrayres = explode("/", $nomServicio);
$idservicio = $arrayres[0];

// Consulta preparada para evitar inyección de SQL
$sql = "UPDATE reservas set Servicios_idServicios=:servicio, fecha=:fecha where idReservas = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->bindParam(':servicio', $idservicio, PDO::PARAM_STR);
$stmt->bindParam(':fecha', $fecha, PDO::PARAM_STR);

$stmt->execute();

$_SESSION['mensaje2'] = "Felicidades";
$_SESSION['mensaje'] = "Se ha editado correctamente. el precio es:" . "$" . number_format($precio, 0, ",", ".");
header("Location: ../vista/listarCitas.php");
