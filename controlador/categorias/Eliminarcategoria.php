<?php
session_start();
// se llama el id
$idCategorias = $_GET['idCategorias'];

 
include('../../modelo/MySQL.php');
$conexion = new MySQL();
$pdo = $conexion->conectar();

//se borra la categoria
$sql = "DELETE FROM categorias WHERE idCategorias =:idCategorias;";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':idCategorias', $idCategorias, PDO::PARAM_STR);
$stmt->execute();
header('Location: ../../vista/agregarCategorias.php');
$_SESSION['mensajeErr3'] = "Felicidades";
$_SESSION['mensaje'] = "Se ha eliminado correctamente";
