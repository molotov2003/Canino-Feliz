<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <?php
    if (isset($_SESSION['error2'])) {
    ?>
        <script>
            let msj = '<?php echo $_SESSION['error'] ?>'
            let titulo = '<?php echo $_SESSION['error2'] ?>'
            Swal.fire(
                titulo,
                msj,
                'error'
            )
        </script>
    <?php
        unset($_SESSION['error2']);
        unset($_SESSION['error']);
    }
    ?>
    <div class="limiter">
        <div class="container-login100" style="background-image: url('images2/bg-01.jpg');">
            <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">

                <form class="login100-form validate-form">
                    <span class="login100-form-title p-b-30">
                        Inicio
                    </span>
                    <img src="./images2/logoCanino.png" alt="" width="50%" class="img-fluid mx-auto d-block ">

                    <div class="wrap-input100 validate-input m-b-23" data-validate="Username is reauired">

                        <span class="label-input100">Cedula</span>
                        <input class="input100" type="text" name="idEmpleados" placeholder="Cedula">
                        <span class="focus-input100" data-symbol="&#xf206;"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <label for="idEmpleados">Contraseña</span>
                            <input class="input100" type="password" name="pass" placeholder="password">
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
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