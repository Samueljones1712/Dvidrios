<?php
// $id = $_GET["idOrden"];

// $url = "http://localhost/BackEnd/orden.php?ObtenerOrden=" . $id;

// $ch = curl_init($url);

// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// $response = curl_exec($ch);

// curl_close($ch);

// $array = json_decode($response, true);

// $datos = $array[0];
// //falta eliminar, enviar ese registro para actualizar
// //crear la vista de clientes con ordenes.
// //
?>

<div>
    <h6>Cliente:<h6 id="nombreCliente" value="hola"></h6>
    </h6>
</div>

<form action="../orden.php" method="POST" class="formulario-orden">

    <label class="letra" for="Nombre">Notas:</label>
    <input id='idOrden' name="id_orden" type="hidden" value=""/>
    <textarea id="detallesOrden" rows="2" cols="20" name="detalles" value=""></textarea>
    <!--<input id='detalles' name="detalles" class="input-formulario" onclick="sololetras();" type="text" value="<?= $datos["detalles"] ?>" required>-->
    <input type="submit" style="margin-right: 5px;" name="btn-enviar" value="Actualizar nota" class="btn btn-secondary"></input>

</form>


<table class="table table-bordered" style="margin-top: 5px; border-radius: 8px;
    box-shadow: 0 0 40px -10px #000;">
    <thead>
        <tr>
            <th scope="col">Numero</th>
            <th scope="col">Tipo</th>
            <th scope="col">Jamba</th>
            <th scope="col">Lateral</th>
            <th scope="col">Superior</th>
            <th scope="col">Precio</th>
        </tr>
    </thead>
    <tbody id="contenido-productos">
    </tbody>

</table>


<div class="modal-footer">
    <?php
    // echo "<a class='btn btn-danger' href='../orden.php?ordenEliminar=" . $id . "'>Eliminar Orden</a>";
    // echo "<a class='btn btn-warning' href='../producto.php?productoEditar=" . $id . "'>Editar Productos</a>";
    // echo "<a class='btn btn-success' href='listaOrdenes.php'>Cerrar</a>";
    ?>
    <!--   <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"></button>-->
</div>

<script src="../js/orden.js"></script>
<?php include "./templates/footer.php" ?>