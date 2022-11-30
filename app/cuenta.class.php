<?php
require_once "database/conexion.php";
require_once "respuestas.class.php";

class cuenta extends conexion
{

    private $table = "tb_usuario";
    //id_usuario, usuario, nombreCompleto, contrasena, email, telefono
    private $id_usuario = 0;
    private $usuario = "";
    private $nombre = "";
    private $apellido = "";
    private $contrasena = "";
    private $email = "";
    private $estado = "";
    private $telefono = "0000 0000";

    public function listaCuentas($pagina = 1)
    {

        // $inicio = 0; //para saber porque registro empezamos
        // $cantidad = 100;

        // if ($pagina > 1) {

        //     $inicio = ($cantidad * ($pagina - 1)) + 1;
        //     $cantidad = ($cantidad * $pagina);

        // }//. " limit $inicio,$cantidad"

        $query = "select * from " . $this->table;
        //$query = "select tb_usuario.nombreCompleto, subtotal, detalles, fechaSolicitud from tb_orden inner join tb_usuario where tb_orden.id_cuenta_pk = tb_usuario.id_usuario;";

        $datos = parent::obtenerDatos($query);

        return ($datos);
    }

    public function obtenerCuenta($id)
    {
        $query = "select * from " . $this->table . " where id_usuario=" . $id;

        $datos = parent::obtenerDatos($query);

        return ($datos);
    }

    public function borrarCuenta($id)
    {
        $query = "delete from " . $this->table . " where usuario=" . $id;

        $datos = parent::nonQuery($query);

        return ($datos);
    }

    public function obtenerCuentaUsuario($usuario)
    {
        $query = "select * from " . $this->table . " where usuario='" . $usuario . "';";

        $datos = parent::obtenerDatos($query);

        return $datos;
    }

    public function disponibleUsuario($usuario)
    {
        $_respuestas = new respuestas;

        $query = "select * from " . $this->table . " where usuario='" . $usuario . "';";

        $datos = parent::obtenerDatos($query);
        
        if(empty($datos)){//Si no tiene ID esta vacio

            
            $respuesta = $_respuestas->response;
            $respuesta["result"] = array("Tiene el usuario disponible");

        }else{

            $respuesta = $_respuestas->error_600();

        }

        return $respuesta;
    }

    public function postCuenta($datos)
    { //guardar la orden

        $_respuestas = new respuestas;

        // if (!isset($datos['usuario']) || !isset($datos["nombre"]) || !isset($datos["apellido"])
        //     || !isset($datos["contrasena"]) || !isset($datos["telefono"])) {
        //     return $_respuestas->error_400();

        // } else {

            $this->usuario = $datos['usuario'];
            $this->nombre = $datos['nombre'];
            $this->apellido = $datos['apellido'];
            $this->contrasena = $datos['contrasena'];
            $this->telefono = $datos['telefono'];

 //           if (isset($datos['email'])) {
                $this->email = $datos['email'];
//            }
            $resp = $this->insertarCuenta();

            if ($resp) {

                $respuesta = $_respuestas->response;
                $respuesta["result"] = array(
                    "Se guardo la cuenta:" => $resp
                );
                return $respuesta;
            } else {
                return $_respuestas->error_500();
            }
//        }
    }
    private function insertarCuenta()
    {

        $query =  "Insert into " . $this->table . " (usuario,nombre,apellido,contrasena,telefono,email) 
        values ('" . $this->usuario . "','" . $this->nombre . "','" . $this->apellido . "','" . $this->contrasena . "','" . $this->telefono . "','" . $this->email . "')";

        $resp = parent::nonQuery($query);

        if ($resp != -1) {
            return $resp;
        } else {
            return 0;
        }
    }


