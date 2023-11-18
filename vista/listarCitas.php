<?php

session_start();
if ($_SESSION['session'] == true) {
    include("../modelo/MySQL.php");
    $conexion = new MySQL();
    $pdo = $conexion->conectar();

    $id = 1;

    $sql = "SELECT * FROM servicios";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $fila = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $sql2 = "SELECT * FROM clientes";
    $stmt2 = $pdo->prepare($sql2);
    $stmt2->execute();
    $fila2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);



    $sql4 = "SELECT * FROM empleados";
    $stmt4 = $pdo->prepare($sql4);
    $stmt4->execute();
    $fila4 = $stmt4->fetchAll(PDO::FETCH_ASSOC);


$sql4 = "SELECT * FROM empleados";
$stmt4 = $pdo->prepare($sql4);
$stmt4->execute();
$fila4 = $stmt4->fetchAll(PDO::FETCH_ASSOC);


$sql5 = "SELECT reservas.idReservas, reservas.fecha, empleados.nombre AS nombre_empleado, clientes.nombre AS nombre_cliente, mascotas.nombre AS nombre_mascota, servicios.nombre AS nombre_servicio, servicios.precio AS precio_servicio FROM reservas INNER JOIN empleados ON reservas.Empleados_idEmpleados = empleados.idEmpleados INNER JOIN clientes ON reservas.Clientes_cedula = clientes.cedula INNER JOIN mascotas ON reservas.Mascotas_idMascotas = mascotas.idMascotas INNER JOIN servicios ON reservas.Servicios_idServicios = servicios.idServicios WHERE reservas.estado = 1; ";
$stmt5 = $pdo->prepare($sql5);
$stmt5->execute();
$fila5 = $stmt5->fetchAll(PDO::FETCH_ASSOC);


    $sql5 = "SELECT reservas.idReservas, reservas.fecha, empleados.nombre AS nombre_empleado, clientes.nombre AS nombre_cliente, mascotas.nombre AS nombre_mascota, servicios.nombre AS nombre_servicio, servicios.precio AS precio_servicio FROM reservas INNER JOIN empleados ON reservas.Empleados_idEmpleados = empleados.idEmpleados INNER JOIN clientes ON reservas.Clientes_cedula = clientes.cedula INNER JOIN mascotas ON reservas.Mascotas_idMascotas = mascotas.idMascotas INNER JOIN servicios ON reservas.Servicios_idServicios = servicios.idServicios; ";
    $stmt5 = $pdo->prepare($sql5);
    $stmt5->execute();
    $fila5 = $stmt5->fetchAll(PDO::FETCH_ASSOC);
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

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <!-- Custom styles -->
    <link rel="stylesheet" href="../css/style.min.css" />
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
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
                            <a href="./listarCitas.php">
                                <span class="icon " aria-hidden="true"></span>
                                Gestión de Citas

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
                            'error'
                        )
                    </script>
                <?php
                    unset($_SESSION['mensajeErr']);
                }
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
                                            <th scope="col">ID Reserva</th>
                                            <th scope="col">Fecha</th>
                                            <th scope="col">Empleado</th>
                                            <th scope="col">Cliente</th>
                                            <th scope="col">Mascota</th>
                                            <th scope="col">Servicio</th>
                                            <th scope="col">Precio</th>
                                            <th scope="col">Editar</th>
                                            <th scope="col">Eliminar</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($fila5 as $datos5) {
                                        ?>
                                            <tr>

                                                <td><?php echo $datos5['idReservas'] ?></td>
                                                <td><?php echo $datos5['fecha'] ?></td>
                                                <td><?php echo $datos5['nombre_empleado'] ?></td>
                                                <td><?php echo $datos5['nombre_cliente'] ?></td>
                                                <td><?php echo $datos5['nombre_mascota'] ?></td>
                                                <td><?php echo $datos5['nombre_servicio'] ?></td>

                                                <td><?php echo number_format($datos5['precio_servicio'],  0, ",", ".") ?></td>
                                                <td><a href="./editarCita.php?id=<?php echo $datos5['idReservas'] ?>" class="btn btn-primary "><i class="bi bi-pencil-square"></i></a></td>
                                                <td> <a href="../controlador/eliminarReserva.php?id=<?php echo $datos5['idReservas'] ?>" class="btn btn-danger"><i class="bi bi-trash-fill"></i></a></td>


                                            </tr>
                                        <?php
                                        }
                                        ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>


                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Agendar Cita</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="../controlador/agregarCita.php" method="post">
                                        <div class="modal-body">
                                            <div class="form-floating mb-3 mt-2" id="idEmpleados">
                                                <select class="form-select border-secondary" aria-label="Default select example" name="nomEmpleado" id="nomEmpleado">

                                                    <?php foreach ($fila4 as $datos4) { ?>
                                                        <option value="<?php echo $datos4['idEmpleados'] ?>"><?php echo $datos4['nombre'] . " " . $datos4['apellido'] ?></option>
                                                    <?php } ?>

                                                </select>
                                                <label for="floatingInput">Nombre Empleado</label>
                                            </div>



                                            <div id="clientes" class="form-floating mb-3 mt-2">
                                                <select class="form-select border-secondary mt-3" id="cedula" name="cedula" aria-label="Default select example" onchange="select(this)">
                                                    <option value="0">Seleccione un Cliente </option>
                                                    <?php foreach ($fila2 as $datos2) { ?>
                                                        <option value="<?php echo $datos2['cedula'] ?>"><?php echo $datos2['nombre'] . " " . $datos2['apellido'] ?></option>
                                                    <?php } ?>

                                                </select>
                                                <label for="floatingInput">Nombre Clientes</label>
                                            </div>
                                            <div id="mascotas" class="form-floating mb-3 mt-2">
                                                <select class="form-select border-secondary mt-3" name="mascota" id="mascota" aria-label="Default select example">
                                                    <?php foreach ($fila3 as $datos3) { ?>
                                                        <option value="<?php echo $datos3['idMascotas'] ?>"><?php echo $datos3['nombre']  ?></option>
                                                    <?php } ?>

                                                </select>
                                                <label for="floatingInput">Nombre Mascota</label>
                                            </div>
                                            <div class="row mt-3 ms-2">


                                                <label for="floatingInput">Servicios</label>

                                                <?php foreach ($fila as $datos) { ?>
                                                    <div class="col-4">
                                                        <div class="form-check form-check-inline mb-3 ">

                                                            <input class="form-check-input border-primary  " type="checkbox" value="<?php echo $datos['idServicios'] . "/" . $datos['precio'] ?>" style="border-radius:8px" name="servicios[]" id="servicios<?php echo $id  ?>" onclick="suma(<?php echo $id ?>)">

                                                            <label class="form-check-label" for="flexCheckDefault">
                                                                <?php echo $datos['nombre'] ?>
                                                            </label>
                                                            <?php $id = $id + 1 ?>
                                                        </div>
                                                    </div>
                                                <?php } ?>

                                            </div>

                                            <div class="form-floating mb-3 mt-2">
                                                <input type="email" class="form-control border-secondary" id="precio" name="precio" readonly>
                                                <label for="floatingInput">Precio Servicio</label>
                                            </div>

                                            <div class="form-floating mt-3">

                                                <input type="datetime-local" class="form-control border-secondary" name="fechaCita" id="fechaCita" required>
                                                <label for="floatingInput">Fecha Cita</label>
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="close" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                            <button type="submit" class="btn btn-primary">Agendar cita</button>
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
            var sumar = 0;

            function borrar() {
                document.getElementById("idEmpleado").value = "";
                document.getElementById("clientes").value = "";
                document.getElementById("mascotas").value = "";
                document.getElementById("servicios").value = "";
                document.getElementById("precio").value = "";

            }

            function select(e) {

                let cedula = document.getElementById("cedula").value;
                let xmr = new XMLHttpRequest();
                xmr.open("POST", "../controlador/buscarMascota.php", true);
                xmr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xmr.onreadystatechange = function() {
                    if (xmr.readyState == 4 && xmr.status == 200) {
                        let response = JSON.parse(xmr.responseText);
                        const selectMascota = document.querySelector("#mascota");
                        selectMascota.innerHTML = '';
                        for (let index = 0; index < response.length; index++) {
                            const option = document.createElement("option");
                            option.value = response[index].idMascotas;
                            option.text = response[index].nombre
                            selectMascota.appendChild(option)
                        }
                    }
                }
                xmr.send("cedula=" + cedula);
            }

            function suma(numero) {


                let servicio = document.getElementById("servicios" + numero);
                let valor = document.getElementById("servicios" + numero).value;
                let array = valor.split("/");
                var precio = array[1];

                if (servicio.checked) {
                    sumar = Number(sumar) + Number(precio);
                    document.getElementById("precio").value = sumar;
                } else {
                    if (sumar >= 0) {
                        sumar = Number(sumar) - Number(precio);
                        document.getElementById("precio").value = sumar;
                    }
                }

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
