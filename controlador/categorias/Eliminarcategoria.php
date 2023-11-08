<?php

$idCategorias = $_GET['idCategorias'];

//Se guarda la respuesta de la consulta en la variable 
include('../../modelo/MySQL.php');
$conexion = new MySQL();
$pdo = $conexion->conectar();
$sql = "DELETE FROM categorias WHERE idCategorias =:idCategorias;";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':idCategorias', $idCategorias, PDO::PARAM_STR);
$stmt->execute();
header('Location: ../../vista/agregarCategorias.php');
