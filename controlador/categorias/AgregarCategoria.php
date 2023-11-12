<?php
session_start();
if (
    isset($_POST['Idcategoria']) && !empty($_POST['Idcategoria']) &&
    isset($_POST['Nombrecategoria']) && !empty($_POST['Nombrecategoria'])
) {
    //se capturan las variables que vienen desde el formulario
    $Idcategoria = $_POST['Idcategoria'];
    $nombre = $_POST['Nombrecategoria'];
    echo $idCategorias;

    include('../../modelo/MySQL.php');
    $conexion = new MySQL();
    $pdo = $conexion->conectar();

    // Se agrega una categoria
    $sql =  "INSERT INTO categorias (idCategorias, nombre) VALUES (:Idcategoria, :nombre)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':Idcategoria', $Idcategoria, PDO::PARAM_INT);
    $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);

    $stmt->execute();
    header("Location: ../../vista/agregarCategorias.php");
    $_SESSION['mensajeErr2'] = "Se ha agregado la categoria";
    $_SESSION['mensajeErr'] = "Felicidades";
} else {

    header("Location: ../../vista/agregarCategorias.php");
    $_SESSION['mensajeErr4'] = "Debes llenar todos los campos";
    $_SESSION['mensajeErr3'] = "Error";
}
