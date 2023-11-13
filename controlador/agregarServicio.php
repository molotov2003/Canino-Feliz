<?php
session_start();
if (
    isset($_POST['nomServicio']) && !empty($_POST['nomServicio']) &&
    isset($_POST['precio']) && !empty($_POST['precio'])
) {



    // Se capturan las variables que vienen desde el formulario
    $nomServicio = $_POST['nomServicio'];
    $precio = $_POST['precio'];



    // Se instancia la clase PDO para la conexión a la base de datos
    include("../modelo/MySQL.php");
    $conexion = new MySQL();
    $pdo = $conexion->conectar();

    $sql2 = "SELECT * FROM servicios WHERE nombre = :nombre";
    $stmt2 = $pdo->prepare($sql2);
    $stmt2->bindParam(':nombre', $nomServicio, PDO::PARAM_STR);
    $stmt2->execute();
    if ($stmt2->rowCount() > 0) {
        $_SESSION['mensajeErr2'] = "El servicio ya existe";
        $_SESSION['mensajeErr'] = "Error";
        header("Location: ../vista/agregarServicio.php");
    } else {
        // Consulta preparada para evitar inyección de SQL
        $sql = "INSERT INTO servicios (nombre, precio) VALUES (:nomServicio, :precio)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nomServicio', $nomServicio, PDO::PARAM_STR);
        $stmt->bindParam(':precio', $precio, PDO::PARAM_INT);
        $stmt->execute();


        $_SESSION['mensaje2'] = "Felicidades";
        $_SESSION['mensaje'] = "Se ha agregado correctamente";
        header("Location: ../vista/agregarServicio.php");
    }
}
