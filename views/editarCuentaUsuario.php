<?php include "./templates/header.php" ?>
<?php include "./templates/navbar.php" ?>


<body class="paginaPrincipal">


  <div class="contenedor-login">

    <form action="../cuenta.php" method="POST" class="formulario-cuenta">
      <div class="contenedor-login" style="display:flex;">
        <h2 class="titulo-login">D'BIDRIOS</h2>
        <h6 class="titulo-login" style="padding-top: 16px;">Editar cuenta</h6>
      </div>
      <div class="contenedor-login" style="display: flex;">
        <!--id_usuario, usuario, nombre, apellido, contrasena, email, telefono-->
        <input id='id_usuario' name="id_usuario" type="hidden" value="<?= $id ?>" >
        <div class="part1">
          <label class="letra" for="Nombre">Nombre</label>
          <input id='Nombre' name="nombre"  class="input-formulario" pattern="^[A-Za-z]+$" onclick="sololetras();" type="text" value="<?= $datos["nombre"] ?>" minlength="3" maxlength="25" required>
        </div>
        <div class="part2">
          <label class="letra" for="Apellido">Apellido</label>
          <input id='Apellido' name="apellido" class="input-formulario" pattern="^[A-Za-z]+$" onclick="sololetras();" type="text" value="<?= $datos["apellido"] ?>" minlength="3" maxlength="25" required>
        </div>
      </div>
      <div class="contenedor-login" style="display: flex;">
        <div class="part1">
          <label class="letra" for="Usuario">Usuario</label>
          <input id='Usuario' name="usuario" class="input-formulario" type="text" value="<?= $datos["usuario"] ?>" minlength="5" maxlength="25" required>
        </div>
        <div class="part2">
          <label class="letra" for="Telefono">Telefono</label>
          <input id='telefono' name="telefono" class="input-formulario" type="number" value="<?= $datos["telefono"] ?>" onclick="soloNumeros()" min="59999999" max="89999999" required>
        </div>
      </div>
      <div class="contenedor-login" style="display: flex;">
        <div class="part1">
          <label class="letra" for="Correo">Correo</label>
          <input id='correo' name="email" class="input-formulario"  type="email" pattern="^[^ ]+@[^ ]+\.[a-z]{2,6}$" value="<?= $datos["email"] ?>" minlength="15" maxlength="45" required>
        </div>
        <div class="part2">
          <label class="letra" for="Contrasena" style="margin-left: 6px;">Contrasena</label>
          <input id='Contrasena' name="contrasena" class="input-formulario" type="password" value="<?= $datos["contrasena"] ?>" placeholder="Contrasena" minlength="10" maxlength="25" required>
        </div>
      </div>

      <div class="contenedor-boton">
        <!--<input class="boton-formulario" type="submit" value="Ingresar"> -->
        <input type="submit" style="margin-right: 5px;" name="btn-enviar" value="Guardar cambios" class="boton-formulario"></input>
     
        <a class="boton-crear-cuenta" style="margin-left: 5px;" href="listaClientes.php">Cancelar</a>
      </div>

    </form>
    

  </div>

</body>

<script>
  function soloLetras() {
    $(function() {
      //Para escribir solo letras
      $('#nombre').validCampoFranz(' abcdefghijklmnñopqrstuvwxyzáéiou');
      $('#apellido').validCampoFranz(' abcdefghijklmnñopqrstuvwxyzáéiou');
      $('#marca').validCampoFranz(' abcdefghijklmnñopqrstuvwxyzáéiou');
      //Para escribir solo numeros    
      $('#miCampo2').validCampoFranz('0123456789');
    });
  }
</script>

<?php include "./templates/footer.php" ?>