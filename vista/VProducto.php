
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">

      asdk

      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
         <div class="card">
              <div class="card-header">
                <h3 class="card-title">Lista de productos Registrados</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>cod_Producto</th>
                    <th>cod_Producto_Sin</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>unidad_medida</th>
                    <th>unidad_medida_sin</th>
                    <th>Imagen</th>
                    <th>Disponible</th>
                    <td>
                      <button class="btn btn-primary" onclick="MNuevoProducto()">Nuevo</button>
                    </td>
                  </tr>
                  </thead>

                  <tbody>
                    <?php
                    $producto=ControladorProducto::ctrInfoProductos();

                    foreach($producto as $value){
                        ?>
                        <tr>
                            <td> <?php echo $value["id_producto"];?> </td>
                            <td> <?php echo $value["cod_producto"];?> </td>
                            <td> <?php echo $value["cod_producto_sin"];?> </td>
                            <td> <?php echo $value["nombre_producto"];?> </td>
                            <td> <?php echo $value["precio_producto"];?> </td>
                            <td> <?php echo $value["unidad_medida"];?> </td>
                            <td> <?php echo $value["unidad_medida_sin"];?> </td>
                            <td> <?php echo $value["imagen_producto"];?> </td>
                            <td> <?php echo $value["disponible"];?> </td>
                            <td>
                              <div class="btn-group">
                                <button class="btn btn-secondary" onclick="MEditProducto(<?php echo $value["id_producto"];?>)">
                                  <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-danger" onclick="MEliProducto(<?php echo $value["id_producto"];?>)">
                                  <i class="fas fa-trash"></i>
                                </button>
                              </div>
                            </td>
                        </tr>

                        <?php
                    }
                    ?>

                  </tbody>
                  
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
     </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
