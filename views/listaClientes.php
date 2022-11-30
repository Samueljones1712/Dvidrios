<?php include "./templates/header.php" ?>
<?php include "./templates/navbar.php" ?>


<div style="display: flex; justify-content: center;">
<a class="boton-crear-cuenta" href="crearCuentaUsuario.php">Ir a Crear Cuenta</a>
</div>

<div class="contenedor-lista-clientes">
    <div class="col-md-10" style="margin-top: 1%; ">
        <div class="card mb-4">
            <div class="card-body" style="box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);">
                <table class="table" id='tabla-usuarios'>
                    <thead style="text-align-last: center;">

                        <tr>
                            <th scope="col">Cliente</th>
                            <th scope="col">Usuario</th>
                            <th scope="col">Numero</th>
                            <th scope="col">Correo</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Opciones</th>
                        </tr>
                    </thead>
                    <tbody id="contenedor-cliente" style="text-align-last: center;">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<br>
<br>


    <div class="modal fade" id="modalUsuario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="display: flex;justify-content: center;">
            <div class="modal-content" style="width: 900px;height: 430px; place-content: center;" >
                <div id="modalHeader" class="modal-header" hidden>
                    <h5 class="modal-title" id="exampleModalLabel">Agregar Orden de trabajo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div id="modalBody" class="modal-agregar">

                    <!--Inicio contenido modal-->
                    <div class="contenedor-login">
                        
                        <form class="formulario-cuenta">
                            <div class="contenedor-login" style="display:flex;">
                                <h2 class="titulo-login">D'BIDRIOS</h2>
                                <h6 class="titulo-login" style="padding-top: 16px;">Editar cuenta</h6>
                            </div>
                            <div class="contenedor-login" style="display: flex;">
                                <input id='id_usuario_g' name="id_usuario" type="hidden">
                                <div class="part1">
                                    <label class="letra" for="Nombre">Nombre</label>
                                    <input id='nombre_g' name="nombre" class="input-formulario" pattern="^[A-Za-z]+$" onclick="sololetras();" type="text" minlength="3" maxlength="25" required>
                                </div>
                                <div class="part2">
                                    <label class="letra" for="Apellido">Apellido</label>
                                    <input id='apellido_g' name="apellido" class="input-formulario" pattern="^[A-Za-z]+$" onclick="sololetras();" type="text" minlength="3" maxlength="25" required>
                                </div>
                            </div>
                            <div class="contenedor-login" style="display: flex;">
                                <div class="part1">
                                    <label class="letra" for="Usuario">Usuario</label>
                                    <input id='usuario_g' name="usuario" class="input-formulario" type="text" minlength="5" maxlength="25" required>
                                </div>
                                <div class="part2">
                                    <label class="letra" for="Telefono">Telefono</label>
                                    <input id='telefono_g' name="telefono" class="input-formulario" type="number" min="59999999" max="89999999" required>
                                </div>
                            </div>
                            <div class="contenedor-login" style="display: flex;">
                                <div class="part1">
                                    <label class="letra" for="Correo">Correo</label>
                                    <input id='email_g' name="email" class="input-formulario" type="email" pattern="^[^ ]+@[^ ]+\.[a-z]{2,6}$" minlength="15" maxlength="45" required>
                                </div>
                                <div class="part2">
                                    <label class="letra" for="Contrasena" style="margin-left: 6px;">Contraseña</label>
                                    <input id='contrasena_g' name="contrasena" class="input-formulario" type="password" placeholder="Contrasena" minlength="10" maxlength="25" required>
                                </div>
                            </div>

                            <div id="contenedorBotones" class="contenedor-boton">

                            </div>
                            

                        </form>
                    </div>

                    <!-- Fin del contenido del modal -->
                </div>
            </div>
        </div>
    </div><!-- Fin de modal-->


    <div id="modalCliente" class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" style='display: flex;flex-direction: column;align-items: center;'>
    <div class="modal-content" style='width: 550px;'>
      <div id="modalHeaderCliente" class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div  id="modalBodyCliente" class="modal-body">
        <!-- Inicio -->

        <div style="margin-top: 1%; ">
      <div>
        <div class="card-body" style="box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);">
          <table class="table" id="tabla-orden">
            <thead>
              <tr>
                <th scope="col">Fecha</th>

                <th scope="col">Estado</th>
                <th scope="col">Precio</th>
                <th scope="col">Orden</th>
              </tr>
            </thead>
            <tbody id="tbodyCliente">
                
            </tbody>
          </table>
        </div>
      </div>
    </div>

        <!-- Fin -->
      </div>
      <div id="modalButtonsCliente" class="modal-footer">
        <button type="button" class="btn btn-secondary" onclick="Reload();" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>



<script src="../js/usuario.js"></script>
<?php include "./templates/footer.php" ?>


    