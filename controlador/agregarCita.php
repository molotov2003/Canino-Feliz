<?php
if (
    isset($_POST['cedula']) && !empty($_POST['cedula']) &&
    isset($_POST['nomCliente']) && !empty($_POST['nomCliente']) &&
    isset($_POST['nomMascota']) && !empty($_POST['nomMascota'])

) {



    // Se capturan las variables que vienen desde el formulario
    $cedula = $_POST['cedula'];
    $nomCliente = $_POST['nomCliente'];
    $nomMascota = $_POST['nomMascota'];





    // Se instancia la clase PDO para la conexión a la base de datos
    include("../modelo/MySQL.php");
    $conexion = new MySQL();
    $pdo = $conexion->conectar();

    // Consulta preparada para evitar inyección de SQL
    $sql = "INSERT INTO servicios (nombre, precio) VALUES (:nomServicio, :precio)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':nomServicio', $nomServicio, PDO::PARAM_STR);
    $stmt->bindParam(':precio', $precio, PDO::PARAM_INT);
    $stmt->execute();
    echo "Agrego";
}
