<?php include "./templates/header.php" ?>
<?php include "./templates/navbar.php" ?>
  <!--Navbar final-->




  <div class="row gutters-sm" style="display: flex; flex-direction: column; align-items: center;">
    <div class="col-md-4 mb-3">
      <div id="card-contenedor" class="card">
        <div class="card-body">
          <div id="card-cuerpo" class="d-flex flex-column align-items-center text-center">
            <img src="https://www.nicepng.com/png/detail/73-730154_open-default-profile-picture-png.png" alt="Admin"
              class="rounded-circle" width="150">
            <div class="mt-3">
              <h4>Nombre Apellido</h4>
              <p class="text-secondary mb-1">Información de Contacto</p>
              <p class="text-muted font-size-sm">Dirección</p>
              <button id="boton-editar-perfil" class="btn btn-primary" data-bs-toggle="modal"
                data-bs-target="#exampleModal">Editar</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-8" style="margin-top: 1%; ">
      <div class="card mb-3">
        <div class="card-body" style="box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Fecha</th>
                <th scope="col">Estado</th>
                <th scope="col">Precio</th>
                <th scope="col">Orden</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td scope="row">14/09/2022</th>
                <td><span class="badge bg-success">Proceso</span></td>
                <td>Sin estimar</td>
                <td><a href="ordenes.html" class="btn btn-info">Ver</a></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <!--Modal inicio-->

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Editar informacion de Contacto</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">

            <form>

              <div style="margin-top: 5px;">
                <label class="letra" for="telefono">Numero de telefono</label>
                <input id='telefono' style="height: 25px; width: 96px;" type="number" min="59999999" max="89999999" required>
              </div>
              <div style="margin-top: 5px;">
                <label class="letra" for="Correo">Correo electronico</label>
                <input id='correo' style="height: 25px; width: 250px;" type="email" pattern="^[^ ]+@[^ ]+\.[a-z]{2,6}$" minlength="15"
                maxlength="45" required>
              </div>


              <div class="modal-footer" style="margin-top: 10px;">
                <input type="submit" class="btn btn-primary" value="Guardar cambios"></input>
                <!--   <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"></button>-->
              </div>


            </form>

          </div>

        </div>
      </div>
    </div>

    <!--Modal final-->


    <?php include "./templates/footer.php" ?>

<script>




