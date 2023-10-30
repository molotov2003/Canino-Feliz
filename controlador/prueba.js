
function formatearNumeroConMiles(numero) {
  return numero.toLocaleString(); // Esto agrega comas para separar los miles
}
/////////////////////////////
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
  let idRows = "row" + cantidad2;
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
  cantidad2++;
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
  let cantidad3 = prompt("Ingrese la Nueva Cantidad");
  datos[row].cantidad = parseInt(cantidad3);
  datos[row].totalProd = datos[row].cantidad * datos[row].precio;
  let filaId = document.getElementById("row" + row);
  let celda = filaId.getElementsByTagName("td");
  celda[2].innerHTML = cantidad3;
  celda[3].innerHTML = datos[row].totalProd;
  sumar();
}

function sumar() {
  var total = 0;
  for (const key of datos) {
    total = total + key.totalProd;
  }
  total = formatearNumeroConMiles(total);
  document.getElementById("total").innerHTML = total;
}

/////////////////////////
let codProd = document.getElementById("codProd");
let nombreProd = document.getElementById("nombreProd");
let precioProd = document.getElementById("precioProd");
let cantidadProd = document.getElementById("cantidadProd");

codProd.addEventListener("input", validarInputs);
nombreProd.addEventListener("input", validarInputs);
precioProd.addEventListener("input", validarInputs);
cantidadProd.addEventListener("input", validarInputs);
function validarInputs() {
  // Verificar si los 4 inputs están llenos
  if (
    codProd.value.trim() !== "" &&
    nombreProd.value.trim() !== "" &&
    precioProd.value.trim() !== "" &&
    cantidadProd.value.trim() !== ""
  ) {
    // Habilitar el botón si todos los inputs están llenos
    botonAgregarTabla.removeAttribute("disabled");
  } else {
    // Deshabilitar el botón si al menos uno de los inputs está vacío
    botonAgregarTabla.setAttribute("disabled", "disabled");
  }
}
