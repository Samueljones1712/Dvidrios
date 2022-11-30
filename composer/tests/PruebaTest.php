<?php

use LDAP\Result;
use PHPUnit\Framework\TestCase;

require_once "./app/database/conexion.php";
require_once "./app/database/conexion.php";
require_once "./app/cuenta.class.php";
require_once "./app/respuestas.class.php";
require_once "./app/orden.class.php";
require_once './app/auth.class.php';

// $_cuenta = new cuenta;
$_respuestas = new respuestas;

$_orden = new orden;
$conexion = new conexion;


class PruebaTest extends TestCase
{

    private $id_usuario;
    private $id_orden;
    private $statusOK = "ok";
    private $statusError = "error";

    /** @test */
    public function Caso1ComprobarLogin()
    {

        $_auth = new auth;

        $data = ["usuario" => "xavierjones12345", "contrasena" => "xavierjones12345"];

        $result = $_auth->login($data);

        $this->assertEquals($this->statusOK, $result["status"]);
    }

    /** @test */
    public function comprobarLoginReventar()
    {

        $_auth = new auth;

        $data = ["usuario" => "xavierjoes1234", "contrasena" => "xavierjones12345"];

        $result = $_auth->login($data);

        $this->assertEquals($this->statusOK, $result["status"]);
    }

    /** @test */
    public function insertarUsuario()
    {
        $_cuenta = new cuenta;

        $usuario = [ //La informacion se guarda en un array
            "contrasena" => "xavierjones12345",
            "nombre" => "Xavier",
            "apellido" => "Gomez",
            "email" => "xavierjones12345@gmail.com",
            "telefono" => "86713233",
            "usuario" => "xavierjones12345"
        ];

        $resultado = $_cuenta->postCuenta($usuario);

        $this->assertEquals($this->statusOK, $resultado["status"]);
    }
    /** @test */
    public function Caso2BuscarUsuario($usuario = "xavierjones12345")
    {

        $_cuenta = new cuenta;

        $resultado = $_cuenta->obtenerCuentaUsuario($usuario);

        $this->assertEquals("Xavier", $resultado[0]["nombre"]);

        $this->id_usuario = $resultado[0]["id_usuario"];
    }

    /** @test */
    public function Caso3EliminarUsuario()
    {
        $_cuenta = new cuenta;

        $this->Caso2BuscarUsuario();

        $id_usuario =  $this->id_usuario;

        $resultado = $_cuenta->deleteCuenta($id_usuario);

        $this->assertEquals($this->statusOK, $resultado["status"]);
    }

    /** @test */
    public function Caso4CrearOrden()
    {
        $_orden = new orden;

        $this->Caso2BuscarUsuario();

        $id_cuenta = $this->id_usuario;

        $datos = array(
            "id_cuenta_pk" => $id_cuenta, //EL CLIENTE ESTA QUEMADO
            "detalles" => "El caso 4 crear Orden",
            "subtotal" => "4444"
        );

        $resultado = $_orden->postOrden($datos);

        $this->id_orden = $resultado["result"]["Se guardo la orden:"];

        $this->assertEquals($this->statusOK, $resultado["status"]);
    }

    /** @test */
    public function Caso5CrearOrdenObtener(){//La crea y la obtiene

        $_orden = new orden;

        $this->Caso4CrearOrden();

        $resultado = $_orden->obtenerOrden($this->id_orden);

        $this->assertIsArray($resultado[0]);
    }

    /** @test */
    public function Caso6CrearEliminar(){

        $_orden = new orden;

        $this->Caso5CrearOrdenObtener();

        $id_orden = $this->id_orden;

        $resultado = $_orden->deleteOrden($id_orden);

        var_dump($resultado);

        $this->assertEquals($this->statusOK, $resultado["status"]);

    }

    /** @test */
    public function Caso7Eliminar(){//No la encuentra porque no tiene ID

        $_orden = new orden;

        $id_orden = $this->id_orden;

        $resultado = $_orden->deleteOrden($id_orden);

        var_dump($resultado);

        $this->assertEquals($this->statusError, $resultado["status"]);

    }
}
