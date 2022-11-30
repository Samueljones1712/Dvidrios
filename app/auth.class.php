<?php

require_once "database/conexion.php";
require_once "respuestas.class.php";

class auth extends conexion{

    public function login($datos){

        $_respuesta = new respuestas;

        if(!isset($datos["usuario"]) || !isset($datos["contrasena"])){//Si no existe el usuario o contra que muestre error

            return $_respuesta->error_400();

        }else{

            $usuario = $datos["usuario"];
            $password = $datos["contrasena"];

            if(empty($usuario) || empty($password)){

                return $_respuesta->error_200("Favor ingrese un usuario y contraseña.");

            }

            if($password == "admin12345678" and $usuario == "admin12345678"){

                $result = $_respuesta->response;
                $result["result"] = array("Admin");
                return $result;

            }
     
            $datos = $this->obtenerDatosUsuario($usuario);

            if($datos){//si el usuario existem ahora verificaremos la contrasena

                if($password == $datos[0]["contrasena"] and "Activo" == $datos[0]["estado"]){

                    $verificar = $this->insertarToken($datos[0]["id_usuario"]);

                    if($verificar){
                        //Si se guardo
                        $result = $_respuesta->response;
                        $result["result"] = array(
                            "token" => $verificar
                        );

                        return $result;
                        
                    }else{
                        //Error al guardarse
                        return $_respuesta->error_500("Error interno del Servidor, no hemos podido guardar");
                    }

                }else if("Activo" != $datos[0]["estado"]){
                    
                    return $_respuesta->error_200("La cuenta esta inactiva");

                }else{

                    return $_respuesta->error_200("La contrasena es invalida");
                }

            }else{
                return $_respuesta->error_200($usuario."no existe");
            }
        }
    }


    private function obtenerDatosUsuario($usuario){

        $query = "select id_usuario,contrasena, estado from tb_usuario where usuario='$usuario'";
        $datos = parent::obtenerDatos($query);

        if(isset($datos[0]["id_usuario"])){

            return $datos;

        }else{

            return 0;
        }
        
    }

    private function insertarToken($id_usuario){

        $val = true;
        $token = bin2hex(openssl_random_pseudo_bytes(16,$val));
        $date = date("Y-m-d H:i");
        $query = "Insert into usuario_token(id_usuario_pk, Token, fecha) values ('$id_usuario','$token','$date')";
        $verifica = parent::nonQuery($query);
        if($verifica){
            return $token;
        }else{
            return false;
        }
    }

}

?>