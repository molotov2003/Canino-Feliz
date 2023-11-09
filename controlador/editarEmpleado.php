<?php
if (
    isset($_POST['idEmpleados']) && !empty($_POST['idEmpleados'])
    && isset($_POST['nombre']) && !empty($_POST['nombre'])
    && isset($_POST['apellido']) && !empty($_POST['apellido'])
    && isset($_POST['telefono']) && !empty($_POST['telefono'])
    && isset($_POST['password']) && !empty($_POST['password'])
    && isset($_POST['rol']) && !empty($_POST['rol'])
) {
    $idEmpleados = $_POST['idEmpleados'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $telefono = $_POST['telefono'];
    $password = base64_encode($_POST['password']);
    $rol = $_POST['rol'];



    include("../modelo/MySQL.php");
    $conexion = new MySQL();
    $pdo = $conexion->conectar();

    $clave  = 'Una cadena, muy, muy larga para mejorar la encriptacion';
    //Metodo de encriptaciÃ³n
    $method = 'aes-256-cbc';

    $iv = base64_decode("C9fBxl1EWtYTL1/M8jfstw==");

    $encriptar = function ($password) use ($method, $clave, $iv) {
        return openssl_encrypt($password, $method, $clave, false, $iv);
    };
    
   
        // Consulta preparada para evitar inyección de SQL
        $sql = " UPDATE empleados SET  nombre=:nombre, apellido=:apellido, telefono=:telefono, password=:password, rol=:rol WHERE idEmpleados=:idEmpleados";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':idEmpleados', $idEmpleados, PDO  ::PARAM_STR);
        $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $stmt->bindParam(':apellido', $apellido, PDO::PARAM_STR);
        $stmt->bindParam(':telefono', $telefono, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);
        $stmt->bindParam(':rol', $rol, PDO::PARAM_STR);
        $stmt->execute();
        echo "EDITADO";
}else{
    echo $_POST['idEmpleados'];
    echo $_POST['nombre'];
    echo  $_POST['apellido'];
    echo $_POST['telefono'];
    echo $_POST['password'];
    echo $_POST['rol'];
    echo "fin";
}
        
        


