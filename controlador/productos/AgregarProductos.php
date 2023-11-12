<?php
session_start();
if (
    isset($_POST['Idproducto']) && !empty($_POST['Idproducto']) &&
    isset($_POST['Nombreproducto']) && !empty($_POST['Nombreproducto']) &&
    isset($_POST['Existencia']) && !empty($_POST['Existencia']) &&
    isset($_POST['Precio']) && !empty($_POST['Precio']) &&

    isset($_POST['Idcategoria']) && !empty($_POST['Idcategoria'])
) {
    //se capturan las variables que vienen desde el formulario
    $idProductos = $_POST['Idproducto'];
    $nombre = $_POST['Nombreproducto'];
    $existencia = $_POST['Existencia'];
    $precio = $_POST['Precio'];

    $Categorias_idCategorias = $_POST['Idcategoria'];
    include('../../modelo/MySQL.php');
    $conexion = new MySQL();
    $pdo = $conexion->conectar();

    $sql2 = "SELECT idProductos from productos WHERE idProductos =:idProductos;";
    $stmt2 = $pdo->prepare($sql2);
    $stmt2->bindParam(':idProductos', $idProductos, PDO::PARAM_INT);
    $stmt2->execute();
    if ($stmt2->rowCount() > 0) {
        //si el producto existe se  actuliza la existencia 
        $sql3 = "UPDATE productos set nombre =:nombre, existencia = existencia +:existencia ,precio = :precio, Categorias_idCategorias = :Categorias_idCategorias WHERE idProductos =:idProductos ";
        $stmt3 = $pdo->prepare($sql3);
        $stmt3->bindParam(':idProductos', $idProductos, PDO::PARAM_INT);
        $stmt3->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $stmt3->bindParam(':existencia', $existencia, PDO::PARAM_INT);
        $stmt3->bindParam(':precio', $precio, PDO::PARAM_INT);
        $stmt3->bindParam(':Categorias_idCategorias', $Categorias_idCategorias, PDO::PARAM_INT);
        $stmt3->execute();
        header("Location: ../../vista/agregarProducto.php");
        $_SESSION['mensajeErr2'] = "Felicidades";
        $_SESSION['mensajeErr'] = "SE han agregado la cantidad de existencias";
    } else {
        //se agregar un nuevo producto
        $sql =  "INSERT INTO productos (idProductos, nombre, existencia, precio, Categorias_idCategorias) VALUES (:idProductos, :nombre, :existencia , :precio,  :Categorias_idCategorias)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':idProductos', $idProductos, PDO::PARAM_INT);
        $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $stmt->bindParam(':existencia', $existencia, PDO::PARAM_INT);
        $stmt->bindParam(':precio', $precio, PDO::PARAM_INT);
        $stmt->bindParam(':Categorias_idCategorias', $Categorias_idCategorias, PDO::PARAM_INT);
        $stmt->execute();
        $_SESSION['mensaje2'] = "Insercion Completada";
        $_SESSION['mensaje'] = "Se ha agregado correctamente";
        header("Location: ../../vista/agregarProducto.php");
    }
} else {
    header("Location: ../../vista/agregarProducto.php");
    $_SESSION['mensajeErr4'] = "Error";
    $_SESSION['mensajeErr3'] = "Debes llenar todos los campos";
}
