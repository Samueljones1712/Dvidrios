<?php 
require_once 'app/respuestas.class.php';
require_once 'app/auth.class.php';

$_respuestas = new respuestas;
$_auth = new auth;

if(isset($_POST["consulta"])){//Permitimos primero un pos
    
    //Recibimos datos
//    $postBody = file_get_contents("php://input");//La solicitud del post
    //Enviamos los datos al manejador

    $data = [
        "usuario"=>$_POST['usuario'],
        "contrasena"=>$_POST['contrasena']
    ];

    $datosArray = $_auth->login($data);//La mandamos al login
    //devolvemos la respuesta
    header('Content-type: application/json');
    if(isset($datosArray["result"]["error_id"])){
        $responseCode = $datosArray["result"]["error_id"];
        http_response_code(203);
    }else if(($datosArray['status'])=="ok"){
        http_response_code(200);
//        print_r("OK");
//        header("Location: http://localhost/BackEnd/views/muro.php");

    }
    echo json_encode($datosArray);


}else{

    
    $datosArray = $_respuestas->error_405();
    echo json_encode($datosArray);  
}

?>
