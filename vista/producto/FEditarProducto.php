<?php
require_once "../../controlador/productoControlador.php";
require_once "../../modelo/productoModelo.php";

$id = $_GET["id"];

$producto = ControladorProducto::ctrInfoProducto($id);

?>

<form action="" id="FEditProducto" enctype="multipart/form-data">
  <div class="modal-header bg-success">
    <h4 class="modal-title">Editar Producto</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body">
    <div class="row">
      <div class="col-sm-6">
        <div class="form-group">
         <label for="">Cod. Producto</label>
         <input type="text" name="cod_producto" class="form-control" id="cod_producto" value="<?php echo $producto["cod_producto"];?>"
         readonly>
         <input type="hidden" name="idProducto" value="<?php echo $producto["id_producto"];?>">
        </div>
      </div>
      <div class="col-sm-6">
       <div class="form-group"> 
         <label for="">Cod. Producto SIN</label>
         <input type="text" name="cod_producto_sin" class="form-control" id="cod_producto_sin" value="<?php echo $producto["cod_producto_sin"];?>">
       </div>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-6">
      <div class="form-group">
      <label for="">Descripcion</label>
      <input type="text" name="nombre_p" class="form-control" id="nombre_p" value="<?php echo $producto["nombre_producto"];?>">
    </div>
      </div>
      <div class="col-sm-6">
       <div class="form-group">
         <label for="">Precio</label>
         <input type="text" name="precio_p" class="form-control" id="precio_p" value="<?php echo $producto["precio_producto"];?>">
       </div>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-6">
      <div class="form-group">
      <label for="">Unidad Medida</label>
      <input type="text" name="medida_p" class="form-control" id="medida_p" value="<?php echo $producto["unidad_medida"];?>">
    </div>
      </div>
      <div class="col-sm-6">
       <div class="form-group">
         <label for="">Unidad Medida SIN</label>
         <input type="text" name="medida_sin" class="form-control" id="medida_sin" value="<?php echo $producto["unidad_medida_sin"];?>">
       </div>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-6">
        <div class="form-group">
        <label> Imagen <span class="text-muted">(Peso maximo 10MB - JPG,PNG)</span> </label>
        <div class="input-group">
          <div class="custom-file">
            <input type="file" class="custom-file-input" id="imgProducto" name="imgProducto" onchange="previsualizar()">
            <input type="hidden" name="imgActual" value="<?php $producto["imagen_producto"];?>">
            <label for="imgProducto" class="custom-file-label">Elegir archivo</label>
          </div>
          <div class="input-group-append">
            <span class="input-group-text">Subir</span>
          </div>
        </div>
        <div class="form-group">
          <label for="">Estado</label>
          <div class="row">
            <div class="col-sm-6">
              <div class="custom-control custom-radio">
                <input type="radio" id="estadoActivo" name="disponible" value="1" <?php if($producto["disponible"]=="1"):?> checked <?php endif;?>>
                <label for="estadoActivo">Disponible</label>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="custom-control custom-radio">
                <input type="radio" id="estadoInactivo" name="disponible" value="0" <?php if($producto["disponible"]=="0"):?>
                  checked <?php endif;?>>
                <label for="estadoInactivo">No Disponible</label>
              </div>
            </div>
          </div>
        </div>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group" style="text-align:center">
          <?php 
          if($producto["imagen_producto"]==""){
            ?>
            <img src="assest/dist/img/product_default.png" alt="" width="150" class="img-thumbnail previsualizar">
            <?php
          }else{
            ?>
             <img src="assest/dist/img/productos/<?php echo $producto["imagen_producto"];?>" alt="" width="150" class="img-thumbnail previsualizar">
            <?php
          }
          ?>
         
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
      cod_producto_sin: {
        required: true,
        minlength: 3
      },
      precio_p: {
        required: true,
        minlength: 1
      },
      medida_p: {
        required: true,
        minlength: 1
      },
      medida_sin: {
        required: true,
        minlength: 1,
        number: true
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