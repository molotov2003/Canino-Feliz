<?php
require('../controlador/RECEIPT-main/fpdf.php');

class PDF extends FPDF
{
    function Header()
    {
        // Agrega aquí el logo de la empresa
        $this->Image('../img/logoCanino.png', 10, 8, 33);

        // Agrega aquí la información de la empresa, como el nombre
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 10, 'PELUQUERIA EL CANINO FELIZ', 0, 1, 'C');

        // Otras informaciones de la empresa (dirección, teléfono, etc.)
        $this->SetFont('Arial', '', 10);
        $this->Cell(0, 10, 'Calle 16c #67-45   |   2203732   |   servicio@caninofeliz.com', 0, 1, 'C');

        // Línea separadora
        $this->Line(30, 50, 200, 50);
        $this->Ln(30); // Salto de línea
    }

    function Footer()
    {
        // Pie de página
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, utf8_decode('Página') . $this->PageNo(), 0, 0, 'C');
    }

    function ChapterTitle($title)
    {
        // Título del capítulo
        $this->SetFont('Arial', 'B', 20);
        $this->Cell(0, 10, $title, 0, 1, 'C');
        $this->Ln(4); // Salto de línea adicional
    }

    function ChapterSubTitle($title)
    {
        // Título del capítulo
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 10, $title, 0, 1, 'L');
        $this->Ln(4); // Salto de línea adicional
    }

    function ChapterBody($body)
    {
        // Contenido del capítulo
        $this->SetFont('Arial', '', 12);
        $this->MultiCell(0, 10, $body);
        $this->Ln();
    }
}

// Crear el objeto PDF
$pdf = new PDF();
$pdf->AddPage();

// Agrega aquí la generación del contenido del reporte según tus necesidades
$pdf->ChapterTitle('Reporte de Ventas por Productos');
$pdf->ChapterSubTitle('5 PRODUCTOS MAS VENDIDOS');
include("../modelo/MySQL.php");
$conexion = new MySQL();
$pdo = $conexion->conectar();
/////////////////////////////
$sql2 = "SELECT productos.idProductos, productos.nombre AS NombreProducto, SUM(detalle.cantidad) AS TotalVendido
FROM productos
JOIN detalle ON productos.idProductos = detalle.Productos_idProductos
GROUP BY productos.idProductos
ORDER BY TotalVendido DESC
LIMIT 5";
$stmt2 = $pdo->prepare($sql2);
$stmt2->execute();
$fila = $stmt2->fetchAll(PDO::FETCH_ASSOC);
foreach ($fila as $key) {
    $pdf->ChapterBody(utf8_decode('N° de Producto: ' .  $key['idProductos'] . '   /   ' . 'Nombre del Producto: ' . $key['NombreProducto'] . '   /   ' . 'Cantidad Vendida: ' . $key['TotalVendido']));
}
$pdf->Ln(30);
$pdf->ChapterSubTitle('INGRESOS POR VENTAS DE PRODUCTOS');

$sql3 = "SELECT SUM(Detalle.cantidad * Productos.precio) AS IngresosVentas FROM Detalle JOIN Productos ON Detalle.Productos_idProductos = Productos.idProductos JOIN Encabezado ON Detalle.Encabezado_idEncabezado = Encabezado.idEncabezado";
$stmt3 = $pdo->prepare($sql3);
$stmt3->execute();
$fila2 = $stmt3->fetch(PDO::FETCH_ASSOC);
$ingresos = $fila2["IngresosVentas"];
if ($ingresos > 1000) {
    $ingresos = number_format($ingresos, 0, ".", ",");
}
$pdf->ChapterBody(utf8_decode("Los Ingresos Por Ventas Han Sido:  " . $ingresos));



/* while ($fila = $stmt2->fetchAll(PDO::FETCH_ASSOC)) {
    echo ($fila['idProductos']);
   
} */


$pdf->AddPage();

$pdf->ChapterTitle('Reporte de Ingresos por Servicios');
$pdf->ChapterSubTitle('5 SERVICIOS MAS ADQUIRIDOS');

$sql4 = "SELECT servicios.idServicios, servicios.nombre AS NombreServicio, COUNT(reservas.Servicios_idServicios) AS Total
FROM servicios
JOIN reservas ON servicios.idServicios = reservas.Servicios_idServicios
GROUP BY servicios.idServicios
ORDER BY Total DESC
LIMIT 5";
$stmt4 = $pdo->prepare($sql4);
$stmt4->execute();
$fila4 = $stmt4->fetchAll(PDO::FETCH_ASSOC);
foreach ($fila4 as $key) {
    $pdf->ChapterBody(utf8_decode('N° de Servicio: ' .  $key['idServicios'] . '   /   ' . 'Nombre del Servicio: ' . $key['NombreServicio'] . '   /   ' . 'Cantidad Realizada: ' . $key['Total']));
}
$pdf->Ln(30);
$pdf->ChapterSubTitle('INGRESOS POR SERVICIOS');
$sql5 = "SELECT SUM(precio) AS total FROM servicios INNER JOIN reservas WHERE servicios.idServicios = reservas.Servicios_idServicios";
$stmt5 = $pdo->prepare($sql5);
$stmt5->execute();
$fila5 = $stmt5->fetch(PDO::FETCH_ASSOC);
$ingresos2 = $fila5["total"];
if ($ingresos2 > 1000) {
    $ingresos2 =  number_format($ingresos2, 0, ".", ",");
}
$pdf->ChapterBody(utf8_decode("Los Ingresos Por Ventas Han Sido:  " . $ingresos2));
// Salida del PDF
$pdf->Output();
