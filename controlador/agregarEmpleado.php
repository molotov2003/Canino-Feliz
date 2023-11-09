<?php
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
    require_once '../modelo/MySQL.php';
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
   



    try {
        $pdo = new PDO("mysql:host=localhost;dbname=caninofeliz", "root", "");
    } catch (PDOException $e) {
        die("Error de conexión a la base de datos: " . $e->getMessage());
    }
    $sql = "INSERT INTO empleados (idEmpleados,nombre,apellido,telefono,password,rol) VALUES (:idEmpleados,:nombre,:apellido,:telefono,:password,: rol)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':idEmpleados', $idEmpleados, PDO::PARAM_STR);
    $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
    $stmt->bindParam(':apellido', $apellido, PDO::PARAM_STR);
    $stmt->bindParam(':telefono', $telefono, PDO::PARAM_STR);
    $stmt->bindParam(':password', $password, PDO::PARAM_STR);
    $stmt->bindParam(':rol', $rol, PDO::PARAM_INT);
    $stmt->execute();
    echo $idEmpleados;
    echo $password;
    
}else{
    echo "fin";
}
