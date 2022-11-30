<?php
header("Access-Control-Allow-Origin: *");
require_once "app/respuestas.class.php";
require_once "app/cuenta.class.php";

$_cuenta = new cuenta;
$_respuestas = new respuestas;

if (isset($_POST)) {

    switch ($_POST["accion"]) {

        case "consultar":

            $listaCuentas = $_cuenta->listaCuentas();
            echo json_encode($listaCuentas);

            break;
        case "eliminarUsuario":

            $id_usuario = $_POST["id_usuario"];
            $resultado = $_cuenta->deleteCuenta($id_usuario);

            echo json_encode($resultado);

            break;

        case "obtenerUsuario":

            $id_usuario = $_POST["id_usuario"];
            $cuentaEncontrada = $_cuenta->obtenerCuenta($id_usuario);

            echo json_encode($cuentaEncontrada);

            break;

        case "guardarUsuario":

            $id_usuario = $_POST["id_usuario"];

            $array = [ //La informacion se guarda en un array
                "contrasena" => $_POST["contrasena"],
                "nombre" => $_POST["nombre"],
                "apellido" => $_POST["apellido"],
                "email" => $_POST["email"],
                "telefono" => $_POST["telefono"],
                "id_usuario" => $id_usuario
            ];

            if (isset($_POST["usuario"])) { //ya existe

                $usuario = $_POST["usuario"];

                $resultado = $_cuenta->disponibleUsuario($usuario);

                if ($resultado['status'] == 'ok') {

                    $respuesta = $_cuenta->editarUsuario($usuario, $id_usuario);
                    $datosArray = $_cuenta->putCuenta($array); 
                    echo json_encode($respuesta);

                } else {

                    echo json_encode($resultado);
                }
            } else {

                $datosArray = $_cuenta->putCuenta($array); 
                echo json_encode($datosArray);
            }

            break;

        case "saveUsuario":

            $usuario = $_POST["usuario"];
            $nombre = $_POST["nombre"];
            $apellido = $_POST["apellido"];
            $email = $_POST["email"];
            $telefono = $_POST["telefono"];
            $contrasena = $_POST["contrasena"];


            $array = [
                "contrasena" => $contrasena,
                "nombre" => $nombre,
                "apellido" => $apellido,
                "email" => $email,
                "telefono" => $telefono,
                "usuario" => $usuario
            ];

            $datosArray = $_cuenta->postCuenta($array);
            echo json_encode($datosArray);

            break;
            // case "":
            //     break;
    }
}
