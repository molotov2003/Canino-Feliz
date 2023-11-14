<?php
session_start();
if (
    isset($_POST['Nombrecategoria']) && !empty($_POST['Nombrecategoria'])
) {
    
    $nombre = $_POST['Nombrecategoria'];
    echo $idCategorias;

    include('../../modelo/MySQL.php');
    $conexion = new MySQL();
    $pdo = $conexion->conectar();

    $sql2 =  "SELECT nombre FROM categorias WHERE nombre =:nombre";
    $stmt2 = $pdo->prepare($sql2);
    $stmt2->bindParam(':nombre', $nombre, PDO::PARAM_STR);
    $stmt2->execute();
    if ($stmt2->rowCount() > 0) {
        header("Location: ../../vista/agregarCategorias.php");
        $_SESSION['mensajeErr4'] = "Ya existe una categoria con este nombre";
        $_SESSION['mensajeErr3'] = "Error";
    } else {
        // Se agrega una categoria
        $sql =  "INSERT INTO categorias (nombre) VALUES ( :nombre)";
        $stmt = $pdo->prepare($sql);
       
        $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);

        $stmt->execute();
        header("Location: ../../vista/agregarCategorias.php");
        $_SESSION['mensajeErr2'] = "Se ha agregado la categoria";
        $_SESSION['mensajeErr'] = "Felicidades";
    }
} else {

    header("Location: ../../vista/agregarCategorias.php");
    $_SESSION['mensajeErr4'] = "Debes llenar todos los campos";
    $_SESSION['mensajeErr3'] = "Error";
}
