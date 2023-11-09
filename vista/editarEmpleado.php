<?php
include("../modelo/MySQL.php");
$conexion = new MySQL();
$pdo = $conexion->conectar();

$idEmpleados = $_GET['id'];

$sql = "SELECT * FROM empleados where idEmpleados = :idEmpleados";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':idEmpleados', $idEmpleados, PDO::PARAM_STR);
$stmt->execute();
$fila = $stmt->fetch(PDO::FETCH_ASSOC);

$desencriptar = function ($valor) {
    $clave = 'Una cadena, muy, muy larga para mejorar la encriptacion';
    //Metodo de encriptaciÃ³n
    $method = 'aes-256-cbc';
    // Puedes generar una diferente usando la funcion $getIV()
    $iv = base64_decode("C9fBxl1EWtYTL1/M8jfstw==");
    return base64_decode(openssl_decrypt($valor, $method, $clave, false, $iv));
};
$contra = $fila['password'];
$desencriptarpass = $desencriptar($contra);
$des = base64_decode($contra);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Peluqueria el Canino Feliz</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- Favicon -->
    <link rel="shortcut icon" href="../img/svg/logo.svg" type="image/x-icon" />
    <!-- Custom styles -->
    <link rel="stylesheet" href="../css/style.min.css" />
</head>

