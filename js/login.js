function enviarFormulario(){

    usuario = document.getElementById("usuario").value;
    password = document.getElementById("clave").value;

    //if(validarCampo("usuario",usuario) && validarCampo("contrasena",password)){

    information = {"consulta": "logearse","usuario":usuario,"contrasena":password};

    $.ajax({
        data: information,
        url: "./../auth.php",
        type: 'POST',
        dataType: 'json'
    }).done(function (response) {

        console.log();

        if(response['status']=='ok'){

            Swal.fire({
                icon: 'success',
                title: 'Sesion iniciada correctamente.',
                showConfirmButton: false,
                timer: 1000
            });
            setInterval(function () {
                window.location.href="./../views/muro.php";
            }, 1050);

        }else{

            Swal.fire({
                icon: 'warning',
                title: response["result"]["error_msg"],
                showConfirmButton: false,
                timer: 1060
            });
        }



    });
}
//}


function validarCampo(tipo,dato){
    emailRegex=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    telfRegex=/^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/;
    nombreRegex=/\b([A-ZÀ-ÿ][-,a-z. ']+[ ]*)+/;
    passRegex=/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{10,}$/;
    if(tipo=="telefono"){
        if(!telfRegex.test(dato)){
            console.log("tel invalido");
            Swal.fire({
                icon:'error',
                title:'Formato de teléfono incorrecto',
                button: 'OK'
            })
        }
    }else if(tipo=="nombre" || tipo=="apellido"){
        if(!nombreRegex.test(dato)){
            console.log("invalido");
            Swal.fire({
                icon:'error',
                title:'Formato de nombre incorrecto',
                button: 'OK'
            })
        }
    }else if(tipo=="email"){
        if(!emailRegex.test(dato)){
            console.log("invalido");
            Swal.fire({
                icon:'error',
                title:'Formato de email incorrecto',
                button: 'OK'
            })
        }
    }else if(tipo=="contrasena"){
        if(!passRegex.test(dato)){
            console.log("invalido");
            Swal.fire({
                icon:'error',
                title:'Formato de contraseña incorrecto',
                button: 'OK'
            })
        }
    }
}