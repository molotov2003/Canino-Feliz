<?php
session_start();
$id = $_GET['id'];
if (isset($_GET['id']) && !empty($_GET['id'])) {
    include("../modelo/MySQL.php");
    $conexion = new MySQL();
    $pdo = $conexion->conectar();

    // Consulta preparada para evitar inyección de SQL
    $sql = "DELETE FROM empleados where idEmpleados = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $_SESSION['icono'] =  "success";
    $_SESSION['titulo'] = "Borrado Realizado";
    $_SESSION['mensaje'] = "El empleado fue Borrado Correctamente";
    header("Location: ../vista/agregarEmpleado.php");
} else {
    $_SESSION['icono'] = "error";
    $_SESSION['titulo'] = "Error al Agregar";
    $_SESSION['mensaje'] = "No mueva la URL";
    header("Location: ../vista/agregarEmpleado.php");
}
