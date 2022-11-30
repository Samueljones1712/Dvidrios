var url = "./../orden.php";

$(document).ready(function () {

    consultarOrdenes();
})

function buscarCliente() {

    var html = "";

    $.ajax({
        data: { "accion": "consultar" },
        url: "./../cuenta.php",
        type: 'POST',
        dataType: 'json'
    }).done(function (response) {

        $.each(response, function (index, data) {

            html += "<option value='" + data.usuario + "'>" + data.nombre + " " + data.apellido;
        });

        document.getElementById('listaC').innerHTML = html;

    });
}

function eliminarCanceladas() {

    Swal.fire({
        icon: 'warning',
        title: '¿Estas seguro que desear continuar?',
        text: 'Las ordenes eliminadas no se pueden recuperar.',
        showCancelButton: true,
        confirmButtonText: "Sí, eliminar",
        cancelButtonText: "Cancelar",

    }).then(resultado => {

        if (resultado.value) {
            $.ajax({
                data: { "accion": "eliminarCancelados" },
                url: url,
                type: 'POST',
                dataType: 'json'
            }).done(function (response) {

                console.log(response);

                if (response['status'] == 'ok') {

                    Swal.fire({
                        icon: 'success',
                        title: 'Se eliminaron las ordenes correctamente.',
                        showConfirmButton: false,
                        timer: 1000
                    });
                    setInterval(function () {
                        location.reload(true); // this will run after every 5 seconds
                    }, 1050);

                } else {

                    Swal.fire({
                        icon: 'warning',
                        title: 'No se pudieron eliminar las ordenes',
                        text: 'No existen ordenes para eliminar.',
                        showConfirmButton: false,
                        timer: 3000
                    });

                }
            });
        } else {
        }

    });
}

function consultarOrdenes() {

    $.ajax({
        data: { "accion": "consultar" },
        url: url,
        type: 'POST',
        dataType: 'json'
    }).done(function (response) {
        var html = "";

        $.each(response, function (index, data) {
            html += "<tr>";
            if (data.estado == "Espera") {
                html += "<td>";
            } if (data.estado == "Proceso") {
                html += "<td></td><td>";
            } if (data.estado == "Finalizado") {
                html += "<td></td><td></td><td>";
            } if (data.estado == "Cancelado") {
                html += "<td></td><td></td><td></td><td>";
            }

            html += "<div class='contenedor-orden' style='margin-top:8px;'>";
            html += "<h6>Cliente: " + data.nombre + " " + data.apellido + "</h6>";
            html += "<H6>Costo: " + data.subtotal + "</H6>";

            html += "<H6>Fecha: " + data.fechaSolicitud + "</H6>";
            html += "<div class='contenedor-botones-orden'>";
            html += "<button type='button' class='btn-primario' onclick='moverAtras(" + data.id_orden + ");'> <img src='../img/arrowLeft.png' alt='' height='24px' width='24px'></button>";
            html += "<button type='button' class='btn-secundario' style='margin-left: 3px; margin-right: 3px;' onclick='seleccionarOrden(" + data.id_orden + ");'><img src='../img/info.png' alt='' height='24px' width='24px'></button></button>";
            html += "<button type='button' class='btn-primario' onclick='moverAdelante(" + data.id_orden + ");'><img src='../img/arrowRight.png' alt='' height='24px' width='24px'></button>";
            html += "</div>";
            html += "</div>";

            if (data.estado == "Espera") {
                html += "</td><td></td><td></td><td></td>";
            } if (data.estado == "Proceso") {
                html += "</td><td></td><td></td>";
            } if (data.estado == "Finalizado") {
                html += "</td><td></td>";
            } if (data.estado == "Cancelado") {
                html += "</td>";
            }
            html += "</tr>";
            //data table $('#tabla').DataTable();
        });
        document.getElementById("datosOrdenes").innerHTML = html;

    }).fail(function (response) {
        console.log(response);
    });
}

function moverAtras(id_orden) {

    $.ajax({
        data: { "accion": "atras", "id_orden": id_orden },
        url: url,
        type: 'POST',
        dataType: 'json'
    }).done(function (response) {


        if (response['status'] == 'error') {

            console.log(response);

            Swal.fire({
                icon: 'warning',
                title: 'No se puede retroceder mas.',
                showConfirmButton: false,
                timer: 1100
            })

        } else {

            self.location.replace(location['href']);
            location.reload(true);

        }
    });

}

function moverAdelante(id_orden) {

    $.ajax({
        data: { "accion": "adelante", "id_orden": id_orden },
        url: url,
        type: 'POST',
        dataType: 'json'
    }).done(function (response) {

        if (response['status'] == 'error') {

            console.log(response);

            Swal.fire({
                icon: 'warning',
                title: 'Ya se cancelo la orden.',
                showConfirmButton: false,
                timer: 1100
            })


        } else {

            self.location.replace(location['href']);
            location.reload(true);

        }

        // self.location.replace(location['href']);
        // location.reload(true); 

    });
}

