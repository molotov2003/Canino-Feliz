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
                    <div class="row">
                        <div class="col-12 text-center">
                            <h1 class="text-center fw-bold">
                                USUARIO
                            </h1>
                            <div class="input-group mt-5">
                                <span class="input-group-text">Cedula</span>
                                <input type="text" id="cedula" name="cedula" aria-label="First name" class="form-control">
                                <input type="text" class="form-control" placeholder="Nombre" name="nombreClien" id="nombreClien" aria-label="Recipient's username" aria-describedby="button-addon2" readonly>
                                <button class="btn btn-outline-primary" type="button" id="btnBuscarCliente">Buscar</button>
                            </div>

                            <div class="input-group mt-5">
                                <span class="input-group-text">Codigo Producto</span>
                                <input type="number" id="codProd" name="codProd" aria-label="First name" class="form-control">
                                <button class="btn btn-outline-primary" type="button" id="buscarProd" name="buscarProd">Buscar</button>
                            </div>
                            <div class="input-group mt-2">
                                <span class="input-group-text">Nombre </span>
                                <input type="text" aria-label="First name" class="form-control" name="nombreProd" id="nombreProd" readonly>
                            </div>
                            <div class="input-group mt-2">
                                <span class="input-group-text">Precio </span>
                                <input type="text" aria-label="First name" class="form-control" name="precioProd" id="precioProd" readonly>
                            </div>
                            <div class="input-group mt-2">
                                <span class="input-group-text">Cantidad</span>
                                <input type="number" aria-label="First name" class="form-control" name="cantidadProd" id="cantidadProd">
                            </div>
                            <div class="input-group mt-2">
                                <span class="input-group-text">Total</span>
                                <input type="number" aria-label="First name" class="form-control" name="totalProd" id="totalProd">
                            </div>
                            <h1 class="text-center mt-5 mb-5">
                                <button type="button" id="AgregarProd" name="AgregarProd" class="btn btn-primary">Agregar</button>
                            </h1>
                        </div>
                        <div class="col-12">
                            <h1 class="text-center fw-bold">
                                PRODUCTOS
                            </h1>
                            <table class="table mt-5 text-center" id="tabla">
                                <thead class="table-primary">
                                    <tr>
                                        <th scope="col">Codigo</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Precio</th>
                                        <th scope="col">Cantidad</th>
                                        <th scope="col">Eliminar</th>
                                        <th scope="col">Editar</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                            <h2 class="mt-4">Total: <span id="total"></span></h2>
                            <h1 class="text-center mt-5">
                                <button type="button" id="guardar" name="guardar" class="btn btn-primary">Guardar Compra</button>
                            </h1>
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


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <!-- Chart library -->
    <script src="../plugins/chart.min.js"></script>
    <!-- Icons library -->
    <script src="../plugins/feather.min.js"></script>
    <!-- Custom scripts -->
    <script src="../js/script.js"></script>
    <script src="../controlador/prueba.js"></script>

</body>

</html>