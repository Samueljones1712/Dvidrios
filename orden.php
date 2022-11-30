<?php
header("Access-Control-Allow-Origin: *");
require_once "app/respuestas.class.php";
require_once "app/orden.class.php";
require_once "app/cuenta.class.php";

$_cuenta = new cuenta;
$_respuestas = new respuestas;
$_orden = new orden;

//cuando recibe una peticion de tipo get

if (isset($_POST)) {

    switch ($_POST["accion"]) {

        case "guardarOrdenes":
            
            $clienteUsuario = $_POST["clienteUsuario"];

            $id_cuenta = $_cuenta->obtenerCuentaUsuario($clienteUsuario)[0]['id_usuario'];

            $datos = array(
                "id_cuenta_pk"=> $id_cuenta,//EL CLIENTE ESTA QUEMADO
                "detalles"=>$_POST["detalles"],
                "subtotal"=>$_POST["subtotal"]
            );
    
            $resultado = $_orden->postOrden($datos);

             echo json_encode($resultado);
            
            break;

        case "consultar":

            $listaOrdenes = $_orden->listaOrdenes();
            echo json_encode($listaOrdenes);

            break;

        case "obtenerOrden": //obtener una orden

            $id_orden = $_POST["id_orden"];

            $datosOrden = $_orden->obtenerOrden($id_orden);

            echo json_encode($datosOrden);

            break;

        case "eliminarOrden": //eliminar una orden

            $id_orden = $_POST["id_orden"];
            $resultado = $_orden->deleteOrden($id_orden);

            echo json_encode($resultado);

            break;

        case "atras": //orden atras

            $datos = array(
                "id_orden" => $_POST["id_orden"],
                "estadoNuevo" => "Atras"
            );

            $resultado = $_orden->moverOrden($datos);

            echo json_encode($resultado);

            break;

        case "adelante"://si el siguiente es el final se pregunta, puede ser un parametro mas

            $datos = array(
                "id_orden" => $_POST["id_orden"],
                "estadoNuevo" => "Siguiente"
            );

            $resultado = $_orden->moverOrden($datos);

            echo json_encode($resultado);

            break;

        case "actualizarOrden":

            $id_orden = $_POST['id_orden'];
            $detalles = $_POST['detalles'];
            $subtotal = $_POST['subtotal'];

            $datos = array(
                "id_orden" => $id_orden,
                "detalles" => $detalles,
                "subtotal" => $subtotal 
            );
    
            $datosArray = $_orden->putOrden($datos);

            echo json_encode($datosArray);

            break;
        case "eliminarCancelados":

            $resultado = $_orden->eliminarOrdenesCanceladas();

            echo json_encode($resultado);

            break;

        case "consultarPorUsuario":

            $usuarioID = $_POST['id_usario'];

            $resultado =$_orden->listaOrdenesUsuario($usuarioID);

            echo json_encode($resultado);

            

            //echo json_encode($usuarioID);

            break;
    }

}else{

    echo json_encode("Error, el metodo POST no existe.");

}
