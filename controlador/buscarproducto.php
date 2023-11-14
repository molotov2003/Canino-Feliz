<?php
$datos = json_decode(file_get_contents("php://input"));
if ($datos) {
    $codigo = $datos->codigo;
    include("../modelo/MySQL.php");
    $conexion = new MySQL();
    $pdo = $conexion->conectar();
    // Consulta preparada para evitar inyección de SQL
    $sql = "SELECT * FROM productos WHERE idProductos=:idProductos";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':idProductos', $codigo, PDO::PARAM_STR);
    $stmt->execute();
    $fila = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($stmt->rowCount() > 0) {
        $nombre = $fila['nombre'];
        $precio = $fila['precio'];
        echo "$nombre,$precio";
    } else {
        echo ",";
    }
}
