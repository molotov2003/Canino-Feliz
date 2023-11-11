<?php
session_start();
if (
    isset($_POST['cedula']) && !empty($_POST['cedula']) &&
    isset($_POST['nombre']) && !empty($_POST['nombre']) &&
    isset($_POST['apellido']) && !empty($_POST['apellido']) &&
    isset($_POST['telefono']) && !empty($_POST['telefono']) &&
    isset($_POST['direccion']) && !empty($_POST['direccion'])
) {
    $cedula = $_POST['cedula'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];

    include("../modelo/MySQL.php");
    $conexion = new MySQL();
    $pdo = $conexion->conectar();

    // Consulta preparada para evitar inyección de SQL
    $sql = "UPDATE clientes set nombre=:nombre, apellido=:apellido, telefono=:telefono, direccion=:direccion where cedula = :cedula";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':cedula', $cedula, PDO::PARAM_STR);
    $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
    $stmt->bindParam(':apellido', $apellido, PDO::PARAM_STR);
    $stmt->bindParam(':telefono', $telefono, PDO::PARAM_STR);
    $stmt->bindParam(':direccion', $direccion, PDO::PARAM_STR);
    $stmt->execute();

    $_SESSION['mensaje2'] = "Felicidades";
    $_SESSION['mensaje'] = "Se ha editado el cliente correctamente";

    header("Location: ../vista/registroCliente.php");
} else {
    echo "fin";
}
