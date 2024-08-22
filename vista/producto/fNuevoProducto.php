<form action="" id="FRegProducto">
  <div class="modal-header bg-success">
    <h4 class="modal-title">Registro nuevo Producto</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body">
    <div class="form-group">
      <label for="">Cod - Producto</label>
      <input type="text" name="cod_producto" class="form-control" id="cod_producto">
    </div>
    <div class="form-group">
      <label for="">Cod-Producto-Sin</label>
      <input type="text" name="producto_sin" class="form-control" id="producto_sin">
    </div>
    <div class="form-group">
      <label for="">Nombre</label>
      <input type="text" name="nombre_p" class="form-control" id="nombre_p">
    </div>
    <div class="form-group">
      <label for="">Precio</label>
      <input type="text" name="precio" class="form-control" id="precio">
    </div>
    <div class="form-group">
      <label for="">Unidad de Medida</label>
      <input type="text" name="medida" class="form-control" id="medida">
    </div>
    <div class="form-group">
      <label for="">Unidad de medidad Sin</label>
      <input type="text" name="medida_sin" class="form-control" id="medida_sin">
    </div>
    <div class="form-group">
      <label for="">Imagen</label>
      <input type="text" name="imagen" class="form-control" id="imagen">
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
      regProducto()
    }
  });

  $('#FRegProducto').validate({
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