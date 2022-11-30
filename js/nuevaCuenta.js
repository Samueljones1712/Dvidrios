var url = "./../cuenta.php";


function saveUsuario() {
    nombre = document.getElementById('nombre_g').value;
    apellido = document.getElementById('apellido_g').value;
    telefono = document.getElementById('telefono_g').value;
    contrasena = document.getElementById('contrasena_g').value;
    email = document.getElementById('email_g').value;
    usuario = document.getElementById('usuario_g').value;

    if(validarCampo("nombre",nombre) && validarCampo("apellido",apellido) && 
    validarCampo("telefono",telefono) && validarCampo("contrasena",contrasena) &&
     validarCampo("email",email)){

     information = {"accion": "saveUsuario", "usuario":usuario,"nombre":nombre,"apellido":apellido,"email":email,"telefono":telefono,"contrasena":contrasena};

    $.ajax({
        data: information,
        url: url,
        type: 'POST',
        dataType: 'json'
    }).done(function (response) {//no esta sirviendo el reload
console.log(response);
if(response["status"]=="ok"){

    Swal.fire({
        icon: 'success',
        title: 'Se guardo la cuenta correctamente.',
        showConfirmButton: false,
        timer: 1000
      })

      setInterval(function(){
       window.location.href="./../views/login.php";
  
    }, 1050);

}else{

    Swal.fire({
        icon: 'warning',
        title: 'El usuario ya esta ocupado.',
        showConfirmButton: false,
        timer: 2000
      })
}

    }).fail(function(response) {
        console.log(response);
    });
}
}


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
    }else if(tipo=="nombre"){
        if(!nombreRegex.test(dato)){
            console.log("invalido");
            Swal.fire({
                icon:'error',
                title:'Formato de nombre incorrecto'
            });
            return false;
        }
    }else if(tipo=="apellido"){
        if(!nombreRegex.test(dato)){
            console.log("invalido");
            Swal.fire({
                icon:'error',
                title:'Formato de apellido incorrecto'
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
function alert(){

}