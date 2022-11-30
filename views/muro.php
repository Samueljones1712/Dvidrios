<?php include "./templates/header.php" ?>

  <!--Navbar INICIO-->
  <?php include "./templates/navbar.php" ?>

  <!--Navbar final-->
  <div class="boton-producto-publicacion">
    <!--<button class="boton-producto">Publicar Producto</button>-->
    <button class="btn btn-primary" style="margin-top: 1%;">Publicar Producto</button>
  </div>

  <div class="contenedor-publicaciones">
        <div class="row">
            <div class="col-md-3">
                <div class="card-sl">
                    <div class="card-image">
                    <img src="../img/trabajo1.jpg" />
                    </div>
                    <div class="card-heading">
                        Título
                    </div>
                    <div class="card-text">
                        Sin descripción
                    </div>
                    <button type="button" class="card-button"> Consultar</button>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card-sl">
                    <div class="card-image">
                    <img src="../img/trabajo2.jpg" />
                    </div>
                    <div class="card-heading">
                        Título
                    </div>
                    <div class="card-text">
                        Sin descripción
                    </div>
                    <button type="button" class="card-button"> Consultar</button>
                </div>
            </div>
        </div>  
    </div>

    
    <?php include "./templates/footer.php" ?>