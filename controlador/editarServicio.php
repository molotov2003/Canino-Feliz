<?php
if (
    isset($_POST['id']) && !empty($_POST['id']) &&
    isset($_POST['nomServicio']) && !empty($_POST['nomServicio']) &&
    isset($_POST['precio']) && !empty($_POST['precio'])
) {
    $id = $_POST['id'];
    $nomServicio = $_POST['nomServicio'];
    $precio = $_POST['precio'];



    include("../modelo/MySQL.php");
    $conexion = new MySQL();
    $pdo = $conexion->conectar();

    // Consulta preparada para evitar inyección de SQL
    $sql = "UPDATE servicios set nombre=:nombre, precio=:precio where idServicios = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':nombre', $nomServicio, PDO::PARAM_STR);
    $stmt->bindParam(':precio', $precio, PDO::PARAM_INT);
    $stmt->execute();

    echo "Edito";
} else {
    echo "fin";
}
