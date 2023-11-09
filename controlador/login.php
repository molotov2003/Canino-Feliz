<?php
session_start();
if (isset($_POST['idEmpleados']) && !empty($_POST['idEmpleados']) 
    && isset($_POST['password']) && !empty($_POST['password'])) {
    $idEmpleados = $_POST['idEmpleados'];
    $password =  base64_encode($_POST['password']);;
    $encriptar = function ($valor) {
        $clave = 'andres';
        //Metodo de encriptaciÃ³n
        $method = 'aes-256-cbc';
        // Puedes generar una diferente usando la funcion $getIV()
        $iv = base64_decode("C9fBxl1EWtYTL1/M8jfstw==");
        return openssl_encrypt(base64_encode($valor), $method, $clave, false, $iv);
    };
    /*
     Desencripta el texto recibido
     */
    $desencriptar = function ($valor) {
        $clave = 'andres';
        //Metodo de encriptaciÃ³n
        $method = 'aes-256-cbc';
        // Puedes generar una diferente usando la funcion $getIV()
        $iv = base64_decode("C9fBxl1EWtYTL1/M8jfstw==");
        return base64_decode(openssl_decrypt($valor, $method, $clave, false, $iv));
    };
    $contraEncry = $encriptar($pass);

    include("../modelo/MySQL.php");
    $conexion = new MySQL();
    $pdo = $conexion->conectar();
    $sql = "SELECT * FROM empleados WHERE idEmpleados=:idEmpleados AND password=:password";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':idEmpleados', $idEmpleados, PDO::PARAM_STR);
    $stmt->bindParam(':password', $password, PDO::PARAM_STR);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        $fila = $stmt->fetch(PDO::FETCH_ASSOC);
        $_SESSION['idEmpleados'] = $fila['idEmpleados'];
        
        $_SESSION['session'] = true;
        header("Location:../html/.php");
    } else {
        $_SESSION['error'] = "Usuario o Contraseña Incorrecta Intente Nuevamente";
        $_SESSION['error2'] = "Error";
        header("Location: ../html/.php");
        echo $user, $pass;
    }
}
