
<?php

session_start();
if (
    isset($_POST['idCategoria']) && !empty($_POST['idCategoria'])

) {
    //Se llaman las variables del formulario
    $idCategorias = $_POST['idCategoria'];
    $nombre = $_POST['nombre'];
    include('../../modelo/MySQL.php');
    $conexion = new MySQL();
    $pdo = $conexion->conectar();
   
    //Se actualiza la categoria
    $sql =  "UPDATE categorias SET nombre=:nombre WHERE idCategorias=:idCategorias";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':idCategorias', $idCategorias, PDO::PARAM_STR);
    $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
    $stmt->execute();
    header("Location: ../../vista/agregarCategorias.php");
    $_SESSION['mensajeErr2'] = "Se ha editado correctamente";
    $_SESSION['mensajeErr'] = "Felicidades";
} else {
    echo $nombre;
    echo $idCategorias;
}
