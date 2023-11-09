
<?php
session_start();
if (
    isset($_POST['idProductos']) && !empty($_POST['idProductos'])

) {
    $idProductos = $_POST['idProductos'];
    $nombre = $_POST['nombre'];
    $existencia = $_POST['existencia'];
    $precio = $_POST['precio'];
    $iva = $_POST['iva'];
    $Categorias_idCategorias = $_POST['Categorias_idCategorias'];
    include('../../modelo/MySQL.php');
    $conexion = new MySQL();
    $pdo = $conexion->conectar();


    $sql =  "UPDATE productos SET nombre =:nombre, existencia =:existencia, precio =:precio, Categorias_idCategorias =:Categorias_idCategorias WHERE idProductos=:idProductos";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':idProductos', $idProductos, PDO::PARAM_INT);
    $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
    $stmt->bindParam(':existencia', $existencia, PDO::PARAM_INT);
    $stmt->bindParam(':precio', $precio, PDO::PARAM_INT);
    $stmt->bindParam(':Categorias_idCategorias', $Categorias_idCategorias, PDO::PARAM_INT);
    $stmt->execute();
    header("Location: ../../vista/agregarProducto.php");
    $_SESSION['mensaje2'] = "Felicidades";
    $_SESSION['mensaje'] = "Se ha editado correctamente";
} else {
}
