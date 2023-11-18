<?php
session_start();
if ($_SESSION['session'] == true) {
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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="shortcut icon" href="../img/svg/logo.svg" type="image/x-icon" />
        <!-- Custom styles -->
        <link rel="stylesheet" href="../css/style.min.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
                <!-- ! Main -->
                <main class="main users chart-page" id="skip-target">
                    <div class="container">
                        <div class="row">
                            <h1 class="text-center">
                                <div class="alert alert-primary fw-bold" role="alert">
                                    REPORTES
                                </div>
                            </h1>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="col-12">
                                    <h3 class="fw-bold text-center">REPORTE DE VENTAS</h3>
                                </div>
                                <canvas id="graficoVentas">

                                </canvas>
                            </div>
                            <div class="col-6">
                                <div class="col-12">
                                    <h3 class="fw-bold text-center">REPORTE DE SERVICIOS</h3>
                                </div>
                                <canvas id="graficoServicios"></canvas>
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col-3 mt-5"></div>
                            <div class="col-6 mt-5">
                                <div class="card text-center">
                                    <div class="card-header">
                                        Reporte General
                                    </div>
                                    <div class="card-body">
                                        <h2 class="card-title">General</h2>
                                        <h5 class="card-text">Aca puedes sacar un reporte General de Ventas y Reservas</h5>
                                        <a href="../controlador/reporteGeneral.php" class="btn btn-primary mt-4 mb-3"><i class="bi bi-download"></i></a>
                                    </div>
                                    <div class="card-footer text-body-secondary">
                                        CANINO FELIZ
                                    </div>
                                </div>
                            </div>
                            <div class="col-3"></div>
                        </div>


                    </div>
                </main>
                <script>
                    ////VENTAS
                    var xhr = new XMLHttpRequest();
                    xhr.open("GET", "../controlador/graficaVentas.php", true);
                    let NombreProds = [];
                    let CantidadProds = [];
                    xhr.onreadystatechange = function() {
                        if (xhr.readyState == 4 && xhr.status == 200) {
                            var response = JSON.parse(xhr.responseText);
                            for (let index = 0; index < response.length; index++) {
                                NombreProds.push(response[index].NombreProducto.toUpperCase())
                                CantidadProds.push(response[index].TotalVendido)
                            }
                            crearGraficoVentas()
                        }
                    };

                    xhr.send();

                    function crearGraficoVentas() {
                        const ctx = document.getElementById('graficoVentas');

                        new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels: NombreProds,
                                datasets: [{
                                    label: 'Cantidad Vendida',
                                    data: CantidadProds,
                                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                    borderColor: 'rgba(75, 192, 192, 1)',
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                scales: {
                                    y: {
                                        beginAtZero: true
                                    }
                                }
                            }
                        });
                    }

                    var xhr2 = new XMLHttpRequest();

                    xhr2.open("GET", "../controlador/graficaServicios.php", true);
                    let NombreServ = [];
                    let CantidadServ = [];
                    xhr2.onreadystatechange = function() {
                        if (xhr2.readyState == 4 && xhr2.status == 200) {
                            var response2 = JSON.parse(xhr2.responseText);
                            console.log(response2)
                            for (let index = 0; index < response2.length; index++) {
                                NombreServ.push(response2[index].NombreServicio.toUpperCase())
                                CantidadServ.push(response2[index].Total)
                            }
                            crearGraficoServicios()
                        }
                    };

                    xhr2.send();
                    ///SEGUNDO GRAFICO

                    function crearGraficoServicios() {
                        const ctx2 = document.getElementById('graficoServicios');

                        new Chart(ctx2, {
                            type: 'bar',
                            data: {
                                labels: NombreServ,
                                datasets: [{
                                    label: 'Cantidad Adquirida',
                                    data: CantidadServ,
                                    backgroundColor: 'rgba(0, 192, 192, 0.2)',
                                    borderColor: 'rgba(0, 192, 192, 1)',
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                scales: {
                                    y: {
                                        beginAtZero: true
                                    }
                                }
                            }
                        });
                    }
                </script>
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
    header('Location: ../index.php');
}
?>