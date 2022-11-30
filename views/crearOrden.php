<?php include "./templates/header.php" ?>
<?php include "./templates/navbar.php" ?>

<!-- Cliente, Costo total, Fecha y descripcion -->

<div class="contenedor-datos-cliente">
          <form action="../orden.php" method="post" class="form-inline my-2 my-lg-0" style="display: flex; align-items: center;">
            <input class="form-control mr-sm-2" type="search" style="width: 200px;" placeholder="Cliente" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
          </form>

          <form action="../orden.php" method="post" style="display: flex; flex-direction: column; align-items: center; margin-top: 5px;">

            <label class="letra" for="Descripcion" style="margin-top: 5px;">Descripcion</label>
            <textarea id='detalles' name="detalles" onclick="sololetras()" class="form-control" rows="3"></textarea>

            <label class="letra" for="Costo-total" style="margin-top: 5px;">Costo total</label>
            <input id='subtotal' name="subtotal" onclick="soloNumeros()" min="0" class="ingresar-dato-cliente" style="width: 100px; height: 25px;" type="number">

            <div class="modal-footer" style="margin-top: 10px;">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
              <input type="submit" class="btn btn-primary" value="Confirmar"></input>
            </div>

          </form>
        </div>

        <style>
          .form-control{
            width: 40%;
          }
        </style>

<?php include "./templates/footer.php" ?>

""