<?php
session_start();
$inputJSON = file_get_contents('php://input');
$data = json_decode($inputJSON);

if ($data) {
    $datosEncabezado = $data->datosUser;
    $idCliente = $datosEncabezado->idCliente;
    $idCajero = $datosEncabezado->idCajero;
    $total = $datosEncabezado->total;
    $valorRecibido = $datosEncabezado->valorRecibido;
    $fechaActual = date("y-m-d");
    $datosCompra = $data->datosCompra;
    include("../modelo/MySQL.php");
    $conexion = new MySQL();
    $pdo = $conexion->conectar();
    /////////////////////////////
    $sql2 = "SELECT * FROM clientes WHERE cedula=:cedula";
    $stmt2 = $pdo->prepare($sql2);
    $stmt2->bindParam(":cedula", $idCliente, PDO::PARAM_STR);
    $stmt2->execute();
    if ($stmt2->rowCount() > 0) {
        // Consulta preparada para evitar inyección de SQL
        $sql = "INSERT INTO encabezado (fecha,Clientes_cedula,Empleados_idEmpleados,total) VALUES(:fecha,:Clientes_cedula,:Empleados_idEmpleados,:total)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':fecha', $fechaActual, PDO::PARAM_STR);
        $stmt->bindParam(':Clientes_cedula', $idCliente, PDO::PARAM_INT);
        $stmt->bindParam(':Empleados_idEmpleados', $idCajero, PDO::PARAM_STR);
        $stmt->bindParam(':total', $total, PDO::PARAM_STR);
        $stmt->execute();
        /////
        $sql3 = "SELECT MAX(idEncabezado) AS maximo FROM encabezado";
        $stmt3 = $pdo->prepare($sql3);
        $stmt3->execute();
        $resultado = $stmt3->fetch(PDO::FETCH_ASSOC);
        $maximoId = $resultado['maximo'];

        foreach ($datosCompra as $datos) {
            $idProd = $datos->idProd;
            $nombre = $datos->nombre;
            $precio = $datos->precio;
            $cantidad = $datos->cantidad;
            $totalProd = $datos->totalProd;

            $sql4 = "INSERT INTO detalle (Encabezado_idEncabezado,Productos_idProductos,cantidad,PrecioUnitario,totalProd) 
            VALUES (:Encabezado_idEncabezado,:Productos_idProductos,:cantidad,:PrecioUnitario,:totalProd)";
            $stmt4 = $pdo->prepare($sql4);
            $stmt4->bindParam(":Encabezado_idEncabezado", $maximoId, PDO::PARAM_INT);
            $stmt4->bindParam(":Productos_idProductos", $idProd, PDO::PARAM_INT);
            $stmt4->bindParam(":cantidad", $cantidad, PDO::PARAM_INT);
            $stmt4->bindParam(":PrecioUnitario", $precio, PDO::PARAM_INT);
            $stmt4->bindParam(":totalProd", $totalProd, PDO::PARAM_INT);
            $stmt4->execute();
            ///////
            $sql7 = "SELECT existencia FROM productos WHERE idProductos=:idProductos";
            $stmt7 = $pdo->prepare($sql7);
            $stmt7->bindParam("idProductos", $idProd, PDO::PARAM_INT);
            $stmt7->execute();
            $fechtExis = $stmt7->fetch(PDO::FETCH_ASSOC);
            $existenciaAntigua = $fechtExis["existencia"];
            //////
            $nuevaExistencia = $existenciaAntigua - $cantidad;
            /////
            $sql8 = "UPDATE productos SET existencia=:existencia WHERE idProductos=:idProductos";
            $stmt8 = $pdo->prepare($sql8);
            $stmt8->bindParam(":idProductos", $idProd, PDO::PARAM_INT);
            $stmt8->bindParam(":existencia", $nuevaExistencia, PDO::PARAM_INT);
            $stmt8->execute();
        }

        # Incluyendo librerias necesarias #
        require "../controlador/RECEIPT-main/code128.php";
        $pdf = new PDF_Code128('P', 'mm', array(80, 258));
        $pdf->SetMargins(4, 10, 4);
        $pdf->AddPage();

        # Encabezado y datos de la empresa #
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->SetTextColor(0, 0, 0);
        $pdf->MultiCell(0, 5, iconv("UTF-8", "ISO-8859-1", strtoupper("EL CANINO FELIZ")), 0, 'C', false);
        $pdf->SetFont('Arial', '', 9);
        $pdf->MultiCell(0, 5, iconv("UTF-8", "ISO-8859-1", "Direccion Cartago, Valle del Cauca"), 0, 'C', false);
        $pdf->MultiCell(0, 5, iconv("UTF-8", "ISO-8859-1", "Teléfono: 2065454"), 0, 'C', false);
        $pdf->MultiCell(0, 5, iconv("UTF-8", "ISO-8859-1", "Email: canino@feliz.com"), 0, 'C', false);

        $pdf->Ln(1);
        $pdf->Cell(0, 5, iconv("UTF-8", "ISO-8859-1", "------------------------------------------------------"), 0, 0, 'C');
        $pdf->Ln(5);

        $pdf->MultiCell(0, 5, iconv("UTF-8", "ISO-8859-1", "Fecha: " . date("d-m-y")), 0, 'C', false);
        #CONSULTA PARA NOMBRE DE CAJERO
        #CONSULTA PARA NOMBRE DE CAJERO
        #CONSULTA PARA NOMBRE DE CAJERO
        #CONSULTA PARA NOMBRE DE CAJERO
        $sql5 = "SELECT nombre FROM empleados WHERE idEmpleados = :id";
        $stmt5 = $pdo->prepare($sql5);
        $stmt5->bindParam(":id", $idCajero, PDO::PARAM_INT);
        $stmt5->execute();
        $resultado2 = $stmt5->fetch(PDO::FETCH_ASSOC);
        $nombreCajero = $resultado2["nombre"];
        $pdf->MultiCell(0, 5, iconv("UTF-8", "ISO-8859-1", "Cajero: $nombreCajero"), 0, 'C', false);
        $pdf->SetFont('Arial', 'B', 10);
        #CONSULTA ULTIMO RECIBO GENERADO
        #CONSULTA ULTIMO RECIBO GENERADO
        #CONSULTA ULTIMO RECIBO GENERADO
        #CONSULTA ULTIMO RECIBO GENERADO
        $pdf->MultiCell(0, 5, iconv("UTF-8", "ISO-8859-1", strtoupper("Ticket Nro: $maximoId")), 0, 'C', false);
        $pdf->SetFont('Arial', '', 9);

        $pdf->Ln(1);
        $pdf->Cell(0, 5, iconv("UTF-8", "ISO-8859-1", "------------------------------------------------------"), 0, 0, 'C');
        $pdf->Ln(5);

        #CONSULTA DATOS DEL CLIENTE
        $sql6 = "SELECT * FROM clientes WHERE cedula = :id";
        $stmt6 = $pdo->prepare($sql6);
        $stmt6->bindParam(":id", $idCliente, PDO::PARAM_INT);
        $stmt6->execute();
        $resultado3 = $stmt6->fetch(PDO::FETCH_ASSOC);
        $nombre = $resultado3["nombre"];
        $telefono = $resultado3["telefono"];
        $direccion = $resultado3["direccion"];
        $pdf->MultiCell(0, 5, iconv("UTF-8", "ISO-8859-1", "Cliente: $nombre"), 0, 'C', false);
        $pdf->MultiCell(0, 5, iconv("UTF-8", "ISO-8859-1", "Documento: $idCliente"), 0, 'C', false);
        $pdf->MultiCell(0, 5, iconv("UTF-8", "ISO-8859-1", "Teléfono: $telefono"), 0, 'C', false);
        $pdf->MultiCell(0, 5, iconv("UTF-8", "ISO-8859-1", "Dirección: $direccion"), 0, 'C', false);

        $pdf->Ln(1);
        $pdf->Cell(0, 5, iconv("UTF-8", "ISO-8859-1", "-------------------------------------------------------------------"), 0, 0, 'C');
        $pdf->Ln(3);

        # Tabla de productos #
        $pdf->Cell(10, 5, iconv("UTF-8", "ISO-8859-1", "Cant."), 0, 0, 'C');
        $pdf->Cell(26, 5, iconv("UTF-8", "ISO-8859-1", "Precio"), 0, 0, 'C');
        $pdf->Cell(35, 5, iconv("UTF-8", "ISO-8859-1", "Total"), 0, 0, 'C');

        $pdf->Ln(3);
        $pdf->Cell(72, 5, iconv("UTF-8", "ISO-8859-1", "-------------------------------------------------------------------"), 0, 0, 'C');
        $pdf->Ln(3);



        /*----------  Detalles de la tabla  ----------*/
        #CONSULTA PRODUCTOS VENDIDOS
        foreach ($datosCompra as $datos) {
            $idProd = $datos->idProd;
            $nombre = $datos->nombre;
            $precio = $datos->precio;
            $cantidad = $datos->cantidad;
            $totalProd = $datos->totalProd;
            $precioFor = number_format($precio, 2, ',', '.');
            $totalProdFor = number_format($totalProd, 2, ',', '.');
            $pdf->MultiCell(0, 4, iconv("UTF-8", "ISO-8859-1", "$nombre"), 0, 'C', false);
            $pdf->Cell(10, 4, iconv("UTF-8", "ISO-8859-1", "$cantidad"), 0, 0, 'C');
            $pdf->Cell(26, 4, iconv("UTF-8", "ISO-8859-1", "$$precioFor"), 0, 0, 'C');
            $pdf->Cell(35, 4, iconv("UTF-8", "ISO-8859-1", "$$totalProdFor"), 0, 0, 'C');
            $pdf->Ln(7);
        }

        /*----------  Fin Detalles de la tabla  ----------*/



        $pdf->Cell(72, 5, iconv("UTF-8", "ISO-8859-1", "-------------------------------------------------------------------"), 0, 0, 'C');

        $pdf->Ln(5);

        #CONSULTA DEL TOTAL A PAGAR
        $total2 = number_format($total, 2, ",", ".");
        $pdf->Cell(18, 5, iconv("UTF-8", "ISO-8859-1", ""), 0, 0, 'C');
        $pdf->Cell(22, 5, iconv("UTF-8", "ISO-8859-1", "TOTAL A PAGAR"), 0, 0, 'C');
        $pdf->Cell(32, 5, iconv("UTF-8", "ISO-8859-1", "$$total2"), 0, 0, 'C');

        $pdf->Ln(5);

        #INPUT DINERO RECIBIDO
        $valor2 = number_format($valorRecibido, 2, ",", ".");
        $pdf->Cell(18, 5, iconv("UTF-8", "ISO-8859-1", ""), 0, 0, 'C');
        $pdf->Cell(22, 5, iconv("UTF-8", "ISO-8859-1", "TOTAL PAGADO"), 0, 0, 'C');
        $pdf->Cell(32, 5, iconv("UTF-8", "ISO-8859-1", "$$valor2"), 0, 0, 'C');

        $pdf->Ln(5);

        #RESTA DINERO RECIBIDO
        $vueltos = $valorRecibido - $total;
        $vueltosFor = number_format($vueltos, 2, ',', '.');
        $pdf->Cell(18, 5, iconv("UTF-8", "ISO-8859-1", ""), 0, 0, 'C');
        $pdf->Cell(22, 5, iconv("UTF-8", "ISO-8859-1", "CAMBIO"), 0, 0, 'C');
        $pdf->Cell(32, 5, iconv("UTF-8", "ISO-8859-1", "$$vueltosFor"), 0, 0, 'C');

        $pdf->Ln(5);


        $pdf->MultiCell(0, 5, iconv("UTF-8", "ISO-8859-1", "*** Precios de productos incluyen impuestos. Para poder realizar un reclamo o devolución debe de presentar este ticket ***"), 0, 'C', false);

        $pdf->SetFont('Arial', 'B', 9);
        $pdf->Cell(0, 7, iconv("UTF-8", "ISO-8859-1", "Gracias por su compra"), '', 0, 'C');

        $pdf->Ln(9);

        # Codigo de barras #
        $pdf->Code128(5, $pdf->GetY(), "COD000001V0001", 70, 20);
        $pdf->SetXY(0, $pdf->GetY() + 21);
        $pdf->SetFont('Arial', '', 14);
        $pdf->MultiCell(0, 5, iconv("UTF-8", "ISO-8859-1", "COD000001V0001"), 0, 'C', false);

        $rutaActal = getcwd();
        # Nombre del archivo PDF #
        $pdf->Output("$rutaActal/tickes/Ticket_Nro_$maximoId.pdf", "F");
        echo $maximoId;
    } else {
        $_SESSION['titulo'] = "Fallo al Inserta";
        $_SESSION["mensaje"] = "No existe el Cliente en la Base de datos";
        $_SESSION["icono"] = "error";
        header("Location: ../vista/agregarventa.php");
    }
}
