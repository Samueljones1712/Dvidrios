<?php include('./templates/header.php') ?>
<?php include "./templates/navbarInicio.php" ?>

  <div class="contenedor-login">
    <form class="formulario-cuenta" style="margin-top: 5%;
    display: flex;
    flex-direction: column;">
      <div class="contenedor-login" style="display:flex;">
        <h2 class="titulo-login">D'BIDRIOS</h2>
        <h6 class="titulo-login" style="padding-top: 16px;">Crear cuenta</h6>
      </div>
      <div class="contenedor-login" style="display: flex;">
        <input id='id_usuario_g' name="id_usuario" type="hidden">
        <div class="part1" style="margin-top: 1%">
          <label class="letra" for="Nombre">Nombre</label>
          <input id='nombre_g' name="nombre" class="input-formulario" pattern="^[A-Za-z]+$" onclick="sololetras();" type="text" minlength="3" maxlength="25" required>
        </div>
        <div class="part2" style="margin-top: 1%">
          <label class="letra" for="Apellido">Apellido</label>
          <input id='apellido_g' name="apellido" class="input-formulario" pattern="^[A-Za-z]+$" type="text" minlength="3" maxlength="25" required>
        </div>
      </div>
      <div class="contenedor-login" style="display: flex; margin-top: 2;">
        <div class="part1" style="margin-top: 1%">
          <label class="letra" for="Usuario">Usuario</label>
          <input id='usuario_g' name="usuario" class="input-formulario" type="text" minlength="5" maxlength="25" required>
        </div>
        <div class="part2" style="margin-top: 1%">
          <label class="letra" for="Telefono">Telefono</label>
          <input id='telefono_g' name="telefono" class="input-formulario" type="number" min="59999999" max="89999999" required>
        </div>
      </div>
      <div class="contenedor-login" style="display: flex; margin-top: 2;">
        <div class="part1" style="margin-top: 1%">
          <label class="letra" for="Correo">Correo</label>
          <input id='email_g' name="email" class="input-formulario" type="email" pattern="^[^ ]+@[^ ]+\.[a-z]{2,6}$" minlength="15" maxlength="45" >
        </div>
        <div class="part2" style="margin-top: 1%">
          <label class="letra" for="Contrasena" style="margin-left: 6px;">Contraseña</label>
          <input id='contrasena_g' name="contrasena" class="input-formulario" type="password" placeholder="Contrasena" minlength="10" maxlength="25" required>
        </div>
      </div>

      <div id="contenedorBotones" class="contenedor-boton">
      
      <a class="btn btn-secondary" style='margin-left: 3px; margin-right: 3px;' href="login.php">Salir</a>
      <a class='btn btn-success' style='margin-left: 3px; margin-right: 3px;' onclick='saveUsuario();'>Guardar</a>
      </div>

  </div>


  <script src="../js/nuevaCuenta.js"></script>
  <?php include('./templates/footer.php') ?>