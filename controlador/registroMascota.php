<?php
if (
    isset($_POST['nombre']) && !empty($_POST['nombre']) &&
    isset($_POST['tipo']) && !empty($_POST['tipo']) &&
    isset($_POST['raza']) && !empty($_POST['raza']) &&
    isset($_POST['requisito']) && !empty($_POST['requisito']) &&
    isset($_POST['cliente']) && !empty($_POST['cliente'])
) {

    $nombre = $_POST['nombre'];
    $tipo = $_POST['tipo'];
    $raza = $_POST['raza'];
    $requisito = $_POST['requisito'];
    $cliente = $_POST['cliente'];

    include("../modelo/MySQL.php");
    $conexion = new MySQL();
    $pdo = $conexion->conectar();

    // Consulta preparada para evitar inyección de SQL
    $sql = "INSERT INTO mascotas (nombre, tipoMascota, Raza, requisitoEspecial) values (:nombre, :tipoMascota, :Raza, :requisitoEspecial)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
    $stmt->bindParam(':tipoMascota', $tipo, PDO::PARAM_STR);
    $stmt->bindParam(':Raza', $raza, PDO::PARAM_STR);
    $stmt->bindParam(':requisitoEspecial', $requisito, PDO::PARAM_STR);
    $stmt->execute();

    $sql2 = "SELECT MAX(idMascotas) as 'idMaximo' FROM mascotas";
    $stmt2 = $pdo->prepare($sql2);
    $stmt2->execute();

    $fila = $stmt2->fetch(PDO::FETCH_ASSOC);
    $idMaximo = $fila['idMaximo'];

    $sql3 = "INSERT INTO clientes_has_mascotas (Clientes_cedula, Mascotas_idMascotas) VALUES (:cedula, :idMascota)";
    $stmt3 = $pdo->prepare($sql3);
    $stmt3->bindParam(':cedula', $cliente, PDO::PARAM_STR);
    $stmt3->bindParam(':idMascota', $idMaximo, PDO::PARAM_INT);
    $stmt3->execute();

    header("Location: ../vista/lsitarMascotas.php");
} else {
    echo "fin";
}
