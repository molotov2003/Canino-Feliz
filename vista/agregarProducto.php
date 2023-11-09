<?php
//////////////////////////////////
session_start();

include('../modelo/MySQL.php');
$conexion = new MySQL();
$pdo = $conexion->conectar();
// traigo el usuario
$idEmpleados = new MySQL();

//traigo los productos
$sql = "SELECT * FROM `productos`";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$fila = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($_SESSION['session'] == true) {
    $conexion = new MySQL();
    $pdo = $conexion->conectar();
    $sql = "SELECT idEmpleados FROM empleados WHERE idEmpleados=:idEmpleados";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':idEmpleados', $user, PDO::PARAM_STR);
    $stmt->execute();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Peluqueria el Canino Feliz</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="../img/svg/logo.svg" type="image/x-icon" />
    <!-- Custom styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../css/style.min.css" />



    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
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
                            <a class="show-cat-btn" href="##">
                                <span class="icon document" aria-hidden="true"></span>Registro de Mascotas
                                <span class="category__btn transparent-btn" title="Open list">
                                    <span class="sr-only">Open list</span>
                                    <span class="icon arrow-down" aria-hidden="true"></span>
                                </span>
                            </a>
                            <ul class="cat-sub-menu">
                                <li>
                                    <a href="./lsitarMascotas.php">Listar Mascotas</a>
                                </li>
                                <li>
                                    <a href="./agregarMascotas.php">Agregar Mascotas</a>
                                </li>

                            </ul>
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
            <!-- ! Main -->
            <main class="main users chart-page" id="skip-target">
                <div class="container">

                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-plus-circle-dotted"></i></button>


                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar producto</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="../controlador/productos/AgregarProductos.php" method="post">
                                    <div class="modal-body">

                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control border-secondary" name="Idproducto" value="" id="Idproducto" placeholder="Id producto">
                                            <label for="floatingInput">Id</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control border-secondary" name="Nombreproducto" value="" id="Nombreproducto" placeholder="Nombre producto">
                                            <label for="floatingInput">Nombre producto</label>
                                        </div>
                                        <div class="form-floating mb-3 mt-3">
                                            <input type="number" class="form-control border-secondary" name="Existencia" id="Existencia" placeholder="existencia">
                                            <label for="floatingInput">Existencia</label>
                                        </div>
                                        <div class="form-floating mb-3 mt-3">
                                            <input type="number" class="form-control border-secondary" name="Precio" id="Precio" placeholder="Precio">
                                            <label for="floatingInput">Precio</label>
                                        </div>
                                       
                                        <div class="form-floating mb-3 mt-2">
                                            <input type="number" class="form-control border-secondary" name="Idcategoria" id="Idcategoria" placeholder="Idcategoria">
                                            <label for="floatingInput">Id Categoria</label>
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                        <button type="submit" class="btn btn-primary">Agendar producto</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid">
                        <div class="row">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Nombre </th>
                                        <th scope="col">Existencia</th>
                                        <th scope="col">Precio</th>
                                       
                                        <th scope="col">Eliminar</th>
                                        <th scope="col">Editar</th>
                                    </tr>
                                </thead>
                                <?php foreach ($fila as $productos) { ?>

                                    <tbody>
                                        <tr>
                                            <th scope="row"><?php echo $productos['idProductos']  ?></th>
                                            <td><?php echo $productos['nombre']  ?></td>
                                            <td><?php echo $productos['existencia']  ?></td>
                                            <td><?php echo $productos['precio']  ?></td>
                                           
                                            <td><a class="btn btn-danger" href="../controlador/productos/Eliminarproductos.php?idProductos=<?php echo $productos['idProductos'] ?>" class="card-link me-5 fw-bold fs-3"><i class="bi bi-trash3-fill"></i></a></td>


                                            <td><a class="btn btn-primary" href="../vista/Editarproducto.php?idProductos=<?php echo $productos['idProductos']  ?>" class="card-link me-5 fw-bold fs-3"><i class="bi bi-pencil-square"></i></a></td>
                                        </tr>

                                    </tbody>

                                <?php } ?>
                            </table>
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
    <!-- Chart library -->
    <script src="../plugins/chart.min.js"></script>
    <!-- Icons library -->
    <script src="../plugins/feather.min.js"></script>
    <!-- Custom scripts -->
    <script src="../js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
<?php
} else {
    header("Location: ../index.php");
}
?>