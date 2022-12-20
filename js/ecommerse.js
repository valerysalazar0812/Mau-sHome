$(document).ready(function () {
  $.ajax({
    type: "POST",
    url: "leerCarrito.php",
    dataType: "json",
    success: function (response) {
      llenaCarrito(response);
    },
  });

  $.ajax({
    type: "POST",
    url: "leerCarrito.php",
    dataType: "json",
    success: function (response) {
      llenarTablaCarrito(response);
    },
  });
  /*Leer tabla carrito*/
  function llenarTablaCarrito(response) {
    var total = 0;
    response.forEach((element) => {
      var precio = parseFloat(element["precio"]);
      var totalPrecio = element["cantidad"] * precio;
      total = total + totalPrecio;
      $("#tablaCarrito tbody").append(
        `
        <tr>
            <td><img src="/Admin/Administrador/upload/${
              element["imagen"]
            }" style="width:80px; height:75px;" style="float:right"</td>
            <td>${element["nombre"]}</td>
            <td>${element["talla"]}</td>
            <td>
            <span class="cantidad">
            ${element["cantidad"]}
            </span>
            
            <button type="button" class="btn btn-primary mas"
            data-id="${element["Id"]}"
            data-tipo="mas"
            data-cantidad="${element["cantidad"]}"
            >+</button>

            <button type="button" class="btn btn-danger menos"
            data-id="${element["Id"]}"
            data-tipo="menos"
            data-cantidad="${element["cantidad"]}"
            >-</button>
            </td>

            <td>$${precio.toFixed(2)}</td>
            <td>$${totalPrecio.toFixed(2)}</td>

            <td><i class="fa fa-trash text-danger borrarP" data-id="${
              element["Id"]
            }"></i></td>
            <hr>
        <tr>
        <hr>
        `
      );
    });

    /*Total producto*/
    $("#tablaCarrito tbody").append(
      `
      <tr>
          <td colspan="5" class="text-right"><strong>Total:</strong></td>
          <td>$${total.toFixed(2)}</td>
          <td></td>
      <tr>
      `
    );
  }

  $.ajax({
    type: "POST",
    url: "leerCarrito.php",
    dataType: "json",
    success: function (response) {
      llenarTablaPasarela(response);
    },
  });
  /*Leer tabla carrito*/
  function llenarTablaPasarela(response) {
    $("#tablaPasarela tbody").text("");
    var total = 0;
    response.forEach((element) => {
      var precio = parseFloat(element["precio"]);
      var totalPrecio = element["cantidad"] * precio;
      total = total + totalPrecio;
      $("#tablaPasarela tbody").append(
        `
        <tr>
            <td><img src="/Admin/Administrador/upload/${
              element["imagen"]
            }" style="width:80px; height:75px;" style="float:right"</td>
            <td>${element["nombre"]}</td>

            <td>
            ${element["talla"]}</td>
            <td>      
            ${element["cantidad"]}
            <input type="hidden" name="id[]" value="${element["Id"]}">
            <input type="hidden" name="cantidad[]" value="${element["cantidad"]}">
            <input type="hidden" name="precio[]" value="${precio.toFixed(2)}">
            </td>
            <td>$${precio.toFixed(2)}</td>
            <td>$${totalPrecio.toFixed(2)}</td>
            <hr>
        <tr>
        <hr>
        `
      );
    });

    /*Total producto*/
    $("#tablaPasarela tbody").append(
      `
      <tr>
          <td colspan="5" class="text-right"><strong>Total:</strong></td>
          <td>$${total.toFixed(2)}</td>
          <input type="hidden" name="total" value="${total.toFixed(2)}">
      <tr>
      `
    );
  }

  function actualizarcarrito(response) {
    $("#tablaCarrito tbody").html("");
    llenarTablaCarrito(response);
  }

  $(document).on("click", ".mas,.menos", function (e) {
    e.preventDefault();
    var id = $(this).data("id");
    var tipo = $(this).data("tipo");
    /* var cantidad*/
    $.ajax({
      type: "POST",
      url: "CambioCantidad.php",
      data: { id: id, tipo: tipo },
      dataType: "json",
      success: function (response) {
        actualizarcarrito(response);
      },
    });
  });

  $(document).on("click", ".borrarP", function (e) {
    e.preventDefault();
    var id = $(this).data("id");
    $.ajax({
      type: "POST",
      url: "borrarP.php",
      data: { id: id },
      dataType: "json",
      success: function (response) {
        /*    $("#tablaCarrito").remove("#"+id);*/
        console.log(response);
        actualizarcarrito(response);
      },
    });
  });

  $("#agregarCarrito").click(function (e) {
    e.preventDefault();
    var id = $(this).data("id");
    var nombre = $(this).data("nombre");
    var talla = $(this).data("talla");
    var imagen = $(this).data("imagen");
    var cantidad = $("#cantidadProducto").val();
    var precio = $(this).data("precio");
    $.ajax({
      type: "POST",
      url: "agregarCarrito.php",
      data: {
        id: id,
        nombre: nombre,
        talla: talla,
        imagen: imagen,
        cantidad: cantidad,
        precio: precio,
      },
      dataType: "json",
      success: function (response) {
        /*console.log(response);*/
        llenaCarrito(response);
        $("#badgeProducto").hide(500).show(500);
        $("#iconoCarrito").click();
      },
    });
  });
  function llenaCarrito(response) {
    var cantidad = Object.keys(response).length;
    if (cantidad > 0) {
      $("#badgeProducto").text(cantidad);
    } else {
      $("#badgeProducto").text("No hay productos agregados");
    }
    $("#badgeProducto").text(cantidad);
    $("#listaCarrito").text("");
    response.forEach((element) => {
      $("#listaCarrito").append(
        `   
        
        
                <a href="single.php?modulo=single&Id=${element["Id"]}" 
                class="dropdown-item">
                <!-- Message Start -->
                <div class="media">
                <div class="media-body">
                <center><h3 class="dropdown-item-title" style="color:black">
                   <strong> ${element["nombre"]} </strong>
                      <span class="float-right text-sm text-primary"></span>
                    </h3></center>
                    <div>
                   <center><img src="/Admin/Administrador/upload/${element["imagen"]}"  style=" width: 80px; height: 71px; border-radius: 5%;" >
                  <div class="media-body">
                    <p class="text-sm" style="color:black"><strong>Cantidad:</strong> ${element["cantidad"]}</p>
                  </div></center>
                </div>
                <!-- Message End -->
              </a>
              <hr class="ccc">
              <style>
                .ccc{
                  margin-top: 8px;
                  margin-bottom: 5px;
                }
              </style>
                `
      );
    });
    $("#listaCarrito").append(
      ` 
      <center><a href="Carrito.php?modulo=carrito" class="dropdown-item dropdown-footer text-primary"><strong>Ver carrito</strong></a></center>
      <hr class="sss">
      <style>
                .ccc{
                  margin-top: 8px;
                  margin-bottom: 8px;
                }
              </style>
      <center><a href="#" class="dropdown-item dropdown-footer text-danger" id="borrarCarrito"><strong>Borrar productos</strong></a></center> `
    );
  }
  $(document).on("click", "#borrarCarrito", function (e) {
    e.preventDefault();
    $.ajax({
      type: "POST",
      url: "borrarCarrito.php",
      dataType: "json",
      success: function (response) {
        llenaCarrito(response);
      },
    });
  });
  var nombreRec = $("#nombreRec").val();
  var emailRec = $("#emailRec").val();
  var direccionRec = $("#direccionRec").val();
  $("#jalar").click(function (e) {
    var nombre = $("#nombre").val();
    var email = $("#email").val();
    var direccion = $("#direccion").val();
    if ($(this).prop("checked") == true) {
      $("#nombreRec").val(nombre);
      $("#emailRec").val(email);
      $("#direccionRec").val(direccion);
    } else {
      $("#nombreRec").val(nombreRec);
      $("#emailRec").val(emailRec);
      $("#direccionRec").val(direccionRec);
    }
  });
});

