<form action="" id="FRegProducto" enctype="multipart/form-data">
  <div class="modal-header bg-success">
    <h4 class="modal-title">Registro nuevo Producto</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body">
    <div class="row">
      <div class="col-sm-6">
        <div class="form-group">
         <label for="">Cod. Producto</label>
         <input type="text" name="cod_producto" class="form-control" id="cod_producto">
        </div>
      </div>
      <div class="col-sm-6">
       <div class="form-group"> 
         <label for="">Cod. Producto SIN</label>
         <input type="text" name="cod_producto_sin" class="form-control" id="cod_producto_sin">
       </div>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-6">
      <div class="form-group">
      <label for="">Descripcion</label>
      <input type="text" name="nombre_p" class="form-control" id="nombre_p">
    </div>
      </div>
      <div class="col-sm-6">
       <div class="form-group">
         <label for="">Precio</label>
         <input type="text" name="precio_p" class="form-control" id="precio_p">
       </div>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-6">
      <div class="form-group">
      <label for="">Unidad Medida</label>
      <input type="text" name="medida_p" class="form-control" id="medida_p">
    </div>
      </div>
      <div class="col-sm-6">
       <div class="form-group">
         <label for="">Unidad Medida SIN</label>
         <input type="text" name="medida_sin" class="form-control" id="medida_sin">
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
            <label for="imgProducto" class="custom-file-label">Elegir archivo</label>
          </div>
          <div class="input-group-append">
            <span class="input-group-text">Subir</span>
          </div>
        </div>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group" style="text-align:center">
          <img src="assest/dist/img/product_default.png" alt="" width="150" class="img-thumbnail previsualizar">
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
      regProducto()
    }
  });

  $('#FRegProducto').validate({
    rules: {
      cod_producto: {
        required: true,
        minlength: 3
      },
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