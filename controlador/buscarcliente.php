<?php
$datos = json_decode(file_get_contents("php://input"));
if ($datos) {
    $cedula = $datos->cedula;
    include("../modelo/MySQL.php");
    $conexion = new MySQL();
    $pdo = $conexion->conectar();
    // Consulta preparada para evitar inyección de SQL
    $sql = "SELECT * FROM clientes WHERE cedula=:cedula";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':cedula', $cedula, PDO::PARAM_STR);
    $stmt->execute();
    $fila = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($stmt->rowCount() > 0) {
        $nombre = $fila['nombre'];
        echo $nombre;
    } else {
        echo "";
    }
}
