<?php
session_start();

$id = $_POST['id'];
$nomServicio = $_POST['servicio'];
$fecha = $_POST['fechaCita'];





include("../modelo/MySQL.php");
$conexion = new MySQL();
$pdo = $conexion->conectar();


$sql3 = "SELECT * FROM reservas where  fecha = :fechaCita";
$stmt3 = $pdo->prepare($sql3);
$stmt3->bindParam(':fechaCita', $fecha, PDO::PARAM_STR);

$stmt3->execute();
if ($stmt3->rowCount() > 0) {

    $_SESSION['mensajeErr2'] = "Fecha y hora ya reservados";
    $_SESSION['mensajeErr'] = "Error";
    header("Location: ../vista/listarCitas.php");
} else {



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
    $_SESSION['mensaje'] = "Se ha editado correctamente";
    header("Location: ../vista/listarCitas.php");
}
