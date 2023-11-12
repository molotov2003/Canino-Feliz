<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="./images2/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="./vendor2/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="./fonts2/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="./fonts2/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="./vendor2/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="./vendor2/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="./vendor2/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="./vendor2/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="./vendor2/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="./css2/util.css">
    <link rel="stylesheet" type="text/css" href="./css2/main.css">
    <!--===============================================================================================-->
</head>

<body>
    <?php
    if (isset($_SESSION['mensajeErr3'])) {
    ?>
        <script>
            let msj = '<?php echo $_SESSION['mensajeErr4'] ?>'
            let titulo = '<?php echo $_SESSION['mensajeErr3'] ?>'
            Swal.fire(
                titulo,
                msj,
                'error'
            )
        </script>
    <?php
        unset($_SESSION['mensajeErr3']);
    }
    ?>
    <div class="limiter">
        <div class="container-login100" style="background-image: url('images2/bg-01.jpg');">
            <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
                <form action="./controlador/Login.php" method="post" id="loginform" class="login100-form validate-form">
                    <span class="login100-form-title p-b-49">
                        Inicio
                    </span>
                    <img src="./images2/logoCanino.png" alt="">

                    <div class="wrap-input100 validate-input m-b-23" data-validate="Username is required">
                        <span class="label-input100">Cedula</span>
                        <input class="input100" type="text" name="idEmpleados" placeholder="Cedula">
                        <span class="focus-input100" data-symbol="&#xf206;"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <span class="label-input100">Contraseña</span>
                        <input class="input100" type="password" name="pass" placeholder="Contraseña">
                        <span class="focus-input100" data-symbol="&#xf190;"></span>
                    </div>



                    <div class="container-login100-form-btn mt-4">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button class="login100-form-btn">
                                Inicio
                            </button>
                        </div>
                    </div>


                </form>
            </div>
        </div>
    </div>


    <div id="dropDownSelect1"></div>

    <!--===============================================================================================-->
    <script src="./vendor2/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="./vendor2/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="./vendor2/bootstrap/js/popper.js"></script>
    <script src="./vendor2/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="./vendor2/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="./vendor2/daterangepicker/moment.min.js"></script>
    <script src="./vendor2/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
    <script src="./vendor2/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->
    <script src="./js2/main.js"></script>

</body>

</html>