<form action="" id="FRegUsuario">
  <div class="modal-header bg-success">
    <h4 class="modal-title">Registro nuevo Usuario</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body">
    <div class="form-group">
      <label for="">Login Usuario</label>
      <input type="text" name="login" class="form-control" id="login">
    </div>
    <div class="form_group">
      <label for="">Password</label>
      <input type="password" name="password" class="form-control" id="password">
    </div>
    <div class="form-group">
      <label for="">Repetir Password</label>
      <input type="password" name="vrPassword" class="form-control" id="vrPassword">
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
      regUsuario()
    }
  });

  $('#FRegUsuario').validate({
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