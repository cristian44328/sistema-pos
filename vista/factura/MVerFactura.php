<?php
require_once "../../controlador/facturaControlador.php";
require_once "../../modelo/facturaModelo.php";

$id = $_GET["id"];

$factura = ControladorFactura::ctrInfoFactura($id);

$producto=json_decode($factura["detalle"], true);

?>
<div class="modal-header bg-success">
    <h4 class="modal-title">Informacion de Factura</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">

<div class="row">
    <div class="col-sm-6">
        <table class="table">
            <tr>
                <th># Factura:</th>
                <td> <?php echo $factura["cod_factura"];?> </td>
            </tr>
            <tr>
                <th>Cliente:</th>
                <td> <?php echo $factura["razon_social_cliente"];?> </td>
            </tr>
            <tr>
                <th>NIT/CI:</th>
                <td> <?php echo $factura["nit_ci_cliente"];?> </td>
            </tr>
            <tr>
                <th>Fecha:</th>
                <td> <?php echo $factura["fecha_emision"];?> </td>
            </tr>
            <tr> 
             <th>Estado:</th>
             <td>
             <?php 
                            if($factura["estado_factura"]===1){
                              ?>
                              <span class="badge badge-success">Emitido</span>
                              <?php
                            }else{
                              ?>
                              <span class="badge badge-danger">Anulado</span>
                              <?php
                            }
                            ?> 
             </td>   
            </tr>
            <tr>
                <th>Emitido por:</th>
                <td> <?php echo $factura["usuario"];?> </td>
            </tr>
            
        </table>
    </div>
    <div class="col-sm-6" style="=text-align:center">
        <table class="table">
            <thead>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio(Bs)</th>
                <th>Descuento(Bs)</th>
                <th>Total(Bs)</th>
            </thead>
            <tbody>
                <?php 
                foreach($producto as $values){
                    ?> 
                    <tr>
                        <td><?php echo $values["descripcion"]; ?></td>
                        <td><?php echo $values["cantidad"]; ?></td>
                        <td><?php echo $values["precioUnitario"]; ?></td>
                        <td><?php echo $values["montoDescuento"]; ?></td>
                        <td><?php echo $values["subtotal"]; ?></td>
                    </tr>
                    <?php
                }
                ?>
                    <tr>
                    <td colspan="4"><b>Total Neto</b></td>
                    <td><?php echo $factura["neto"]; ?></td>
                    </tr>
                    <tr>
                    <td colspan="4"><b>Descuento</b></td>
                    <td><?php echo $factura["descuento"]; ?></td>
                    </tr>
                    <tr>
                    <td colspan="4"><b>Total</b></td>
                    <td><?php echo $factura["total"]; ?></td>
                    </tr>
                    
            </tbody>
        </table>
    </div>
</div>

</div>

<div class="modal-footer justify-content-between">
  <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
</div>