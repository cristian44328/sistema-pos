<form action="" id="FRegFactura">
  <div class="modal-header bg-success">
    <h4 class="modal-title">Registro nueva Factura</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body">
    <div class="form-group">
      <label for="">Cod Factura</label>
      <input type="text" name="codFactura" class="form-control" id="codFactura">
    </div>
    <div class="form-group">
      <label for="">Cliente</label>
      <input type="text" name="cliente" class="form-control" id="cliente">
    </div>
    <div class="form-group">
      <label for="">Detalle</label>
      <input type="text" name="detalle" class="form-control" id="detalle">
    </div>
    <div class="form-group">
      <label for="">Neto</label>
      <input type="text" name="neto" class="form-control" id="neto">
    </div>
    <div class="form-group">
      <label for="">Descuento</label>
      <input type="text" name="descuento" class="form-control" id="descuento">
    </div>
    <div class="form-group">
      <label for="">Total</label>
      <input type="text" name="total" class="form-control" id="total">
    </div>
    <div class="form-group">
      <label for="">Punto de venta</label>
      <input type="text" name="puntoVenta" class="form-control" id="puntoVenta">
    </div>
    <div class="form-group">
      <label for="">Usuario</label>
      <input type="text" name="usuario" class="form-control" id="usuario">
    </div>
    <div class="form-group">
      <label for="">Leyenda</label>
      <input type="text" name="leyenda" class="form-control" id="leyenda">
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
      regFactura()
    }
  });

  $('#FRegFactura').validate({
    rules: {
      login: {
        required: true,
      minlength: 4
      },
      password: {
        required: true,
        minlength: 4
      },
      vrPassword: {
        required: true,
        minlength: 4
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