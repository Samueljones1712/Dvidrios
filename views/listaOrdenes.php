<?php
// $page = 1;

// $ch = curl_init("http://localhost/BackEnd/orden.php");

// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// $response = curl_exec($ch);

// curl_close($ch);

// $array = json_decode($response, true);
?>

<?php include "./templates/header.php" ?>
<?php include "./templates/navbar.php" ?>

<div style="margin-top: 5px; display: flex; justify-content: center;">
    <a class="btn btn-primary" style='margin-left:3px; margin-right:3px;' onclick="mostrarAgregar()">Agregar Orden</a>
    <a class="btn btn-danger" style='margin-left:3px; margin-right:3px;' onclick="eliminarCanceladas()">Limpiar Canceladas</a>
</div>

<div style="margin-top: 5px;" class="contenedor-tabla-ordenes">
    <div class="col-md-12">
        <div class="card mb-4">
            <table cellpadding="0" style="width: 100%;" cellspacing="0" border="0" class="tabla-ordenes" style="height: 170px;">
                <thead>
                    <th scope="col">Espera</th>
                    <th scope="col">Proceso</th>
                    <th scope="col">Finalizado</th>
                    <th scope="col">Cancelado</th>
                </thead>
                <tbody id="datosOrdenes" style="text-align: -webkit-center;     background-color: white;">



                </tbody>
            </table>
            
        </div>
    </div>

</div>

<br>
<br>

<?php include "./templates/footer.php" ?>

<!--Modal inicio-->

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="display: table;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Orden</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <!--Inicio contenido modal-->

                <div id="nombreCliente">
                    <!--Aqui el ajax pone el nombre -->
                </div>

                <form action="../orden.php" method="POST" class="formulario-orden">
                    <input id='idOrden' name="id_orden" type="hidden" value="" />
                    <div style="display: grid;">
                        <label style="margin-top: 10px;" >Notas:</label>

                        <textarea id="detallesOrden" rows="2" cols="10" name="detalles" value="" style="width: 170px;"></textarea>
                        <label style="margin-top: 10px;" for="Subtotal">Subtotal:</label>

                        <input id="subtotalOrden" style="width: 100px;" name="subtotalOrden" onclick="soloNumeros()" min="0" type="number" />
                    </div>
                    <!--<input id='detalles' name="detalles" class="input-formulario" onclick="sololetras();" type="text" value="<?= $datos["detalles"] ?>" required>-->
                </form>

                <div id="contenedorBotones" style="margin-top: 15px; display: flex; justify-content: center;">
                    <!--Aqui el ajax pone los botones -->

                </div>

                <!-- Fin del contenido del modal -->
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="modalAgregar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="display: table;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar Orden </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-agregar">

                <div class="modal-body">
                    <!--Inicio contenido modal-->
                    <div>
                        <!--Aqui el ajax pone el nombre -->
                        <div class='cliente-div'>
                            <label>Clientes:</label>
                                <input id='clienteSeleccionado' list="listaC" type="text" style="width: 170px;"/>
                                <datalist id="listaC">
                                </datalist>
                        </div>

                    </div>
                    <form action="" method="POST">

                        <div style="display: grid;">

                            <label style="margin-top: 10px;">Notas:</label>

                            <textarea id="guardar_detalles" rows="2" cols="10" name="detalles" value="" style="width: 170px;"></textarea>

                            <label style="margin-top: 10px;" for="Subtotal">Subtotal:</label>
                            <input id='guardar_subtotal' style="width: 100px;" name="subtotalOrden" onclick="soloNumeros()" min="0" type="number" />
                        </div>
                        <!--<input id='detalles' name="detalles" class="input-formulario" onclick="sololetras();" type="text" value="<?= $datos["detalles"] ?>" required>-->
                    </form>

                    <div id="contenedorBotones" style="margin-top: 15px; display: flex; justify-content: center;">
                        <!--Aqui el ajax pone los botones -->
                        <button style='margin-left:3px; margin-right:3px;' type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button style='margin-left:3px; margin-right:3px;' onclick="guardarOrden();" class="btn btn-success" value="Confirmar">Guardar</button>

                    </div>

                    <!-- Fin del contenido del modal -->


                    <!-- Fin del contenido del modal -->
                </div>
            </div>
        </div>
    </div>

    <!--Modal final-->

 

    <style>

        .cliente-div{
            display: flex;
    flex-direction: column;
        }


    </style>

    <script src="../js/orden.js"></script>
  