    public function putCuenta($datos)
    { //guardar la orden


        $_respuestas = new respuestas;

        $informacion = $this->obtenerCuenta($datos["id_usuario"]);

        $this->apellido = $informacion[0]['apellido'];
        $this->nombre = $informacion[0]['nombre'];
        $this->contrasena = $informacion[0]['contrasena'];
        $this->email = $informacion[0]['email'];
        $this->telefono = $informacion[0]['telefono'];
        $this->estado = $informacion[0]['estado'];
        $this->id_usuario = $informacion[0]['id_usuario'];

        $this->id_usuario = $datos['id_usuario'];

        if (isset($datos['nombre'])) {
            $this->nombre = $datos['nombre'];
        }
        if (isset($datos['apellido'])) {
            $this->apellido = $datos['apellido'];
        }
        if (isset($datos['contrasena'])) {
            $this->contrasena = $datos['contrasena'];
        }
        if (isset($datos['email'])) {
            $this->email = $datos['email'];
        }
        if (isset($datos['telefono'])) {
            $this->telefono = $datos['telefono'];
        }
        if (isset($datos['estado'])) {
            $this->estado = $datos['estado'];
        }

        $resp = $this->modificarCuenta();

        if ($resp) {
            $respuesta = $_respuestas->response;
            $respuesta["result"] = array("id_usuario" => $this->id_usuario);
            return $respuesta;
        } else {
            return $_respuestas->error_500();
        }
    }

    private function existeUsuario(){
        $query = "select * from ".$this->table." where usuario='".$this->usuario."';";

        $resp = parent::obtenerDatos($query);

    }

    private function modificarCuenta()
    {
        //id_usuario, usuario, nombre, apellido, contrasena, email, telefono, estado

        $query =  "Update " . $this->table . " set nombre='" . $this->nombre .
            "', apellido='" . $this->apellido . "', contrasena='" . $this->contrasena . "', email='" . $this->email . "', telefono='" . $this->telefono . "' where id_usuario='" . $this->id_usuario . "';";
        $resp = parent::nonQuery($query);

        if ($resp >= 1) { //responde con las filas afectadas
            return $resp;
        } else {
            return $resp;
        }
    }

    public function editarUsuario($usuario, $id_usuario){

        $_respuestas = new respuestas;

        $this->usuario = $usuario;
        $this->id_usuario = $id_usuario;

        $resp = $this->modificarUsuario();

        if ($resp) {
            $respuesta = $_respuestas->response;
            $respuesta["result"] = array("id_usuario" => $this->id_usuario);
            return $respuesta;
            //return $resp;
        } else {
            return $_respuestas->error_500();
            //return $resp;
        }
    }

    private function modificarUsuario()
    {
        //id_usuario, usuario, nombre, apellido, contrasena, email, telefono, estado

        $query =  "Update " . $this->table . " set usuario='" . $this->usuario .
            "' where id_usuario='" . $this->id_usuario . "';";

        $resp = parent::nonQuery($query);

        if ($resp >= 1) { //responde con las filas afectadas
            return $resp;
        } else {
            return $resp;
        }
    }

    public function deleteCuenta($datos)
    {

        $_respuestas = new respuestas;

        if (!isset($datos)) { //Solo necesitamos el id
            return $_respuestas->error_400();
        } else {
            $this->id_usuario = $datos;

            $datos = $this->obtenerDatosCuenta();

            $this->estado = $datos[0]['estado'];

            $resp = $this->eliminarCuenta();

            if ($resp) {

                $respuesta = $_respuestas->response;
                $respuesta["result"] = array(
                    "id_usuario" =>  $this->id_usuario,
                    "nuevo estado" => $this->estado
                );

                return $respuesta;
            } else {
                return $_respuestas->error_500();
            }
        }
    }

    private function eliminarCuenta()
    {

        if ($this->estado == "Activo") {
            $this->estado = "Inactivo";
        } else if ($this->estado == "Inactivo") {
            $this->estado = "Activo";
        } else {
            $this->estado = "Activo";
        }

        $query = "Update " . $this->table . " set estado='" . $this->estado . "' where id_usuario='" . $this->id_usuario . "';";

        $resp = parent::nonQuery($query);
        if ($resp >= 1) {
            return $resp;
        } else {
            return 0;
        }
    }

    public function obtenerDatosCuenta()
    {

        $query = "select * from tb_usuario where id_usuario='" . $this->id_usuario . "';";
        $datos = parent::obtenerDatos($query);

        if (isset($datos[0]["id_usuario"])) {

            return $datos;
        } else {

            return 0;
        }
    }
}
