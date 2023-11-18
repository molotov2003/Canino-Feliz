<?php
session_start();
if (isset($_POST['idEmpleados']) && !empty($_POST['idEmpleados']) && isset($_POST['pass']) && !empty($_POST['pass'])) {
    $idEmpleados = $_POST['idEmpleados'];
    $password =  base64_encode($_POST['pass']);
    include('../modelo/MySQL.php');
    $conexion = new MySQL();
    $pdo = $conexion->conectar();

    $sql = "SELECT * FROM empleados WHERE idEmpleados=:idEmpleados AND password=:password";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':idEmpleados', $idEmpleados, PDO::PARAM_STR);
    $stmt->bindParam(':password', $password, PDO::PARAM_STR);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        $fila = $stmt->fetch(PDO::FETCH_ASSOC);
        $_SESSION['idEmpleados'] = $fila['idEmpleados'];
        $_SESSION['nombre'] = $fila['nombre'];
        $_SESSION['session'] = true;
        $_SESSION['rol'] = $fila['rol'];
        header("Location: ../vista/listarCitas.php");
    } else {
        $_SESSION['error'] = "Usuario o Contraseña Incorrecta Intente Nuevamente";
        $_SESSION['error2'] = "Error";
        header("Location: ../index.php");
    }
}
