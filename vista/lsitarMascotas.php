<?php
session_start();
if ($_SESSION['session'] == true) {
    $nombreEmpleado = $_SESSION['nombre'];
    $idEmpleado = $_SESSION['idEmpleados'];
    include("../modelo/MySQL.php");
    $conexion = new MySQL();
    $pdo = $conexion->conectar();

    $sql = "SELECT mascotas.idMascotas, mascotas.nombre, mascotas.tipoMascota, mascotas.Raza, mascotas.requisitoEspecial, clientes.nombre AS nombrePer, clientes.cedula
FROM mascotas INNER JOIN clientes INNER JOIN clientes_has_mascotas 
WHERE mascotas.idMascotas = clientes_has_mascotas.Mascotas_idMascotas AND clientes.cedula = clientes_has_mascotas.Clientes_cedula";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $fila = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $sql2 = "SELECT * FROM clientes";
    $stmt2 = $pdo->prepare($sql2);
    $stmt2->execute();
    $fila2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);


?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Peluqueria el Canino Feliz</title>
        <!-- links datatable -->
        <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
        <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
        <!-- Fin links datatable -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
        <!-- Favicon -->
        <link rel="shortcut icon" href="../img/svg/logo.svg" type="image/x-icon" />
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
                                <form action="" method="post">
                                    <i data-feather="search" aria-hidden="true"></i>
                                    <input type="text" placeholder="Buscar Mascota" required />
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
                <!-- sweet alert -->
                <?php
                if (isset($_SESSION['mensaje'])) {
                ?>
                    <script>
                        let msj = '<?php echo $_SESSION['mensaje'] ?>'
                        let titulo = '<?php echo $_SESSION['mensaje2'] ?>'
                        Swal.fire(
                            titulo,
                            msj,
                            'success'
                        )
                    </script>
                <?php
                    unset($_SESSION['mensaje']);
                }
                ?>

                <?php
                if (isset($_SESSION['mensajeErr'])) {
                ?>
                    <script>
                        let msj = '<?php echo $_SESSION['mensajeErr2'] ?>'
                        let titulo = '<?php echo $_SESSION['mensajeErr'] ?>'
                        Swal.fire(
                            titulo,
                            msj,
                            'success'
                        )
                    </script>
                <?php
                    unset($_SESSION['mensajeErr']);
                }
                ?>
                <!-- ! Main -->
                <main class="main users chart-page" id="skip-target">
                    <div class="container">
                        <button type="button" onclick="borrar()" class="btn btn-info mb-5" data-bs-toggle="modal" data-bs-target="#exampleModal"> <i class="bi bi-plus-circle-dotted"></i> </button>

                        <table class="table table-striped" id="tableMascotas">
                            <thead>
                                <tr>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Tipo de Mascota</th>
                                    <th scope="col">Raza</th>
                                    <th scope="col">Requisito Especial</th>
                                    <th scope="col">Dueño</th>
                                    <th scope="col">Cedula</th>
                                    <th scope="col">Editar</th>
                                    <th scope="col">Eliminar</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                foreach ($fila as $datos) {
                                ?>
                                    <tr>
                                        <td><?php echo $datos['nombre'] ?></td>
                                        <td><?php echo $datos['tipoMascota'] ?></td>
                                        <td><?php echo $datos['Raza'] ?></td>
                                        <td><?php echo $datos['requisitoEspecial'] ?></td>
                                        <td><?php echo $datos['nombrePer'] ?></td>
                                        <td><?php echo $datos['cedula'] ?></td>
                                        <td><a href="../vista/editarMascota.php?id=<?php echo $datos['idMascotas'] ?>" class="btn btn-primary "><i class="bi bi-pencil-square"></i></a></td>
                                        <td><a href="../controlador/eliminarMascota.php?id=<?php echo $datos['idMascotas'] ?>" class="btn btn-danger"><i class="bi bi-trash-fill"></i></a></td>
                                    </tr>

                                <?php
                                }

                                ?>
                            </tbody>
                        </table>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Registrar Mascota</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="../controlador/registroMascota.php" method="post">
                                        <div class="modal-body">

                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control border-secondary" name="nombre" id="nombre" placeholder="name@example.com" required>
                                                <label for="floatingInput">Nombre</label>
                                            </div>

                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control border-secondary" name="tipo" id="tipo" placeholder="name@example.com" required>
                                                <label for="floatingInput">Tipo de Mascota</label>
                                            </div>

                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control border-secondary" name="raza" id="raza" placeholder="name@example.com" required>
                                                <label for="floatingInput">Raza</label>
                                            </div>

                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control border-secondary" name="requisito" id="requisito" placeholder="name@example.com" required>
                                                <label for="floatingInput">Requisito Especial</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <select class="form-select form-select-lg mb-3 border-secondary" aria-label="Large select example" name="cliente" required>
                                                    <?php
                                                    foreach ($fila2 as $datos2) {
                                                    ?>
                                                        <option value="<?php echo $datos2['cedula'] ?>"> <?php echo $datos2['nombre'] . " " . $datos2['apellido'] ?> </option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                                <label for="floatingInput">Cliente</label>
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                            <button type="submit" class="btn btn-primary">Registrar Cliente</button>
                                        </div>
                                    </form>
                                </div>
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
            new DataTable('#tableMascotas');

            function onlyNumberKey(evt) {

                // Only ASCII character in that range allowed
                var ASCIICode = (evt.which) ? evt.which : evt.keyCode
                if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
                    return false;
                return true;
            }

            function borrar() {
                document.getElementById("cedula").value = "";
                document.getElementById("nombre").value = "";
                document.getElementById("apellido").value = "";
                document.getElementById("telefono").value = "";
                document.getElementById("direccion").value = "";
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