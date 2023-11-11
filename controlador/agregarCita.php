<?php
session_start();
if (
    isset($_POST['precio']) && !empty($_POST['precio'])
) {
    // Se instancia la clase PDO para la conexión a la base de datos
    include("../modelo/MySQL.php");
    $conexion = new MySQL();
    $pdo = $conexion->conectar();

    // Se capturan las variables que vienen desde el formulario
    $idEmpleado = $_POST['nomEmpleado'];
    $cedula = $_POST['cedula'];
    $idMascota = $_POST['mascota'];
    $precio = $_POST['precio'];
    $fechaCita = $_POST['fechaCita'];


    $sql2 = "SELECT * FROM reservas where fecha = :fechaCita";
    $stmt2 = $pdo->prepare($sql2);
    $stmt2->bindParam(':fechaCita', $fechaCita, PDO::PARAM_STR);
    $stmt2->execute();
    if ($stmt2->rowCount() > 0) {
        $_SESSION['mensajeErr2'] = "Fecha y hora ya reservada";
        $_SESSION['mensajeErr'] = "Error";
        header("Location: ../vista/listarCitas.php");
    } else {
        $arregloServicio = $_POST['servicios'];
        $largoArreglo = count($arregloServicio);

        for ($i = 0; $i < $largoArreglo; $i++) {
            $arrayres = explode("/", $arregloServicio[$i]);
            $idservicio = $arrayres[0];
            $precio = $arrayres[1];
            $sql = "INSERT INTO reservas (fecha, Empleados_idEmpleados, Clientes_cedula, Servicios_idServicios, Mascotas_idMascotas, precio ) values (:fechaCita, :idEmpleado, :cedula, :servicio,:mascota, :precio)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':idEmpleado', $idEmpleado, PDO::PARAM_INT);
            $stmt->bindParam(':cedula', $cedula, PDO::PARAM_INT);
            $stmt->bindParam(':servicio', $idservicio, PDO::PARAM_STR);
            $stmt->bindParam(':mascota', $idMascota, PDO::PARAM_STR);
            $stmt->bindParam(':fechaCita', $fechaCita, PDO::PARAM_STR);
            $stmt->bindParam(':precio', $precio, PDO::PARAM_INT);
            $stmt->execute();
        }

        $_SESSION['mensaje2'] = "Felicidades";
        $_SESSION['mensaje'] = "Se ha agregado correctamente";
        header("Location: ../vista/listarCitas.php");
    }
} else {
    echo "fin";
}
