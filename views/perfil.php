<?php include "./templates/header.php" ?>
<?php include "./templates/navbar.php" ?>

  <!--Navbar final-->

  <!--Navbar final-->




  <div class="row gutters-sm" style="display: flex; flex-direction: column; align-items: center;">
    <div class="col-md-4 mb-3">
      <div id="card-contenedor" class="card">
        <div class="card-body">
          <div id="card-cuerpo" class="d-flex flex-column align-items-center text-center">
            <img src="https://www.nicepng.com/png/detail/73-730154_open-default-profile-picture-png.png" alt="Admin"
              class="rounded-circle" width="150">
            <div class="mt-3">
              <h4>Nombre</h4>
              <p class="text-secondary mb-1">Información de Contacto</p>
              <p class="text-muted font-size-sm">Dirección</p>
              <button id="boton-editar-perfil" class="btn btn-primary" data-bs-toggle="modal"
                data-bs-target="#exampleModal">Editar</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <!--Modal inicio-->

  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 25%;">
      <div class="modal-content" style="display: flex;">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Editar información de Contacto</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <form>

            <div style="margin-top: 5px; display: flex;    flex-direction: column;">
              <label class="letra" for="telefono">Numero de teléfono</label>
              <input id='telefono' style="height: 25px; width: 96px; margin-top: 5px;" type="number" min="59999999" max="89999999" required>
            </div>
            <div style="margin-top: 5px; display: flex;    flex-direction: column;">
              <label class="letra" for="Correo">Correo electrónico</label>
              <input id='correo' style="height: 25px; width: 250px; margin-top: 5px;" type="email" pattern="^[^ ]+@[^ ]+\.[a-z]{2,6}$" minlength="15"
              maxlength="45" required>
            </div>


            <div class="modal-footer" style="margin-top: 10px;">
              <input type="submit" class="btn btn-primary"style="margin:auto;" value="Guardar cambios"></input>
              <!--   <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"></button>-->
            </div>


          </form>

        </div>

      </div>
    </div>
  </div>

  <!--Modal final-->

  <?php include "./templates/footer.php" ?>