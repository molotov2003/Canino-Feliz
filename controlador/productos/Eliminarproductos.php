<?php
session_start();
$idProductos = $_GET['idProductos'];

//Se eliminan un producto
include('../../modelo/MySQL.php');
$conexion = new MySQL();
$pdo = $conexion->conectar();
$sql = "DELETE from productos WHERE idProductos =:idProductos;";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':idProductos', $idProductos, PDO::PARAM_STR);
$stmt->execute();

header("Location: ../../vista/agregarProducto.php");
$_SESSION['mensajeErr3'] = "Felicidades";
$_SESSION['mensaje'] = "Se ha eliminado correctamente";

