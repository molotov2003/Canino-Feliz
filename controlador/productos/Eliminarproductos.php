<?php

$idProductos = $_GET['idProductos'];

//Se guarda la respuesta de la consulta en la variable 
include('../../modelo/MySQL.php');
$conexion = new MySQL();
$pdo = $conexion->conectar();
$sql = "DELETE from productos WHERE idProductos =:idProductos;";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':idProductos', $idProductos, PDO::PARAM_STR);
$stmt->execute();
header('Location: ../../vista/agregarProducto.php');
