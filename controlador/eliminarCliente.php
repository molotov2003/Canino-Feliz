<?php

$cedula = $_GET['cedula'];

include("../modelo/MySQL.php");

$conexion = new MySQL();

$pdo = $conexion->conectar();

$sql = "DELETE FROM clientes WHERE cedula = :cedula";

$stmt = $pdo->prepare($sql);
$stmt->bindParam(':cedula', $cedula, PDO::PARAM_STR);
$stmt->execute();

header("Location: ../vista/registroCliente.php");
