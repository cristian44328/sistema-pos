
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
                <h3 class="card-title">Lista de facturas Registradas</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>cod_Factura</th>
                    <th>Cliente</th>
                    <th>Detalle</th>
                    <th>Neto</th>
                    <th>Descuento</th>
                    <th>Total</th>
                    <th>Punto de Venta</th>
                    <th>Usuario</th>
                    <th>Leyenda</th>
                    <td>
                      <button class="btn btn-primary" onclick="MNuevoFactura()">Nuevo</button>
                    </td>
                  </tr>
                  </thead>

                  <tbody>
                    <?php
                    $factura=ControladorFactura::ctrInfoFacturas();

                    foreach($factura as $value){
                        ?>
                        <tr>
                            <td> <?php echo $value["id_factura"];?> </td>
                            <td> <?php echo $value["cod_factura"];?> </td>
                            <td> <?php echo $value["id_cliente"];?> </td>
                            <td> <?php echo $value["detalle"];?> </td>
                            <td> <?php echo $value["neto"];?> </td>
                            <td> <?php echo $value["descuento"];?> </td>
                            <td> <?php echo $value["total"];?> </td>
                            <td> <?php echo $value["id_punto_venta"];?> </td>
                            <td> <?php echo $value["usuario"];?> </td>
                            <td> <?php echo $value["leyenda"];?> </td>
    
                            <td>
                              <div class="btn-group">
                                <button class="btn btn-secondary" onclick="MEditFactura(<?php echo $value["id_factura"];?>)">
                                  <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-danger" onclick="MEliFactur(<?php echo $value["id_factura"];?>)">
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
