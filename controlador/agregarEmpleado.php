<?php
session_start();
//controla el inicio de sesion
if (
    isset($_POST['idEmpleados']) && !empty($_POST['idEmpleados'] ) &&
    isset($_POST['nombre']) && !empty($_POST['nombre']) &&
    isset($_POST['apellido']) && !empty($_POST['apellido']) &&
    isset($_POST['telefono']) && !empty($_POST['telefono']) &&
    isset($_POST['password']) && !empty($_POST['password']) &&
    isset($_POST['rol']) && !empty($_POST['rol'])

) {
    //se hace llamado del modelo de conexion y consultas 
    
    //se capturan las variables que vienen desde el formulario

    $idEmpleados = $_POST['idEmpleados'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $telefono = $_POST['telefono'];
    $rol = $_POST['rol'];
    $password =  base64_encode($_POST['password']);

    $clave  = 'Una cadena, muy, muy larga para mejorar la encriptacion';
    //Metodo de encriptaciÃ³n
    $method = 'aes-256-cbc';

    $iv = base64_decode("C9fBxl1EWtYTL1/M8jfstw==");

    $encriptar = function ($password) use ($method, $clave, $iv) {
        return openssl_encrypt($password, $method, $clave, false, $iv);
    };
   



    include("../modelo/MySQL.php");
    $conexion = new MySQL();
    $pdo = $conexion->conectar();


    $sql = "SELECT * FROM empleados WHERE idEmpleados=:idEmpleados";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':idEmpleados', $idEmpleados, PDO::PARAM_STR);
    $stmt->execute();
    if($stmt->rowCount() > 0 ){
        
        $_SESSION['icono'] = "error";
        $_SESSION['titulo'] = "Ya existe un empleado con esa cedula";
        $_SESSION['mensaje'] = "Error al Agregar";
        header("Location: ../vista/agregarEmpleado.php");
    }else{
        $sql = "INSERT INTO empleados (idEmpleados,nombre,apellido,telefono,password,rol) VALUES (:idEmpleados,:nombre,:apellido,:telefono,:password,:rol)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':idEmpleados', $idEmpleados, PDO::PARAM_STR);
        $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $stmt->bindParam(':apellido', $apellido, PDO::PARAM_STR);
        $stmt->bindParam(':telefono', $telefono, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);
        $stmt->bindParam(':rol', $rol, PDO::PARAM_INT);
        $stmt->execute();
        $_SESSION['icono'] =  "success";
        $_SESSION['titulo']="Insercion Realizada";
        $_SESSION['mensaje']="Empleado Correctamente";
        header("Location: ../vista/agregarEmpleado.php");
    }
        
}else{
   echo "error";
    header("Location: ../vista/agregarEmpleado.php");
}

