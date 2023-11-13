///////////////////
function formatearNumeroConMiles(numero) {
  return numero.toLocaleString(); // Esto agrega comas para separar los miles
}
/////////////////////////////
const button = document.getElementById("btnBuscarCliente");
button.addEventListener("click", (e) => {
  e.preventDefault();
  const cedula = document.getElementById("cedula");
  const Nombre = document.getElementById("nombreClien");
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "../controlador/buscarcliente.php", true);
  xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
      let respuesta = xhr.responseText;
      if (respuesta === "") {
        Swal.fire({
          icon: "error",
          title: "Error",
          text: "El Usuario no existe en la Base de Datos",
        });
        cedula.value = "";
        Nombre.value = "";
      } else {
        cedula.setAttribute("readonly", "readonly");
        Nombre.value = respuesta;
      }
    }
  };
  let datos = JSON.stringify({ cedula: cedula.value });
  xhr.send(datos);
});
////////////////////////////////--BUSCAR PRODUCTO-->////////////////////////////////////////////////////////////
const buttonProd = document.getElementById("buscarProd");
buttonProd.addEventListener("click", (e) => {
  e.preventDefault();
  const codProd = document.getElementById("codProd");
  const nombreProd = document.getElementById("nombreProd");
  const precioProd = document.getElementById("precioProd");
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "../controlador/buscarproducto.php", true);
  xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
      let respuesta = xhr.responseText;
      let respuestasArre = respuesta.split(",");
      if (respuestasArre[0] == "") {
        Swal.fire({
          icon: "error",
          title: "Error",
          text: "Producto Inexistente",
        });
        $("#codProd").val("");
        $("#nombreProd").val("");
        $("#precioProd").val("");
        $("#cantidadProd").val("");
      } else {
        document.getElementById("cantidadProd").focus();
        codProd.setAttribute("readonly", "readonly");
        nombreProd.value = respuestasArre[0];
        precioProd.value = respuestasArre[1];
      }
    }
  };
  let datos = JSON.stringify({ codigo: codProd.value });
  xhr.send(datos);
});

