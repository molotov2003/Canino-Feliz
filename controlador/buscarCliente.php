<?php
session_start();
if (
    isset($_POST['busqueda']) && !empty($_POST['busqueda']) 
) {
    $busqueda = $_POST['busqueda'];
    $busquedaFinal = "%$busqueda%";

    include("../modelo/MySQL.php");
    $conexion = new MySQL();
    $pdo = $conexion->conectar();

    // Consulta preparada para evitar inyección de SQL
    $sql = "SELECT * FROM mascotas WHERE nombre LIKE :busqueda";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':busqueda', $busquedaFinal, PDO::PARAM_STR);
    $stmt->execute();

    if ($stmt->rowCount() > 0){

        $_SESSION['mensaje2'] = "Felicidades";
        $_SESSION['mensaje'] = "El cliente Encontrado";
        header("Location: ../vista/registroCliente.php");

    }else{
        
        $_SESSION['mensajeError2'] = "Error";
        $_SESSION['mensajeError'] = "Cliente no encontrado";
        header("Location: ../vista/registroCliente.php");

    }

    
} else {
        $_SESSION['mensaje2'] = "Error";
        $_SESSION['mensaje'] = "Cliente no encontrado";
        header("Location: ../vista/registroCliente.php");
}
