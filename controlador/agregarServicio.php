<?php
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

    // Consulta preparada para evitar inyección de SQL
    $sql = "INSERT INTO servicios (nombre, precio) VALUES (:nomServicio, :precio)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':nomServicio', $nomServicio, PDO::PARAM_STR);
    $stmt->bindParam(':precio', $precio, PDO::PARAM_INT);
    $stmt->execute();
    echo "Agrego";
}
