<?php
require 'header.php';
?>
  <!--Main layout-->
  <main class="pt-5 mx-lg-5">
    <div class="container-fluid mt-5">

      <!-- Heading -->
      <div class="card mb-4 wow fadeIn">

        <!--Card content-->
        <div class="card-body d-sm-flex justify-content-between">

          <h4 class="mb-2 mb-sm-0 pt-1">
            <a href="index.html" target="_blank">SkinCol</a>
            <span>/</span>
            <span>Insumos</span>
          </h4>
        </div>
      </div>
      <!-- Heading -->

      <!--Grid row-->
      <div class="row wow fadeIn">

        <!--Grid column-->
        <div class="col-md-12 mb-4">

          <!--Card-->
          <div class="card">

            <!--Card content-->
            <div class="card-body">

              <!-- Table  -->
              <div class="row justify-content-end">
                <div class="col-md-12 ">
                  <div class="btn btn-success" onclick="mostrarform(true)"><i class="far fa-plus-square"></i> Agregar</div>
                </div>
              </div>
                <!-- Table head -->
                <div id="listadoregistros">
                  <table id="tbllistado" class="table table-striped">
                    <thead class="blue-grey lighten-4">
                      <tr>
                        <th>Opciones</th>
                        <th>Proveedor</th>
                        <th>Material</th>
                        <th>Cantidad</th>
                        <th>Costo</th>
                      </tr>
                    </thead>
                  </table>
                </div>
                <!-- Table head -->
              <!-- Table  -->

              <!-- Form -->
              <div class="panel-body" style="height: 400px;" id="formularioregistros">
                <form name="formulario" id="formulario" method="POST">
                  <div class="form-group col-sm-12 col-md-6 col-xl-12">
                      <div class="form-group">
                    <label for="NIT">Proveedor</label>
                    <select class="form-control selectpicker" id="IdProveedor" name="IdProveedor" data-live-search="true" required></select>
                  </div>
                  </div>
                  <div class="form-group col-sm-12 col-md-6 col-xl-12">
                    <label>Material</label>
                    <input type="text" name="Material" id="Material" class="form-control" placeholder="Ingrese el indicativo del proveedor">
                  </div>
                  <div class="form-group col-sm-12 col-md-6 col-xl-12">
                      <label>Cantidad</label>
                      <input type="text" name="Cantidad" id="Cantidad" class="form-control" placeholder="Ingrese la cantidad">
                  </div>
                  <div class="form-group col-sm-12 col-md-6 col-xl-12">
                    <label>Costo</label>
                    <input id="Costo" name="Costo" class="form-control" type="text" placeholder="Ingrese el valor">
                  </div>
                  <div class="form-group col-sm-12 col-md-6 col-xl-12">
                    <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i> Guardar</button>
                    <button class="btn btn-danger" type="button" onclick="cancelarform()"><i class="fa fa-arrow-alt-circle-left"></i> Cancelar</button>
                  </div>
                </form>
              </div>
              <!-- Form -->

            </div>

          </div>
          <!--/.Card-->

        </div>
        <!--Grid column-->

      </div>
      <!--Grid row-->

    </div>
  </main>
  <!--Main layout-->
<?php
require 'footer.php';
?>
<script src="Scripts/facturainsumos.js"></script>