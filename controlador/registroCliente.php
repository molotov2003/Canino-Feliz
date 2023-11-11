<?php
session_start();
if (
    isset($_POST['cedula']) && !empty($_POST['cedula']) &&
    isset($_POST['nombre']) && !empty($_POST['nombre']) &&
    isset($_POST['apellido']) && !empty($_POST['apellido']) &&
    isset($_POST['telefono']) && !empty($_POST['telefono']) &&
    isset($_POST['direccion']) && !empty($_POST['direccion'])
) {

    include("../modelo/MySQL.php");
    $conexion = new MySQL();
    $pdo = $conexion->conectar();

    $cedula = $_POST['cedula'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];

    $sql2 = "SELECT * FROM clientes where cedula = :cedula";
    $stmt2 = $pdo->prepare($sql2);
    $stmt2->bindParam(':cedula', $cedula, PDO::PARAM_STR);
    $stmt2->execute();

    if($stmt2->rowCount() > 0){
        $_SESSION['mensajeErr'] = "Error";
        $_SESSION['mensajeErr2'] = "El cliente ya existe";
        header("Location: ../vista/registroCliente.php");
    }else{
    // Consulta preparada para evitar inyección de SQL
    $sql = "INSERT INTO clientes (cedula, nombre, apellido, telefono, direccion) values (:cedula, :nombre, :apellido, :telefono, :direccion)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':cedula', $cedula, PDO::PARAM_STR);
    $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
    $stmt->bindParam(':apellido', $apellido, PDO::PARAM_STR);
    $stmt->bindParam(':telefono', $telefono, PDO::PARAM_STR);
    $stmt->bindParam(':direccion', $direccion, PDO::PARAM_STR);
    $stmt->execute();

    $_SESSION['mensaje2'] = "Felicidades";
    $_SESSION['mensaje'] = "El cliente se ha registrado correctamente";
    header("Location: ../vista/registroCliente.php");
    }

} else {
    echo "fin";
}
