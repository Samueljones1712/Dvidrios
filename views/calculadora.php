<?php include "./templates/header.php" ?>
<?php include "./templates/navbar.php" ?>
<!--Navbar final-->

<div class="contenedor-seleccion-principal">

  <!-- -->
  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
    5020 - Cotidiano
  </button>

  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
    6030 - Akari
  </button>

  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
    8040 - Akari
  </button>

  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
    8025 - Cotidiano
  </button>

  <button type="button" class="btn btn-warning" id="boton-orden" data-bs-toggle="modal" data-bs-target="#exampleModal">Generar orden
  </button>

</div>


<!-- 

    La lista de ventanas

-->

<div class="contenedor-elementos-seleccionados">


  <div class="elemento-cuerpo">

    <img class="imagen-elemento" style="width: 100%; height: 100%" src="../img/Fijo-Movil.jpeg">

    <div class="elemento">
      <h6>Jamba:</h6>
      <h6>100</h6>
    </div>
    <div class="elemento">
      <h6>Lateral: </h6>
      <h6>100</h6>
    </div>
    <div class="elemento">
      <h6>Superior e interior:</h6>
      <h6>100</h6>
    </div>

    <div class="elemento">
      <h6>Precio:</h6>
      <h6>2000 colones</h6>
    </div>

    <div class="elemento-botones">
      <a href="#" class="btn btn-primary">Editar</a>
      <a href="#" class="btn btn-primary" id="boton-eliminar">Eliminar</a>
    </div>
  </div>

  <!--Otros elementos-->



  <!--DIV FINAL DE LOS ELEMENTO-->
</div>


</body>
<!-- Modal de clientes de orden -->

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="display: flex; align-items: center; justify-content: space-evenly;">
    <div class="modal-content" style="width: 60%">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cliente</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Inicio del cuerpo del modal -->
        
        <div class="contenedor-datos-cliente">
          <form class="form-inline my-2 my-lg-0" style="display: flex; align-items: center;">
            <input class="form-control mr-sm-2" type="search" style="width: 200px;" placeholder="Cliente" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
          </form>

          <form action="ordenes.php" style="display: flex; flex-direction: column; align-items: center; margin-top: 5px;">

            <label class="letra" for="Nombre-Cliente" style="margin-top: 5px;">Nombre cliente</label>
            <input id='Nombre-Cliente' class="ingresar-dato-cliente" style="width: 200px; height: 25px;" type="text">

            <label class="letra" for="Descripcion" style="margin-top: 5px;">Descripcion</label>
            <textarea id='Descripcion' id='Costo-total' class="form-control" rows="3"></textarea>

            <label class="letra" for="Costo-total" style="margin-top: 5px;">Costo total</label>
            <input id='Costo-total' class="ingresar-dato-cliente" style="width: 100px; height: 25px;" type="text">

            <div class="modal-footer" style="margin-top: 10px;">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
              <input type="submit" class="btn btn-primary" value="Confirmar">
            </div>

          </form>
        </div>

        <!-- Fin del cuerpo del modal -->
      </div>
    </div>

  </div>
</div>
</div>



<!-- Fin modal de clientes de orden -->


<!-- Modal de calculadora-->

<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" style="    height: 490px;">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Calculadora de medidas: </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="contenedor-creador">

          <div class="contenedor-tipos">

            <img src="../img/Fijo-Movil.jpeg" style="height: 130px; width: 130px;     border-style: ridge;"></img>

            <img src="../img/Movil-Movil.jpeg" style="height: 130px; width: 130px;     border-style: ridge;"></img>

            <img src="../img/Fijo-Movil-Fijo.jpeg" style="height: 130px; width: 130px;     border-style: ridge;"></img>

            <img src="../img/Fijo-Movil-Movil-Fijo.jpeg" style="height: 130px; width: 130px;     border-style: ridge;"></img>

          </div>

          <hr>

          <div class="contenedor-calculadora" style="display: flex;
          justify-content: space-around;">

            <form method="post" class="formulario-calculadora">

              <div class="contenedor-ingresar">
                <label class="letra" for="Altura">Altura</label>
                <input id='Altura' class="ingresar-texto" style="width: 69px; height: 20px; margin-left: 30px;" pattern="^[0-9]+" type="number" placeholder="0" min="1"> cm
              </div>

              <div class="contenedor-ingresar">
                <label class="letra" for="Longuitud">Longuitud</label>
                <input id='Longuitud' class="ingresar-texto" type="number" pattern="^[0-9]+" style="width: 69px; height: 20px;" placeholder="0" step="1" min="1"> cm
              </div>

              <hr>

              <div class="contenedor-ingresar">
                <label class="letra" for="Longuitud">Costo</label>
                <input id='Longuitud' class="ingresar-texto" type="number" min="1" pattern="^[0-9]+" style="width: 100px; height: 20px;">
              </div>



              <div class="contenedor-ingresar">
                <select name="select">
                  <option value="colones">Colones</option>
                  <option value="colones">Dolares</option>
                </select>
              </div>


              <div class="contenedor-ingresar" style="    display: flex;
              align-items: center;
              justify-content: center;    ">

                <input type="submit" value="Calcular" onclick="Alert('Cerro el modal sin realizar una orden');" class="btn btn-primary"></input>
              </div>

            </form>

          </div>

        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Finalizar</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<?php include "./templates/footer.php" ?>

<style>
  .contenedor-ingresar {
    margin-top: 13px;

    align-items: center;
    justify-content: space-evenly;
  }

  .formulario-calculadora {
    width: 200px;
    height: 100px;

  }

  .contenedor-tipos {
    display: flex;
    justify-content: space-around;
  }
</style>