function seleccionarOrden(id_orden) {

    $.ajax({
        data: { "accion": "obtenerOrden", "id_orden": id_orden },
        url: url,
        type: 'POST',
        dataType: 'json'
    }).done(function (response) {

        var html = "";

        console.log(response);

        html += "<h6>Cliente: " + response[0].nombre + " " + response[0].apellido + "</h6>";
        document.getElementById('idOrden').value = id_orden;
        document.getElementById('nombreCliente').innerHTML = html;
        document.getElementById('detallesOrden').value = response[0].detalles;
        document.getElementById('subtotalOrden').value = response[0].subtotal;
        html = "";//lo reseteamos
        html += "<a class='btn btn-danger' style='margin-left:3px; margin-right:3px;' onclick='eliminarOrden(" + id_orden + ");'>Eliminar</a>";
        html += "<a class='btn btn-warning' style='margin-left:3px; margin-right:3px;' onclick='actualizarOrden(" + id_orden + ");'>Actualizar</a>";

        document.getElementById('contenedorBotones').innerHTML = html;
        $("#exampleModal").modal('show');
    });
}


function eliminarOrden(id_orden) {

    Swal.fire({
        icon: 'warning',
        title: '¿Estas seguro que desear continuar?',
        text: 'Las ordenes eliminadas no se pueden recuperar.',
        showCancelButton: true,
        confirmButtonText: "Sí, eliminar",
        cancelButtonText: "Cancelar",

    }).then(resultado => {

        if (resultado.value) {

            $.ajax({
                data: { "accion": "eliminarOrden", "id_orden": id_orden },
                url: url,
                type: 'POST',
                dataType: 'json'
            }).done(function (response) {
        
                console.log(response);
        
                if (response['status'] == 'ok') {
        
                    Swal.fire({
                        icon: 'success',
                        title: 'Se elimino la orden correctamente.',
                        showConfirmButton: false,
                        timer: 1000
                    });
        
                    setInterval(function () {
                        location.reload(true); // this will run after every 5 seconds
                    }, 1050);
    
                }
            });

        } else {
        }

    });
}

// function eliminarOrden(id_orden) {



//     $.ajax({
//         data: { "accion": "eliminarOrden", "id_orden": id_orden },
//         url: url,
//         type: 'POST',
//         dataType: 'json'
//     }).done(function (response) {

//         console.log(response);

//         if (response['status'] == 'ok') {

//             Swal.fire({
//                 icon: 'success',
//                 title: 'Se elimino la orden correctamente.',
//                 showConfirmButton: false,
//                 timer: 1000
//             });

//             setInterval(function () {
//                 location.reload(true); // this will run after every 5 seconds
//             }, 1050);

//         }
//     });
// }

function actualizarOrden(id_orden) {

    detalles = document.getElementById('detallesOrden').value;
    subtotal = document.getElementById('subtotalOrden').value;

    information = { "accion": "actualizarOrden", "id_orden": id_orden, "detalles": detalles, "subtotal": subtotal };

    $.ajax({
        data: information,
        url: url,
        type: 'POST',
        dataType: 'json'
    }).done(function (response) {

        if (response['status'] == 'ok') {

            Swal.fire({
                icon: 'success',
                title: 'Se edito la orden correctamente.',
                showConfirmButton: false,
                timer: 1000
            })

            setInterval(function () {
                location.reload(true); // this will run after every 5 seconds
            }, 1050);

        }

        // console.log(response);
        // $("#exampleModal").modal('hide');
        // self.location.replace(location['href']);
        // location.reload(true); 

    });
}
function mostrarAgregar() {

    buscarCliente();

    $("#modalAgregar").modal('show');
}

function guardarOrden() {

    detalles = document.getElementById('guardar_detalles').value;
    subtotal = document.getElementById('guardar_subtotal').value;

    cliente = document.getElementById('clienteSeleccionado').value; //WORKS

    if (cliente.lenght == 0 || cliente == "") {

        Swal.fire({
            icon: 'warning',
            title: 'Ingrese un cliente.',
            showConfirmButton: false,
            timer: 1300
        });


    } else if (subtotal.lenght == 0 || subtotal == 0) {

        Swal.fire({
            icon: 'warning',
            title: 'Ingrese un subtotal.',
            showConfirmButton: false,
            timer: 1300
        });

    } else {

        accion = "guardarOrdenes";

        $.ajax({
            data: { "accion": accion, "clienteUsuario": cliente, "detalles": detalles, "subtotal": subtotal },
            url: url,
            type: 'POST',
            dataType: 'json'
        }).done(function (response) {

            console.log(response);

            if (response['status'] == 'ok') {

                Swal.fire({
                    icon: 'success',
                    title: 'Se guardo la orden correctamente.',
                    showConfirmButton: false,
                    timer: 1000
                });
                setInterval(function () {
                    location.reload(true); // this will run after every 5 seconds
                }, 1050);
            }
        }
        ).fail(function (response) {

            Swal.fire({
                icon: 'warning',
                title: 'El usuario seleccionado no existe.',
                showConfirmButton: false,
                timer: 1200
            });

        });;


    }
}
