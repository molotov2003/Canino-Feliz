<?php
session_start();

$cedula = $_GET['cedula'];

include("../modelo/MySQL.php");

$conexion = new MySQL();

$pdo = $conexion->conectar();

$sql = "DELETE FROM clientes WHERE cedula = :cedula";

$stmt = $pdo->prepare($sql);
$stmt->bindParam(':cedula', $cedula, PDO::PARAM_STR);
$stmt->execute();

$_SESSION['mensaje2'] = "Felicidades";
$_SESSION['mensaje'] = "Se ha elimado el cliente correctamente";

header("Location: ../vista/registroCliente.php");
