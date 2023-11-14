<?php
$datos = json_decode(file_get_contents("php://input"));
if ($datos) {
    $codigo = $datos->codigo;
    $cantidad = $datos->cantidad;
    include("../modelo/MySQL.php");
    $conexion = new MySQL();
    $pdo = $conexion->conectar();
    // Consulta preparada para evitar inyección de SQL
    $sql = "SELECT CASE WHEN :cantidad > existencia THEN 1 ELSE 0 END AS resultado FROM productos WHERE idProductos=:idProductos";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':idProductos', $codigo, PDO::PARAM_STR);
    $stmt->bindParam(':cantidad', $cantidad, PDO::PARAM_STR);
    $stmt->execute();
    $fila = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($stmt->rowCount() > 0) {
        echo $fila['resultado'];
    } else {
        echo "";
    }
}
