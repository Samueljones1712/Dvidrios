<?php 
require_once "database/conexion.php";
require_once "respuestas.class.php";

class orden extends conexion{

    //id_orden, id_cuenta_pk, subtotal, detalles, fechaSolicitud, estado
    private $table = "tb_orden";
    private $id_orden = 0;
    private $id_cuenta_pk = "";
    private $subtotal = "";
    private $detalles = "";
    private $fechaSolicitud = "0000-00-00";
    private $estado = "";

    public function listaOrdenes(){

        $query = "select tb_usuario.nombre,tb_usuario.apellido, id_orden,subtotal, detalles, fechaSolicitud,tb_orden.estado from tb_orden inner join tb_usuario where tb_orden.id_cuenta_pk = tb_usuario.id_usuario;";

        $datos = parent::obtenerDatos($query);


        return ($datos);
    }

    public function listaOrdenesUsuario($usuario){

        $query = "select * from tb_orden where id_cuenta_pk = '".$usuario."';";

        $datos = parent::obtenerDatos($query);

        return ($datos);
    }

    public function obtenerOrden($id){//Obtiene el los detalles de la orden y el nombre del cliente
        $query = "select tb_usuario.nombre, tb_usuario.apellido, tb_usuario.usuario, tb_orden.id_cuenta_pk ,id_orden,subtotal, detalles, fechaSolicitud,tb_orden.estado from tb_orden inner join tb_usuario where tb_orden.id_cuenta_pk = tb_usuario.id_usuario and tb_orden.id_orden=".$id;

        $datos = parent::obtenerDatos($query);

        return $datos;

    }

    public function postOrden($datos){//guardar la orden 

        $_respuestas = new respuestas;

        if(!isset($datos['id_cuenta_pk']) || !isset($datos["subtotal"]) || 
        !isset($datos["subtotal"])){
            return $_respuestas->error_400();
        }else{
            //id, id_cuenta_pk, subtotal, detalles, fechaSolicitud
            $this->id_cuenta_pk = $datos['id_cuenta_pk'];
            $this->subtotal = $datos['subtotal'];
            $this->detalles = $datos['detalles'];
            $resp = $this->insertarOrden();

            if($resp){

                $respuesta = $_respuestas->response;
                $respuesta["result"] = array(
                    "Se guardo la orden:"=>$resp
                );

                return $respuesta;

            }else{
                return $_respuestas->error_500();
            }
        }
    }
    private function insertarOrden(){

        $query =  "Insert into ".$this->table." (id_cuenta_pk,subtotal,detalles,fechaSolicitud) 
        values ('".$this->id_cuenta_pk."','".$this->subtotal."','".$this->detalles."',CURRENT_TIMESTAMP)";

        $resp = parent::nonQueryId($query);

        if($resp != -1){
            return $resp;
        }else{
            return 0;
        }

    }


    public function putOrden($datos){//guardar la orden

        $information = $this->obtenerOrden($datos["id_orden"])[0];

        $this->id_orden = $datos['id_orden'];;
        $this->subtotal = $information["subtotal"];
        $this->detalles = $information["detalles"];
        $this->estado = $information["estado"];
        $this->fechaSolicitud = $information["fechaSolicitud"];
        $this->id_cuenta_pk = $information["id_cuenta_pk"];

        $_respuestas = new respuestas;

        if(!isset($datos['id_orden'])){//Solo necesitamos el id
            return $_respuestas->error_400();
        }else{

            if(isset($datos['id_cuenta_pk'])){
            $this->id_cuenta_pk = $datos['id_cuenta_pk'];

            }if(isset($datos['subtotal'])){
            $this->subtotal = $datos['subtotal'];

            }if(isset($datos['detalles'])){
            $this->detalles = $datos['detalles'];

            }if(isset($datos['fechaSolicitud'])){
            $this->fechaSolicitud = $datos['fechaSolicitud'];

            }if(isset($datos['estado'])){
            $this->estado = $datos['estado'];
            }
            $resp = $this->modificarOrden();

            if($resp){

                $respuesta = $_respuestas->response;
                $respuesta["result"] = array(
                    "id_orden" =>$this->id_orden
                );
                return $respuesta;

            }else{
                return $_respuestas->error_500();
            }
        }
    }

    public function moverOrden($datos){

        $_respuestas = new respuestas;

//        $this->id_orden = 
        $estadoNuevo = $datos["estadoNuevo"];
        $estadoActual = $this->obtenerOrden($datos["id_orden"])[0]["estado"];  

        if($estadoActual=="Espera"){

            if($estadoNuevo=="Atras"){
                //Mensaje de error
                return $_respuestas->error_405();
                
            }else if($estadoNuevo=="Siguiente"){
                //seteamos en Proceso
                $estadoResultado = "Proceso";
            }
        }if($estadoActual=="Proceso"){

            if($estadoNuevo=="Atras"){
                //Seteamos Espera
                $estadoResultado = "Espera";
                
            }else if($estadoNuevo=="Siguiente"){
                //Seteamos Finalizado
                $estadoResultado = "Finalizado";
            }
        }if($estadoActual=="Finalizado"){

            if($estadoNuevo=="Atras"){
                //Seteamos Proceso
                $estadoResultado = "Proceso";
                
            }else if($estadoNuevo=="Siguiente"){
                //Seteamos en Cancelado
                $estadoResultado = "Cancelado";

            }
        }if($estadoActual=="Cancelado"){

            if($estadoNuevo=="Atras"){
                //Seteamos en Finalizado
                $estadoResultado = "Finalizado";
                
            }else if($estadoNuevo=="Siguiente"){
                //Mensaje de error
                return $_respuestas->error_405();
            }
        }

        $resultado = array(
            "id_orden"=>$datos["id_orden"],
            "estado"=>$estadoResultado
        );   

        return $this->putOrden($resultado);

    }

    private function modificarOrden(){

        $query =  "Update ".$this->table." set id_cuenta_pk='".$this->id_cuenta_pk.
                "',subtotal='".$this->subtotal."',detalles='".$this->detalles."',fechaSolicitud='".$this->fechaSolicitud."',estado='".$this->estado."' where id_orden='".$this->id_orden."';";

        $resp = parent::nonQuery($query);

        if($resp >= 1){//responde con las filas afectadas
            return $resp;
        }else{
            return 0;
        }
    }

    public function deleteOrden($datos){

        $_respuestas = new respuestas;

        if(!isset($datos)){//Solo necesitamos el id

            return $_respuestas->error_400();

        }else{

        $this->id_orden = $datos;
           
        $resp = $this->eliminarOrden();

        if($resp){

            $respuesta = $_respuestas->response;
            $respuesta["result"] = array(
                    "id_orden" =>$this->id_orden
            );

            return $respuesta;

        }else{
            return $_respuestas->error_500();
        }
        }

    }


    public function eliminarOrdenesCanceladas(){

        $_respuestas = new respuestas;
        
        $query = "delete from ".$this->table." where estado='Cancelado';";
        $resp = parent::nonQuery($query);
        if($resp >= 1){
            $respuesta = $_respuestas->response;
            return $respuesta;
        }else{
            $respuesta = $_respuestas->error_500();
            return $respuesta;
        }

    }

    private function eliminarOrden(){
        
        $query = "delete from ".$this->table." where id_orden='".$this->id_orden."';";
        $resp = parent::nonQuery($query);
        if($resp >= 1){
            return $resp;
        }else{
            return 0;
        }

    }



}
?>