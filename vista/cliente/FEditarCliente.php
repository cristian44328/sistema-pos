<?php
require_once "../../controlador/clienteControlador.php";
require_once "../../modelo/clienteModelo.php";

$id = $_GET["id"];

$cliente = ControladorCliente::ctrInfoCliente($id);

?>
<form action="" id="FEditCliente">
  <div class="modal-header bg-success">
    <h4 class="modal-title">Editar Cliente</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body">
    <div class="form-group">
      <label for="">Razon social</label>
      <input type="text" name="razon_social" class="form-control" id="razon_social" value="<?php echo $cliente["razon_social_cliente"]; ?>"
      >
      <input type="hidden" name="idCliente" value="<?php echo $cliente["id_cliente"];?>">
    </div>
    <div class="form_group">
      <label for="">Nit</label>
      <input type="text" name="nit" class="form-control" id="nit"
        value="<?php echo $cliente["nit_ci_cliente"]; ?>">
    </div>
    <div class="form-group">
      <label for="">Direccion</label>
      <input type="text" name="direccion" class="form-control" id="direccion"
        value="<?php echo $cliente["direccion_cliente"]; ?>">
    </div>
    <div class="form-group">
      <label for="">Nombre</label>
      <input type="text" name="nombre" class="form-control" id="nombre"
        value="<?php echo $cliente["nombre_cliente"]; ?>">
    </div>
    <div class="form-group">
      <label for="">Telefono</label>
      <input type="text" name="telefono" class="form-control" id="telefono"
        value="<?php echo $cliente["telefono_cliente"]; ?>">
    </div>
    <div class="form-group">
      <label for="">Email</label>
      <input type="email" name="email" class="form-control" id="email"
        value="<?php echo $cliente["email_cliente"]; ?>">
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
        editCliente()
      }
    });

    $('#FEditCliente').validate({
    rules: {
      razon_social: {
        required: true,
        minlength: 1
      },
      nit: {
        required: true,
        minlength: 1
      },
      direccion: {
        required: true,
        minlength: 1
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