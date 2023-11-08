
<?php
//controla el inicio de sesion
if (
    isset($_POST['idCategoria']) && !empty($_POST['idCategoria'])

) {
    $idCategorias = $_POST['idCategoria'];
    $nombre = $_POST['nombre'];
    include('../../modelo/MySQL.php');
    $conexion = new MySQL();
    $pdo = $conexion->conectar();


    $sql =  "UPDATE categorias SET nombre=:nombre WHERE idCategorias=:idCategorias";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':idCategorias', $idCategorias, PDO::PARAM_STR);
    $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
    $stmt->execute();
    header("Location: ../../vista/agregarCategorias.php");
} else {
    echo $nombre;
    echo $idCategorias;
}
