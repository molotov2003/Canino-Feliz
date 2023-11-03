<?php
if (
    isset($_POST['idMascota']) && !empty($_POST['idMascota']) &&
    isset($_POST['nombre']) && !empty($_POST['nombre']) &&
    isset($_POST['tipoMascota']) && !empty($_POST['tipoMascota']) &&
    isset($_POST['Raza']) && !empty($_POST['Raza']) &&
    isset($_POST['requisitoEspecial']) && !empty($_POST['requisitoEspecial'])
) {
    $idMascota = $_POST['idMascota'];
    $nombre = $_POST['nombre'];
    $tipo = $_POST['tipoMascota'];
    $raza = $_POST['Raza'];
    $requisito = $_POST['requisitoEspecial'];

    include("../modelo/MySQL.php");
    $conexion = new MySQL();
    $pdo = $conexion->conectar();

    // Consulta preparada para evitar inyección de SQL
    $sql = "UPDATE mascotas set nombre=:nombre, tipoMascota=:tipoMascota, Raza=:Raza, requisitoEspecial=:requisitoEspecial where idMascotas = :idMascotas";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':idMascotas', $idMascota, PDO::PARAM_STR);
    $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
    $stmt->bindParam(':tipoMascota', $tipo, PDO::PARAM_STR);
    $stmt->bindParam(':Raza', $raza, PDO::PARAM_STR);
    $stmt->bindParam(':requisitoEspecial', $requisito, PDO::PARAM_STR);
    $stmt->execute();

    header("Location: ../vista/lsitarMascotas.php");
} else {
    echo "fin";
    echo $_POST['idMascota'];
    echo $_POST['nombre'];
    echo $_POST['tipoMascota'];
    echo $_POST['Raza'];
    echo $_POST['requisitoEspecial'];
}
