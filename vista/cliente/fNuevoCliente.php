<form action="" id="FRegCliente">
  <div class="modal-header bg-success">
    <h4 class="modal-title">Registro nuevo Cliente</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body">
    <div class="form-group">
      <label for="">Razon Social</label>
      <input type="text" name="razon_social" class="form-control" id="razon_social">
    </div>
    <div class="form_group">
      <label for="">Nit ci</label>
      <input type="text" name="nit" class="form-control" id="nit">
    </div>
    <div class="form-group">
      <label for="">Direccion</label>
      <input type="text" name="direccion" class="form-control" id="direccion">
    </div>
    <div class="form-group">
      <label for="">Nombre</label>
      <input type="text" name="nombre" class="form-control" id="nombre">
    </div>
    <div class="form-group">
      <label for="">Telefono</label>
      <input type="text" name="telefono" class="form-control" id="telefono">
    </div>
    <div class="form-group">
      <label for="">Email</label>
      <input type="email" name="email" class="form-control" id="email">
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
      regCliente()
    }
  });

  $('#FRegCliente').validate({
    rules: {
      razon_social: {
        required: true,
        minlength: 3
      },
      nit: {
        required: true,
        minlength: 3
      },
      direccion: {
        required: true,
        minlength: 3
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