<?php
require_once "../../controlador/productoControlador.php";
require_once "../../modelo/productoModelo.php";

$id = $_GET["id"];

$producto = ControladorProducto::ctrInfoProducto($id);

?>
<form action="" id="FEditProducto">
  <div class="modal-header bg-success">
    <h4 class="modal-title">Editar Producto</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body">
    <div class="form-group">
      <label for="">Cod Producto</label>
      <input type="text" name="cod_producto" class="form-control" id="cod_producto" value="<?php echo $producto["cod_producto"]; ?>"
        >
      <input type="hidden" name="idProducto" value="<?php echo $producto["id_producto"];?>">
    </div>
    <div class="form_group">
    <label for="">Cod-Producto-Sin</label>
    <input type="text" name="producto_sin" class="form-control" id="producto_sin" value="<?php echo $producto["cod_producto_sin"]; ?>">
    </div>
    <div class="form-group">
      <label for="">Nombre</label>
      <input type="text" name="nombre_p" class="form-control" id="nombre_p" value="<?php echo $producto["nombre_producto"]; ?>">
    </div>
    <div class="form-group">
      <label for="">Precio</label>
      <input type="text" name="precio" class="form-control" id="precio" value="<?php echo $producto["precio_producto"]; ?>">
    </div>
    <div class="form-group">
      <label for="">Unidad de Medida</label>
      <input type="text" name="medida" class="form-control" id="medida" value="<?php echo $producto["unidad_medida"]; ?>">
    </div>
    <div class="form-group">
      <label for="">Unidad de medidad Sin</label>
      <input type="text" name="medida_sin" class="form-control" id="medida_sin" value="<?php echo $producto["unidad_medida_sin"];?>">
    </div>
    <div class="form-group">
      <label for="">Imagen</label>
      <input type="text" name="imagen" class="form-control" id="imagen_producto" value="<?php echo $producto["imagen_producto"];?>">
    </div>
    <div class="form-group">
      <label for="">Disponible</label>
      <div class="row">
        <div class="col-sm-6">
          <div class="custom-control custom-radio">
            <input class="custom-control-input" type="radio" id="disponible" name="disponible" <?php if ($producto["disponible"] == "1"): 
              ?>checked<?php endif; ?> value="1">
            <label for="disponible" class="custom-control-label">Disponible</label>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="custom-control custom-radio">
            <input class="custom-control-input" type="radio" id="noDisponible" name="disponible" <?php if ($producto["disponible"] == "0"): 
              ?>checked<?php endif; ?> value="0">
            <label for="noDisponible" class="custom-control-label">No disponible</label>
          </div>
        </div>
      </div>
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
        editProducto()
      }
    });

    $('#FEditProducto').validate({
      rules: {

        cod_producto: {
        required: true,
        minlength: 3
      },
      producto_sin: {
        required: true,
        minlength: 1
      },
      nombre_p: {
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