<?php
require_once "../../controlador/facturaControlador.php";
require_once "../../modelo/facturaModelo.php";

$id = $_GET["id"];

$factura = ControladorFactura::ctrInfoFactura($id);

?>
<form action="" id="FEditFactura">
  <div class="modal-header bg-success">
    <h4 class="modal-title">Editar Factura</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body">
    <div class="form-group">
      <label for="">Cod Factura</label>
      <input type="text" name="codFactura" class="form-control" id="codFactura" value="<?php echo $factura["cod_factura"]; ?>">
      <input type="hidden" name="idFactura" value="<?php echo $factura["id_factura"];?>">
    </div>
    <div class="form-group">
      <label for="">Cliente</label>
      <input type="text" name="cliente" class="form-control" id="cliente" value="<?php echo $factura["id_cliente"]; ?>">
    </div>
    <div class="form-group">
      <label for="">Detalle</label>
      <input type="text" name="detalle" class="form-control" id="detalle" value="<?php echo $factura["detalle"]; ?>">
    </div>
    <div class="form-group">
      <label for="">Neto</label>
      <input type="text" name="neto" class="form-control" id="neto" value="<?php echo $factura["neto"]; ?>">
    </div>
    <div class="form-group">
      <label for="">Descuento</label>
      <input type="text" name="descuento" class="form-control" id="descuento" value="<?php echo $factura["descuento"]; ?>">
    </div>
    <div class="form-group">
      <label for="">Total</label>
      <input type="text" name="total" class="form-control" id="total" value="<?php echo $factura["total"]; ?>">
    </div>
    <div class="form-group">
      <label for="">Punto de venta</label>
      <input type="text" name="puntoVenta" class="form-control" id="puntoVenta" value="<?php echo $factura["id_punto_venta"]; ?>">
    </div>
    <div class="form-group">
      <label for="">Usuario</label>
      <input type="text" name="usuario" class="form-control" id="usuario" value="<?php echo $factura["usuario"]; ?>">
    </div>
    <div class="form-group">
      <label for="">Leyenda</label>
      <input type="text" name="leyenda" class="form-control" id="leyenda" value="<?php echo $factura["leyenda"]; ?>">
    </div>

  </div>
  <div class="modal-footer justify-content-between">
    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
    <button type="submit" class="btn btn-primary">Guardar</button>
  </div>
</form>

<script>
  $(function () {
    $.validator.setDefaults({
      submitHandler: function () {
        editFactura()
      }
    });

    $('#FEditFactura').validate({
      rules: {

        codFactura: {
          required: true,
          minlength: 2
        },
        cliente: {
          required: true,
          minlength: 2
        },
      },

      errorElement: 'span',
      errorPlacement: function (error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
      },
      highlight: function (element, errorClass, validClass) {
        $(element).addClass('is-invalid');
      },
      unhighlight: function (element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
      }
    });
  });
</script>