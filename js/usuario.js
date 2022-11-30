var url = "./../cuenta.php";

$(document).ready(function () {
    consultarUsuario();

    $('#tabla-orden').DataTable({
        language: {url: 'https://cdn.datatables.net/plug-ins/1.13.1/i18n/es-ES.json'}
    });
})

function validarCampo(tipo,dato){
    emailRegex=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    telfRegex=/^[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/;
    nombreRegex=/\b([A-ZÀ-ÿ][-,a-z. ']+[ ]*)+/;
    passRegex=/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{10,}$/;
    userRegex=/^[a-zA-Z0-9-_]{8,22}$/;
    if(tipo=="usuario"){
        if(!userRegex.test(dato)){
            console.log("usuario invalido");
            Swal.fire({
                icon:'error',
                title:'Formato de usuario incorrecto'
            });
            return false;
        }
    }else if(tipo=="telefono"){
        if(!telfRegex.test(dato)){
            console.log("tel invalido");
            Swal.fire({
                icon:'error',
                title:'Formato de teléfono incorrecto'
            });
            return false;
        }
    }else if(tipo=="nombre" || tipo=="apellido"){
        if(!nombreRegex.test(dato)){
            console.log("invalido");
            Swal.fire({
                icon:'error',
                title:'Formato de nombre incorrecto'
            });
            return false;
        }
    }else if(tipo=="email"){
        if(!emailRegex.test(dato)){
            console.log("invalido");
            Swal.fire({
                icon:'error',
                title:'Formato de email incorrecto'
            });
            return false;
        }
    }else if(tipo=="contrasena"){
        if(!passRegex.test(dato)){
            console.log("invalido");
            Swal.fire({
                icon:'error',
                title:'Formato de contraseña incorrecto',
            });
            return false;
        }
    }
    return true;
}

function mostrarPerfil(id_usuario, usuario, nombre, apellido, telefono, email) {

    var html = "";
    html += "<h5 class='modal-title' id='exampleModalLabel'>Perfil de " + nombre + " " + apellido + "</h5>";
    html += "<button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>";

    document.getElementById('modalHeaderCliente').innerHTML = html;
    html = "";

    information = { "accion": "consultarPorUsuario", "id_usario": id_usuario };

    $.ajax({
        data: information,//Consultar con el ID del usuario
        url: "./../orden.php",
        type: 'POST',
        dataType: 'json'
    }).done(function (response) {

        console.log(response);
        $.each(response, function (index, dato) {

            html += "<tr>";
            html += "<td>" + dato['fechaSolicitud'] + "</td>";
            html += "<td>" + dato['estado'] + "</td>";
            html += "<td>" + dato['subtotal'] + "</td>";
            html += "<td><a class='btn  btn-primary' onclick='verOrden(" + dato.id_orden + ")'>Ver</td>";
            html += "</tr>";
        });
        document.getElementById('tbodyCliente').innerHTML = html;
        
    }).fail(function (response) {
        console.log(response);
    });
    $("#modalCliente").modal('show');
}

function verOrden($idOrden){

    window.location.href = "./../views/listaOrdenes.php";

}

function Reload() {
    location.reload(true);
}

function consultarUsuario() {

    $.ajax({
        data: { "accion": "consultar" },
        url: url,
        type: 'POST',
        dataType: 'json'
    }).done(function (response) {

        var html = "";

        $.each(response, function (index, dato) {

            html += "<tr>";
            html += "<td>" + dato.nombre + " " + dato.apellido + "</td>";
            html += "<td>" + dato.usuario + "</td>";
            html += "<td>" + dato.telefono + "</td>";
            html += "<td>" + dato.email + "</td>";
            html += "<td>";

            if (dato.estado == "Activo") {
                html += "<span class='badge bg-success'>" + dato.estado + "</span>";
            } else {
                html += "<span class='badge bg-danger'>" + dato.estado + "</span>";
            }
            html += "</td><td>";
            html += "<a class='btn btn-info' onclick='mostrarPerfil(" + dato.id_usuario + ",`" + dato.usuario + "`,`" + dato.nombre + "`,`" + dato.apellido + "`,`" + dato.telefono + "`,`" + dato.email + "`);' >Ver</a>";
            html += "<a class='btn btn-warning' onclick='cargarUsuario(" + dato.id_usuario + ");'>Editar</a>";

            if (dato.estado == "Activo") {
                html += "<a class='btn btn-danger' onclick='desactivarUsuario(" + dato.id_usuario + ");'>Desactivar</a>";
            } else {
                html += "<a class='btn btn-success' onclick='desactivarUsuario(" + dato.id_usuario + ");'>Activar</a>";
            }
            html += "</td></tr>";
        });
        document.getElementById("contenedor-cliente").innerHTML = html;
        $('#tabla-usuarios').DataTable({
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.13.1/i18n/es-ES.json'
            }
        });
    });
}

function desactivarUsuario(id_usuario) {

    console.log(id_usuario);

    $.ajax({
        data: { "accion": "eliminarUsuario", "id_usuario": id_usuario },
        url: url,
        type: 'POST',
        dataType: 'json'
    }).done(function (response) {

        console.log(response['result']['nuevo estado']);

        Swal.fire({
            icon: 'success',
            title: 'La cuenta se ' + response['result']['nuevo estado'].toLowerCase() + ' correctamente.',
            showConfirmButton: false,
            timer: 1000
        })

        setInterval(function () {
            location.reload(true); // this will run after every 5 seconds
        }, 1050);

    });
}

function cargarUsuario(id_usuario) {

    $.ajax({
        data: { "accion": "obtenerUsuario", "id_usuario": id_usuario },
        url: url,
        type: 'POST',
        dataType: 'json'
    }).done(function (response) {

        document.getElementById('nombre_g').value = response[0].nombre;
        document.getElementById('apellido_g').value = response[0].apellido;
        document.getElementById('usuario_g').value = response[0].usuario;
        document.getElementById('telefono_g').value = response[0].telefono;
        document.getElementById('contrasena_g').value = response[0].contrasena;
        document.getElementById('id_usuario_g').value = response[0].id_usuario;
        document.getElementById('email_g').value = response[0].email;

        console.log(response);

        var html = "";
        html += "<button type='button' class='btn btn-danger' style='margin-left:5px; margin-right:5px;' data-bs-dismiss='modal' aria-label='Close'>Cancelar</button>";
        html += "<a class='btn btn-success' style='margin-left:5px; margin-right:5px;' onclick='editarUsuario(" + response[0].id_usuario + ",`" + response[0].usuario + "`" + ");'>Actualizar</a>"//cierro el modal

        document.getElementById("contenedorBotones").innerHTML = html;

        $("#modalUsuario").modal('show');

    });

}
//insertarUsuario
function editarUsuario(id_usuario, usuarioOriginal) {

    nombre = document.getElementById('nombre_g').value;
    apellido = document.getElementById('apellido_g').value;
    telefono = document.getElementById('telefono_g').value;
    contrasena = document.getElementById('contrasena_g').value;
    id_usuario = document.getElementById('id_usuario_g').value;
    email = document.getElementById('email_g').value;
    usuario = document.getElementById('usuario_g').value;

    if(validarCampo("nombre",nombre) && validarCampo("apellido",apellido) && 
    validarCampo("telefono",telefono) && validarCampo("contrasena",contrasena) &&
     validarCampo("email",email)){

    //Validar que no tengan los mismos valores que al inicio

    if (usuarioOriginal == usuario) {//si son iguales los usuarios quiere decir que no se esta editando

        information = { "accion": "guardarUsuario", "id_usuario": id_usuario, "contrasena": contrasena, "nombre": nombre, "apellido": apellido, "email": email, "telefono": telefono };

    } else {

        information = { "accion": "guardarUsuario", "id_usuario": id_usuario, "usuario": usuario, "contrasena": contrasena, "nombre": nombre, "apellido": apellido, "email": email, "telefono": telefono };

    }

    $.ajax({
        data: information,
        url: url,
        type: 'POST',
        dataType: 'json'
    }).done(function (response) {//no esta sirviendo el reload

        console.log(response);
        if (response["status"] == "ok") {
            Swal.fire({
                icon: 'success',
                title: 'Se edito la cuenta correctamente.',
                showConfirmButton: false,
                timer: 1000
            })

            setInterval(function () {
                location.reload(true); // this will run after every 5 seconds
            }, 1050);

        } else {

            Swal.fire({
                icon: 'warning',
                title: 'No se edito la cuenta.',
                showConfirmButton: false,
                timer: 1000
            });
        }

    }).fail(function (response) {

        Swal.fire({
            icon: 'warning',
            title: 'No se pudo editar la cuenta.',
            showConfirmButton: false,
            timer: 1000
        })

    });
    }
}

