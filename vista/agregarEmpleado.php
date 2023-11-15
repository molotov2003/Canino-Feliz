<?php
session_start();


if ($_SESSION['session'] == true) {
    include("../modelo/MySQL.php");
    $conexion = new MySQL();
    $pdo = $conexion->conectar();
    $sql = "SELECT * FROM empleados";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $fila = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $nombreEmpleado = $_SESSION['nombre'];
    $idEmpleado = $_SESSION['idEmpleados'];
?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Peluqueria el Canino Feliz</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <!-- Favicon -->
        <link rel="shortcut icon" href="../img/svg/logo.svg" type="image/x-icon" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
        <!-- Custom styles -->
        <link rel="stylesheet" href="../css/style.min.css" />
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
                                <a href="./listarCitas.php"> <span class="icon menu-toggle" aria-hidden="true"></span>
                                    Listar Citas</a>
                                </a>
                            </li>
                            <li>
                                <a href="./agregarServicio.php">
                                    <span class="icon message" aria-hidden="true"></span>
                                    Gestión de Servicios
                                </a>
                            </li>
                            <li>
                                <a href="./registroCliente.php">
                                    <span class="icon edit" aria-hidden="true"></span>
                                    Registro de Clientes
                                </a>
                            </li>
                            <li>
                                <a href="./lsitarMascotas.php">
                                    <span class="icon edit" aria-hidden="true"></span>
                                    Registro de Mascotas
                                </a>
                            </li>
                            <li>
                                <a href="./agregarEmpleado.php">
                                    <span class="icon edit" aria-hidden="true"></span>
                                    Registro de Empleados
                                </a>
                            </li>
                            <li>
                                <a class="show-cat-btn" href="##">
                                    <span class="icon folder" aria-hidden="true"></span> Inventario
                                    <span class="category__btn transparent-btn" title="Open list">
                                        <span class="sr-only">Open list</span>
                                        <span class="icon arrow-down" aria-hidden="true"></span>
                                    </span>
                                </a>
                                <ul class="cat-sub-menu">
                                    <li>
                                        <a href="./agregarCategorias.php">Ver Categoria</a>
                                        <a href="./agregarProducto.php">Ver Producto</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a class="show-cat-btn" href="##">
                                    <span class="icon category" aria-hidden="true"></span>Venta de Productos
                                    <span class="category__btn transparent-btn" title="Open list">
                                        <span class="sr-only">Open list</span>
                                        <span class="icon arrow-down" aria-hidden="true"></span>
                                    </span>
                                </a>
                                <ul class="cat-sub-menu">
                                    <li>
                                        <a href="./agregarventa.php">Agregar Venta de Productos</a>
                                    </li>
                                    <li>
                                        <a href="./verVentas.php">Listar Venta de Productos</a>
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
                                <img src="../img/avatar/avatar-illustrated-03.png" alt="User name" />
                            </picture>
                        </span>
                        <div class="sidebar-user-info">
                            <span class="sidebar-user__title"><?php echo $nombreEmpleado ?></span>

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
                                <i data-feather="search" aria-hidden="true"></i>
                                <input type="text" placeholder="Enter keywords ..." required />
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
                                <button class="nav-user-btn dropdown-btn" title="My profile" type="button">
                                    <span class="sr-only">My perfil</span>
                                    <span class="nav-user-img">
                                        <picture>
                                            <img src="../img/logoCanino.png" alt="User name" />
                                        </picture>
                                    </span>
                                </button>
                                <ul class="users-item-dropdown nav-user-dropdown dropdown">
                                    <li>
                                        <a class="danger" href="../controlador/cerrar.php">
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
                if (isset($_SESSION['mensaje'])) {
                ?>
                    <script>
                        Swal.fire({
                            icon: "<?php echo $_SESSION['icono'] ?>",
                            title: "<?php echo $_SESSION['titulo'] ?>",
                            text: "<?php echo $_SESSION['mensaje'] ?>",
                        });
                    </script>
                <?php
                }
                unset($_SESSION['mensaje']);
                unset($_SESSION['titulo']);
                unset($_SESSION['icono']);
                ?>
                <!-- ! Main -->
                <main class="main users chart-page" id="skip-target">

                    <div class="container">

                        <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="borrar()"><i class="bi bi-plus-circle-dotted"></i></button>

                        <div class="row">
                            <div class="col-12 mt-3">
                                <table class="table">
                                    <thead class="table-primary">
                                        <tr>
                                            <th scope="col">Cedula</th>
                                            <th scope="col">Nombre</th>
                                            <th scope="col">Apellido</th>
                                            <th scope="col">Telefono</th>
                                            <th scope="col">Password</th>
                                            <th scope="col">Rol</th>
                                            <th scope="col">Editar</th>
                                            <th scope="col">Eliminar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($fila as $datos) {
                                        ?>
                                            <tr>
                                                <td><?php echo $datos['idEmpleados'] ?></td>
                                                <td><?php echo $datos['nombre'] ?></td>
                                                <td><?php echo $datos['apellido'] ?></td>
                                                <td><?php echo $datos['telefono'] ?></td>
                                                <td><?php echo $datos['password'] ?></td>
                                                <td><?php echo $datos['rol'] ?></td>
                                                <td><a href="../vista/editarEmpleado.php?id=<?php echo $datos['idEmpleados'] ?>" class="btn btn-primary "><i class="bi bi-pencil-square"></i></a></td>
                                                <td> <a href="../controlador/eliminarEmpleado.php?id=<?php echo $datos['idEmpleados'] ?>" class="btn btn-danger"><i class="bi bi-trash-fill"></i></a></td>


                                            </tr>
                                        <?php
                                        }
                                        ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                    <!-- Modal -->
                    <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Empleado</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="../controlador/agregarEmpleado.php" method="post">
                                    <div class="modal-body">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control border-secondary" id="idEmpleados" name="idEmpleados" placeholder="empleados">
                                            <label for="floatingInput">Cedula</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control border-secondary" id="nombre" name="nombre" placeholder="empleados">
                                            <label for="floatingInput">Nombre del Empleado</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control border-secondary" id="apellido" name="apellido" placeholder="empleados">
                                            <label for="floatingInput">Apellido del Empleado</label>

                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control border-secondary" id="telefono" name="telefono" placeholder="empleados">
                                            <label for="floatingInput">Telefono</label>

                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="password" class="form-control border-secondary" id="password" name="password" placeholder="empleados">
                                            <label for="floatingInput">Contraseña</label>

                                        </div>
                                        <label for="rol" class="ms-2">Seleccione el Rol</label>
                                        <select class="form-select form-select-lg mb-3 border-secondary" aria-label="Large select example" name="rol">
                                            <option value="0">Administrador</option>
                                            <option value="1">Empleado</option>
                                        </select>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                        <button type="submit" class="btn btn-primary">Agregar Empleado</button>
                                    </div>
                                </form>
                            </div>
                        </div>
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
        <script>
            function borrar() {
                document.getElementById("idEmpleados").value = "";
                document.getElementById("nombre").value = "";
                document.getElementById("apellido").value = "";
                document.getElementById("telefono").value = "";
                document.getElementById("password").value = "";
                document.getElementById("rol").value = "";

            }

            function onlyNumberKey(evt) {

                // Only ASCII character in that range allowed
                var ASCIICode = (evt.which) ? evt.which : evt.keyCode
                if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
                    return false;
                return true;
            }
        </script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <!-- Chart library -->
        <script src="../plugins/chart.min.js"></script>
        <!-- Icons library -->
        <script src="../plugins/feather.min.js"></script>
        <!-- Custom scripts -->
        <script src="../js/script.js"></script>
    </body>

    </html>
<?php
} else {
    header('Location: ../index.php');
}
?>