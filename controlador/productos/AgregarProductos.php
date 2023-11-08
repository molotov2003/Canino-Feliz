<?php

if (
    isset($_POST['Idproducto']) && !empty($_POST['Idproducto']) &&
    isset($_POST['Nombreproducto']) && !empty($_POST['Nombreproducto']) &&
    isset($_POST['Existencia']) && !empty($_POST['Existencia']) &&
    isset($_POST['Precio']) && !empty($_POST['Precio']) &&
    isset($_POST['Iva']) && !empty($_POST['Iva']) &&
    isset($_POST['Idcategoria']) && !empty($_POST['Idcategoria'])
) {
    //se capturan las variables que vienen desde el formulario
    $idProductos = $_POST['Idproducto'];
    $nombre = $_POST['Nombreproducto'];
    $existencia = $_POST['Existencia'];
    $precio = $_POST['Precio'];
    $iva = $_POST['Iva'];
    $Categorias_idCategorias = $_POST['Idcategoria'];
    include('../../modelo/MySQL.php');
    $conexion = new MySQL();
    $pdo = $conexion->conectar();


    $sql =  "INSERT INTO productos (idProductos, nombre, existencia, precio, iva, Categorias_idCategorias) VALUES (:idProductos, :nombre, :existencia , :precio, :iva, :Categorias_idCategorias)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':idProductos', $idProductos, PDO::PARAM_INT);
    $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
    $stmt->bindParam(':existencia', $existencia, PDO::PARAM_INT);
    $stmt->bindParam(':precio', $precio, PDO::PARAM_INT);
    $stmt->bindParam(':iva', $iva, PDO::PARAM_INT);
    $stmt->bindParam(':Categorias_idCategorias', $Categorias_idCategorias, PDO::PARAM_INT);
    $stmt->execute();
    header("Location: ../../vista/agregarProducto.php");
} else {
}
