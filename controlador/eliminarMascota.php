<?php

$idMascotas = $_GET['id'];

include("../modelo/MySQL.php");

$conexion = new MySQL();

$pdo = $conexion->conectar();

$sql = "DELETE FROM clientes_has_mascotas WHERE Mascotas_idMascotas = :idMascota";

$stmt = $pdo->prepare($sql);
$stmt->bindParam(':idMascota', $idMascotas, PDO::PARAM_STR);
$stmt->execute();

$sql2 = "DELETE FROM mascotas WHERE idMascotas = :idMascotas";

$stmt2 = $pdo->prepare($sql2);
$stmt2->bindParam(':idMascotas', $idMascotas, PDO::PARAM_STR);
$stmt2->execute();

header("Location: ../vista/lsitarMascotas.php");