<body>
    <div class="layer"></div>
    <!-- ! Body -->
    <a class="skip-link sr-only" href="#skip-target">sd</a>
    <div class="page-flex">
        <!-- ! Sidebar -->
        <aside class="sidebar">
            <div class="sidebar-start">
                <div class="sidebar-head">
                    <a href="/" class="logo-wrapper" title="Home">

                        <img src="../images2/logoCanino.png " alt="" width="75%">

                    </a>
                    <button class="sidebar-toggle transparent-btn" title="Menu" type="button">
                        <span class="sr-only">Toggle menu</span>
                        <span class="icon menu-toggle" aria-hidden="true"></span>
                    </button>
                </div>
                <div class="sidebar-body">
                    <ul class="sidebar-body-menu">
                        <li>
                            <a class="show-cat-btn" href="##">
                                <span class="icon folder" aria-hidden="true"></span>Gestión de Citas
                                <span class="category__btn transparent-btn" title="Open list">
                                    <span class="sr-only">Open list</span>
                                    <span class="icon arrow-down" aria-hidden="true"></span>
                                </span>
                            </a>
                            <ul class="cat-sub-menu">
                                <li>
                                    <a href="./listarCitas.php">Listar Citas</a>
                                </li>
                                <li>
                                    <a href="./agregarCitas.php">Agregar Cita</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="./registroCliente.php">
                                <span class="icon message" aria-hidden="true"></span>
                                Registro de Clientes
                            </a>

                        </li>
                        <li>
                            <a href="./lsitarMascotas.php">
                                <span class="icon document" aria-hidden="true"></span>Registro de Mascotas
                            </a>

                        </li>
                        <li>
                            <a class="show-cat-btn" href="##">
                                <span class="icon document" aria-hidden="true"></span>Gestion Empleados
                                <span class="category__btn transparent-btn" title="Open list">
                                    <span class="sr-only">Open list</span>
                                    <span class="icon arrow-down" aria-hidden="true"></span>
                                </span>
                            </a>
                            <ul class="cat-sub-menu">
                                <li>
                                    <a href="./listarEmpleados.php">Listar Empleados</a>
                                </li>
                                <li>
                                    <a href="./agregarEmpleado.php">Agregar Empleado</a>
                                </li>

                            </ul>
                        </li>
                        <li>
                            <a class="show-cat-btn" href="##">
                                <span class="icon folder" aria-hidden="true"></span> Inventario de Productos
                                <span class="category__btn transparent-btn" title="Open list">
                                    <span class="sr-only">Open list</span>
                                    <span class="icon arrow-down" aria-hidden="true"></span>
                                </span>
                            </a>
                            <ul class="cat-sub-menu">
                                <li>
                                    <a href="./listarProducto.php">Listar Productos</a>
                                </li>
                                <li>
                                    <a href="./agregarProducto.php">Agregar Producto</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a class="show-cat-btn" href="##">
                                <span class="icon image" aria-hidden="true"></span>Venta de Productos
                                <span class="category__btn transparent-btn" title="Open list">
                                    <span class="sr-only">Open list</span>
                                    <span class="icon arrow-down" aria-hidden="true"></span>
                                </span>
                            </a>
                            <ul class="cat-sub-menu">
                                <li>
                                    <a href="./agregarventa.php">Agregar Venta de Productos</a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a href="./informesyestadisticas.php">
                                <span class="icon message" aria-hidden="true"></span>
                                Informes y Estadisticas
                            </a>

                        </li>
                    </ul>


                </div>
            </div>
            <div class="sidebar-footer">
                <a href="##" class="sidebar-user">
                    <span class="sidebar-user-img">
                        <picture>
                            <source srcset="./img/avatar/avatar-illustrated-01.webp" type="image/webp" />
                            <img src="./img/avatar/avatar-illustrated-01.png" alt="User name" />
                        </picture>
                    </span>
                    <div class="sidebar-user-info">
                        <span class="sidebar-user__title">Admin</span>

                    </div>
                </a>
            </div>
        </aside>
        <div class="main-wrapper">
            <!-- ! Main nav -->
            <nav class="main-nav--bg">
                <div class="container main-nav">
                    <div class="main-nav-start">
                        <div class="search-wrapper">
                            <form action="" method="post">
                                <i data-feather="search" aria-hidden="true"></i>
                                <input type="text" placeholder="Buscar Clientes" required />
                                <button class="btn btn-primary"> <i class="bi bi-search"></i> </button>
                            </form>
                        </div>
                    </div>
                    <div class="main-nav-end">
                        <button class="sidebar-toggle transparent-btn" title="Menu" type="button">
                            <span class="sr-only">Toggle menu</span>
                            <span class="icon menu-toggle--gray" aria-hidden="true"></span>
                        </button>

                        <button class="theme-switcher gray-circle-btn" type="button" title="Switch theme">
                            <span class="sr-only">Switch theme</span>
                            <i class="sun-icon" data-feather="sun" aria-hidden="true"></i>
                            <i class="moon-icon" data-feather="moon" aria-hidden="true"></i>
                        </button>

                        <div class="nav-user-wrapper">
                            <button href="##" class="nav-user-btn dropdown-btn" title="My profile" type="button">
                                <span class="sr-only">My perfil</span>
                                <span class="nav-user-img">
                                    <picture>
                                        <source srcset="./img/avatar/avatar-illustrated-02.webp" type="image/webp" />
                                        <img src="./img/avatar/avatar-illustrated-02.png" alt="User name" />
                                    </picture>
                                </span>
                            </button>
                            <ul class="users-item-dropdown nav-user-dropdown dropdown">
                                <li>
                                    <a href="##">
                                        <i data-feather="user" aria-hidden="true"></i>
                                        <span>Admin</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="danger" href="##">
                                        <i data-feather="log-out" aria-hidden="true"></i>
                                        <span>Cerrar</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
            <?php
            if(isset($_SESSION['icono'])){
             ?>
             <script>
                Swal.fire({
                    icon: "<?php echo $_SESSION['icono']?>",
                    title: "<?php echo $_SESSION['titulo']?>",
                    text: "<?php echo $_SESSION['mensaje']?>",
                });
             </script>
             <?php   
            }
            unset($_SESSION['icono']);
            ?>
            <!-- ! Main -->
            <main class="main users chart-page" id="skip-target">
                <div class="container text-center">

                    <form action="../controlador/editarEmpleado.php" method="post">

                        <h2 class="mb-5">Editar Empleado</h2>

                        <input hidden type="text" class="form-control border-secondary" name="idEmpleados" value="<?php echo $idEmpleados ?>">

                        <div class="form-floating mb-3">
                            <input disabled type="text" class="form-control border-secondary" value="<?php echo $idEmpleados ?>">
                            <label for="floatingInput">Identificación Empleado</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control border-secondary" name="nombre" placeholder="name@example.com" value="<?php echo $fila['nombre'] ?>">
                            <label for="floatingInput">Nombre</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control border-secondary" name="apellido" value="<?php echo $fila['apellido'] ?>">
                            <label for="floatingInput">apellido</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control border-secondary" name="telefono" placeholder="name@example.com" value="<?php echo $fila['telefono'] ?>">
                            <label for="floatingInput">telefono</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control border-secondary" name="password" placeholder="name@example.com" value="<?php echo  $des ?>">
                            <label for="floatingInput">contraseña</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control border-secondary" name="rol" placeholder="name@example.com" value="<?php echo $fila['rol'] ?>">
                            <label for="floatingInput">rol</label>
                        </div>

                        <button type="submit" class="btn btn-primary mt-4">Editar Empleado</button>

                    </form>

                </div>



            </main>
            <!-- ! Footer -->
            <footer class="footer">
                <div class="container footer--flex">
                    <div class="footer-start">
                        <p>
                            2023 © Peluqueria el Canino Feliz-
                        </p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <!-- Chart library -->
    <script src="../plugins/chart.min.js"></script>
    <!-- Icons library -->
    <script src="../plugins/feather.min.js"></script>
    <!-- Custom scripts -->
    <script src="../js/script.js"></script>
</body>

</html>