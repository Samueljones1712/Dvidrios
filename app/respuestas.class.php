<?php 

class respuestas{

    public $response = ['status' => "ok",
    "result" => array()];

//Hay que agregar otros posibles errores

public function error_405(){

    $this->response['status'] = "error";
    $this->response['result'] = array(
        "error_id" => "405",
        "error_msg" => "Metodo no permitido"

    );

    return $this->response;
}


public function error_200($valor = "Datos incorrectos"){

    $this->response['status'] = "error";
    $this->response['result'] = array(
        "error_id" => "200",
        "error_msg" => $valor

    );

    return $this->response;
}

public function error_400(){

    $this->response['status'] = "error";
    $this->response['result'] = array(
        "error_id" => "400",
        "error_msg" => "Datos enviados incompletos o formato incorrecto"

    );

    return $this->response;
}

public function error_500($valor = "Error interno del servidor"){

    $this->response['status'] = "error";
    $this->response['result'] = array(
        "error_id" => "200",
        "error_msg" => $valor

    );

    return $this->response;
}

public function error_600($valor = "Error usuario ocupado"){

    $this->response['status'] = "error";
    $this->response['result'] = array(
        "error_id" => "200",
        "error_msg" => $valor

    );

    return $this->response;
}

}

?>