const buscarProdCanc = document.getElementById("buscarProdCanc");
buscarProdCanc.addEventListener("click", (e) => {
  e.preventDefault();
  const codProd = document.getElementById("codProd");
  codProd.removeAttribute("readonly");
  codProd.value = "";
  const nombreProd = document.getElementById("nombreProd");
  nombreProd.value = "";
  const precioProd = document.getElementById("precioProd");
  precioProd.value = "";
  const cantidad = document.getElementById("cantidadProd");
  cantidad.value = "";
});
////////////////////////////////////////////////////////////////////////
const btnCancelarBuscarCliente = document.getElementById(
  "btnCancelarBuscarCliente"
);
btnCancelarBuscarCliente.addEventListener("click", (e) => {
  e.preventDefault();
  const cedula2 = document.getElementById("cedula");
  const Nombre = document.getElementById("nombreClien");
  cedula2.removeAttribute("readonly");
  cedula2.value = "";
  Nombre.value = "";
});
///////////////////////////////
const botonAgregarTabla = document.getElementById("AgregarProd");
const botonGuardar = document.getElementById("guardar");
const tabla = document.getElementById("tabla");
const valorRecibido = document.getElementById("valorRecibido");
let datos2 = [];
let cantidad2 = 0;
///////////////
botonAgregarTabla.addEventListener("click", agregar);
botonGuardar.addEventListener("click", guardar);
/////////////
function agregar(e) {
  e.preventDefault();
  let codigo = document.getElementById("codProd").value;
  let nombre = document.getElementById("nombreProd").value;
  let precio = parseInt(document.getElementById("precioProd").value);
  let cantidad = parseInt(document.getElementById("cantidadProd").value);
  let totalProd = precio * cantidad;
  const mismoProd = datos2.some((objeto) => objeto.idProd === codigo);
  if (cantidad > 0 && nombre.length > 0) {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "../controlador/verificardisponibilidad.php", true);
    xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
    xhr.onreadystatechange = function () {
      if (xhr.readyState === 4 && xhr.status === 200) {
        let respuesta = xhr.responseText;
        if (!mismoProd) {
          if (respuesta == 0) {
            datos2.push({
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
              formatearNumeroConMiles(precio) +
              "</td><td>" +
              cantidad +
              "</td><td>" +
              formatearNumeroConMiles(totalProd) +
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
            botonAgregarTabla.setAttribute("disabled", "disabled");
            const codProd = document.getElementById("codProd");
            codProd.removeAttribute("readonly");
          } else {
            Swal.fire({
              icon: "error",
              title: "Error",
              text: "No hay tanta disponibilidad del producto seleccionado",
            });
          }
        } else {
          Swal.fire({
            icon: "error",
            title: "Error",
            text: "Este producto ya esta agregado modifique la cantidad",
          });
        }
      }
    };
    let datos = JSON.stringify({ codigo: codigo, cantidad: cantidad });
    xhr.send(datos);
  } else {
    Swal.fire({
      icon: "error",
      title: "Error",
      text: "Ingresaste 0 o Menos de 0",
    });
  }
  //Agregar a la tabla

  valorRecibido.addEventListener("input", (e) => {
    e.preventDefault();
    let valorRecibido3 = valorRecibido.value;
    if (valorRecibido3.trim() !== "" && datos2.length > 0) {
      botonGuardar.removeAttribute("disabled");
    } else {
      botonGuardar.setAttribute("disabled", "disabled");
    }
  });
}
/////////////
function eliminar(row) {
  $("#row" + row).remove();
  let i = 0;
  let posicion = 0;
  for (const x of datos2) {
    if (x.id == row) {
      posicion = i;
    }
    i++;
  }
  datos2.splice(posicion, 1);
  sumar();
  if (datos2.length == 0) {
    botonGuardar.setAttribute("disabled", "disabled");
  } else {
    botonGuardar.removeAttribute("disabled");
  }
}
////////////
function editar(row) {
  function esNumero(valor) {
    return !isNaN(parseFloat(valor)) && isFinite(valor);
  }

  let cantidad3 = 0;
  Swal.fire({
    title: "Ingresa la nueva cantidads",
    input: "number",
    inputPlaceholder: "Escribe un numero",
    showCancelButton: true,
    inputValidator: (value) => {
      if (!value) {
        return "Debes ingresar un valor";
      }
    },
  }).then((result) => {
    if (result.isConfirmed) {
      let result2 = esNumero(result.value);
      let respuestaF = 0;
      if (result2 === true && result.value > 0) {
        cantidad3 = result.value;
        let codigo = datos2[row].idProd;
        /////////////////VERIFICAR DISPONIBILIDAD/////////////
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "../controlador/verificardisponibilidad.php", true);
        xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
        xhr.onreadystatechange = function () {
          if (xhr.readyState === 4 && xhr.status === 200) {
            let respuesta = xhr.responseText;
            respuestaF = respuesta;
            if (respuesta == 0) {
              datos2[row].cantidad = parseInt(cantidad3);
              datos2[row].totalProd = datos2[row].cantidad * datos2[row].precio;
              let filaId = document.getElementById("row" + row);
              let celda = filaId.getElementsByTagName("td");
              celda[2].innerHTML = cantidad3;
              let nuevoTot = datos2[row].totalProd;
              celda[3].innerHTML = formatearNumeroConMiles(nuevoTot);
              sumar();
            } else {
              Swal.fire({
                icon: "error",
                title: "Error",
                text: "No hay tanta disponibilidad de este producto",
              });
            }
          }
        };
        let datos3 = JSON.stringify({ codigo: codigo, cantidad: cantidad3 });
        xhr.send(datos3);
        //////////////////////////////////////////////////////
      } else {
        Swal.fire({
          icon: "error",
          title: "Error",
          text: "Ingresaste Un Valor menor o igual a 0",
        });
      }
    }
  });
}
////////////
function sumar() {
  var total = 0;
  for (const key of datos2) {
    total = total + key.totalProd;
  }
  document.getElementById("total").innerHTML = formatearNumeroConMiles(total);
}
//////////////
function guardar(e) {
  e.preventDefault();
  const cedula2 = document.getElementById("cedula").value;
  const valorRecibido2 = document.getElementById("valorRecibido").value;
  const nombre = document.getElementById("nombreClien").value;
  if (cedula2.length > 0 && nombre.length > 0) {
    let total2 = 0;
    for (const key of datos2) {
      total2 = total2 + key.totalProd;
    }
    if (parseInt(valorRecibido2) >= parseInt(total2)) {
      let xhr = new XMLHttpRequest();
      let datosUseryCajero = {
        idCliente: cedula2,
        idCajero: 1112759212,
        total: total2,
        valorRecibido: valorRecibido2,
      };
      let datosFin = {
        datosUser: datosUseryCajero,
        datosCompra: datos2,
      };
      xhr.open("POST", "../controlador/guardarventa.php", true);
      xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
      xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
          let respuesta = xhr.responseText;
          Swal.fire("Factura Generada", "Venta Realizada", "success");
          setTimeout(() => {
            let ruta = window.location.href;
            console.log(ruta);
            let rutaBien = ruta.split("vista/agregarventa.php#", "");
            let rutaCompleta = `${rutaBien}/Canino-Feliz/controlador/tickes/Ticket_Nro_${respuesta}.pdf`;
            const downloadLink = document.createElement("a");
            downloadLink.href = rutaCompleta;
            downloadLink.style.display = "none";
            downloadLink.download = `Ticket_Nro_${respuesta}.pdf`;
            document.body.appendChild(downloadLink);
            downloadLink.click();
            document.body.removeChild(downloadLink);
            location.reload();
          }, 4000);
          $("#codProd").val("");
          $("#nombreProd").val("");
          $("#precioProd").val("");
          $("#cantidadProd").val("");
        }
      };
      let datos3 = JSON.stringify(datosFin);
      xhr.send(datos3);
    } else {
      Swal.fire({
        icon: "error",
        title: "Error",
        text: "La Cantidad Recibida es Menor al Total",
      });
    }
  } else {
    Swal.fire({
      icon: "error",
      title: "Error",
      text: "Ingrese Algun Cliente",
    });
  }
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
