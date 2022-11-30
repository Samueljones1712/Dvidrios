<?php include "./templates/header.php" ?>
<?php include "./templates/navbarInicio.php" ?>


<div class="contenedor-login" style="display: flex;justify-content: center; margin-top: 1%;">
    <form method="post" action="" class="formulario-login">

        <h2 class="titulo-login">D'BIDRIOS</h2>

        <div>
            <label class="letra" for="Nombre">Usuario</label>
            <input id='usuario' name="usuario" class="input-formulario" type="text" placeholder="Nombre de usuario" minlength="5" maxlength="25" required>
        </div>
        <div>
            <label class="letra" for="Contrasena">Contraseña</label>
            <input id='clave' name="contrasena" class="input-formulario" type="password" placeholder="Contraseña" minlength="10" maxlength="25" required>
        </div>

        <div class="contenedor-boton">
            <!--<input class="boton-formulario" type="submit" value="Ingresar"> -->
            <input onclick="enviarFormulario();" name="btn-enviar" value="Ingresar" class="boton-formulario"></input>
        </div>

        <div class="contenedor-boton-cuenta">
            <a class="boton-crear-cuenta" href="crearCuentaUsuario.php">Crear cuenta</a>
        </div>

        <div class="informacion-contacto">
            <span></span>Numero de contacto: 8888 9999
        </div>

    </form>
</div>

<script src="../js/login.js"></script>

<?php include "./templates/footer.php" ?>