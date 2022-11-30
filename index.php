<?php 
require_once "app/database/conexion.php";

$conexion = new conexion;

require_once "app/respuestas.class.php";
require_once "app/cuenta.class.php";

$_cuenta = new cuenta;
$_respuestas = new respuestas;


header("Location: http://localhost/BackEnd/views/login.php");

//    echo json_encode($_POST);

            // $id_usuario = $_POST["id_usuario"];
            // $usuario = $_POST["usuario"];

            // // if(){//ya existe

            // // }

            // $array = [ //La informacion se guarda en un array
            //     //                "usuario" => $_POST["usuario"],
            //     "contrasena" => $_POST["contrasena"],
            //     "nombre" => $_POST["nombre"],
            //     "apellido" => $_POST["apellido"],
            //     "email" => $_POST["email"],
            //     "telefono" => $_POST["telefono"],
            //     "id_usuario" => $id_usuario
            // ];

            //$datosArray = $_cuenta->putCuenta($array); //No actualiza usuario
            //echo json_encode($datosArray);

?>