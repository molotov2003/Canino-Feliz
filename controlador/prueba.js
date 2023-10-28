const button = document.getElementById("btnBuscarCliente");
button.addEventListener("click", (e) => {
  e.preventDefault();
  const cedula = document.getElementById("cedula").value;
  const Nombre = document.getElementById("nombreClien");
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "../controlador/buscarcliente.php", true);
  xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
      let respuesta = xhr.responseText;
      Nombre.value = respuesta;
    }
  };
  let datos = JSON.stringify({ cedula: cedula });
  xhr.send(datos);
});
////////////////////////////////--BUSCAR PRODUCTO-->////////////////////////////////////////////////////////////
const buttonProd = document.getElementById("buscarProd");
buttonProd.addEventListener("click", (e) => {
  e.preventDefault();
  const codProd = document.getElementById("codProd").value;
  const nombreProd = document.getElementById("nombreProd");
  const precioProd = document.getElementById("precioProd");
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "../controlador/buscarproducto.php", true);
  xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
      let respuesta = xhr.responseText;
      let respuestasArre = respuesta.split(",");
      nombreProd.value = respuestasArre[0];
      precioProd.value = respuestasArre[1];
    }
  };
  let datos = JSON.stringify({ codigo: codProd });
  xhr.send(datos);
});
////////////////////////////////////////////////////////////////////////
const botonAgregarTabla = document.getElementById("AgregarProd");
const botonGuardar = document.getElementById("guardar");
const tabla = document.getElementById("tabla");
let datos = [];
let cantidad2 = 0;
botonAgregarTabla.addEventListener("click", agregar);
botonGuardar, addEventListener("click", guardar);

function agregar() {
  let codigo = document.getElementById("codProd").value;
  let nombre = document.getElementById("nombreProd").value;
  let precio = parseInt(document.getElementById("precioProd").value);
  let cantidad = parseInt(document.getElementById("cantidadProd").value);
  let totalProd = precio * cantidad;
  //Agregar a la tabla
  datos.push({
    id: cantidad2,
    idProd: codigo,
    nombre: nombre,
    precio: precio,
    cantidad: cantidad,
    totalProd: totalProd,
  });
  let idRows = "row" + cantidad;
  let fila =
    "<tr id=" +
    idRows +
    "><td>" +
    nombre +
    "</td><td>" +
    precio +
    "</td><td>" +
    cantidad +
    "</td><td>" +
    totalProd +
    '</td><td><a href="#" class="btn btn-danger" onclick="eliminar(' +
    cantidad2 +
    ')";>Eliminar</td>' +
    '</td><td><a href="#" class="btn btn-warning" onclick="editar(' +
    cantidad2 +
    ')";>Editar</td>';
  $("#tabla").append(fila);
  $("#codProd").val("");
  $("#nombreProd").val("");
  $("#precioProd").val("");
  $("#cantidadProd").val("");
  cantidad++;
  sumar();
}
function eliminar(row) {
  $("#row" + row).remove();
  let i = 0;
  let posicion = 0;
  for (const x of datos) {
    if (x.id == row) {
      posicion = i;
    }
    i++;
  }
  datos.splice(posicion, 1);
  sumar();
}

function editar(row) {
    console.log("LA ROW ES" +row);
  let cantidad3 = parseInt(prompt("Ingrese la Nueva Cantidad"));
  console.log("LA CANTIDAD NUEVA ES:" + cantidad3);
  datos[row].cantidad = cantidad3;
  datos[row].total = datos[row].cantidad * datos[row].precio;
  let filaId = document.getElementById("#row" + row);
  celda = filaId.getElementsByTagName("td");
  celda[3].innerHTML = cantidad;
  celda[4].innerHTML = datos[row].total;
  sumar();
}

function sumar() {
  var total = 0;
  for (const key of datos) {
    total = total + key.totalProd;
  }
  document.getElementById("total").innerHTML = total;
}
