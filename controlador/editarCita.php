<?php
session_start();

$id = $_POST['id'];
$nomServicio = $_POST['servicio'];
$fecha = $_POST['fechaCita'];
$precio = $_POST['precio'];



include("../modelo/MySQL.php");
$conexion = new MySQL();
$pdo = $conexion->conectar();

$arrayres = explode("/", $nomServicio);
$idservicio = $arrayres[0];

// Consulta preparada para evitar inyección de SQL
$sql = "UPDATE reservas set Servicios_idServicios=:servicio, fecha=:fecha, precio= :precio where idReservas = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->bindParam(':servicio', $idservicio, PDO::PARAM_STR);
$stmt->bindParam(':fecha', $fecha, PDO::PARAM_STR);
$stmt->bindParam(':precio', $precio, PDO::PARAM_INT);
$stmt->execute();

$_SESSION['mensaje2'] = "Felicidades";
$_SESSION['mensaje'] = "Se ha editado correctamente";
header("Location: ../vista/listarCitas.php");
