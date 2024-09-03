
var host="http://localhost:5000/";


function MNuevoFactura(){

    $("#modal-default").modal("show")

    var obj=""
    $.ajax({
        type:"POST",
        url:"vista/factura/fNuevoFactura.php",
        data:obj,
        success:function(data){
            $("#content-default").html(data)
        }
    })
}

function regFactura(){
    
    var formData=new FormData($("#FRegFactura")[0])

        $.ajax({
            type:"POST",
            url:"controlador/facturaControlador.php?ctrRegFactura",
            data:formData,
            cache:false,
            contentType:false,
            processData:false,
            success:function(data){

              if(data == "ok"){

                Swal.fire({
                    title: "Factura registrado",
                    icon: "success",
                    showConfirmButton: false,
                    timer: 1000
                  })

                  setTimeout(function(){
                    location.reload()
                  },1200)

              }else{
                Swal.fire({
        
                    title: "Error!",
                    icon: "error",
                    showConfirmButton: false,
                    timer: 1000
                  })
              }

            }
        })
}

function MEditFactura(id){

    $("#modal-default").modal("show")

    var obj=""
    $.ajax({
        type:"POST",
        url:"vista/factura/FEditarFactura.php?id="+id,
        data:obj,
        success:function(data){
            $("#content-default").html(data)
        }
    })

}

function MEliFactur(id){

    var obj={
        id:id
    }

    swal.fire({
        title:"Estas seguro de eliminar esta factura?",
        showDenyButton:true,
        showCancelButton:false,
        confirmButtonText:'confirmar',
        denyButtonText:'cancelar'
    }).then((result)=>{
        if(result.isConfirmed){
            $.ajax({
                type:"POST",
                url:"controlador/facturaControlador.php?ctrEliFactura",
                data:obj,
                success:function(data){
                 if(data=="ok"){
                    location.reload()
                 }else{
                    Swal.fire({
                        
                        icon: "error",
                        showConfirmButton: false,
                        title: "error",
                        text: "La factura no pudo ser eliminada",
                        timer: 1000
                      })
                 }
               }
            })
        }
    })
}

function verificarComunicacion(){
    var obj=""

    $.ajax({
        type:"POST",
        url:host+"api/CompraVenta/comunicacion",
        data:obj,
        cache:false,
        contentType:"application/json",
        processData:false,
        success:function(data){

            if(data["transaccion"]== true){
                document.getElementById("comunSiat").innerHTML="Conectado"
                document.getElementById("comunSiat").className="badge badge-success"
            }
            
        }
    }).fail(function(jqXHR, textStatus, errorThrown){
        if(jqXHR.status==0){
            document.getElementById("comunSiat").innerHTML="Desconectado"
            document.getElementById("comunSiat").className="badge badge-danger"
        }
    })
}

setInterval(verificarComunicacion, 3000)

function busCliente(){

    let nitCliente=document.getElementById("nitCliente").value

    var obj={
        nitCliente:nitCliente
    }

    $.ajax({
        type:"POST",
        url:"controlador/clienteControlador.php?ctrBusCliente",
        data:obj,
        dataType:"json",
        success:function(data){
            //console.log(data);
            if(data["email_cliente"]===""){
                document.getElementById("emailCliente").value="null";
            }else{
                document.getElementById("emailCliente").value=data["email_cliente"];
            }
            document.getElementById("rsCliente").value=data["razon_social_cliente"];
            numFactura();
        }
    })
}

/*=========================
Generar numero de factura
=========================*/

function numFactura(){
    let obj=""

    $.ajax({
        type:"POST",
        url:"controlador/facturaControlador.php?ctrNumFactura",
        data:obj,
        dataType:"json",
        success:function(data){
            document.getElementById("numFactura").value=data
        }
    })
}

function busProducto(){

    let codProducto=document.getElementById("codProducto").value

    var obj={
        codProducto:codProducto
    }

    $.ajax({
        type:"POST",
        url:"controlador/productoControlador.php?ctrBusProducto",
        data:obj,
        dataType:"json",
        success:function(data){
            //console.log(data);
          
                document.getElementById("conceptoPro").value=data["nombre_producto"]; 
                document.getElementById("uniMedida").value=data["unidad_medida"];
                document.getElementById("preUnitario").value=data["precio_producto"];
                document.getElementById("uniMedidaSin").value=data["unidad_medida_sin"];
                document.getElementById("codProductoSin").value=data["cod_producto_sin"];
        }
    })
}

function calcularPrePro(){
    let cantProducto=parseInt(document.getElementById("cantProducto").value)
    let descProducto=parseFloat(document.getElementById("descProducto").value)
    let preUnitario=parseFloat(document.getElementById("preUnitario").value)

    let prePro=preUnitario-descProducto
    document.getElementById("preTotal").value=prePro*cantProducto
}

/*================
Carrito
================*/

var arregloCarrito=[]
var listaDetalle=document.getElementById("listaDetalle")

function agregarCarrito(){
    let actEconomica=document.getElementById("actEconomica").value
    let codProducto=document.getElementById("codProducto").value
    let codProductoSin=parseInt(document.getElementById("codProductoSin").value)
    let conceptoPro=document.getElementById("conceptoPro").value
    let cantProducto=parseInt(document.getElementById("cantProducto").value)
    let uniMedida=document.getElementById("uniMedida").value
    let uniMedidaSin=parseInt(document.getElementById("uniMedidaSin").value)
    let preUnitario=parseFloat(document.getElementById("preUnitario").value)
    let descProducto=parseFloat(document.getElementById("descProducto").value)
    let preTotal=parseFloat(document.getElementById("preTotal").value)

    let objDetalle={
        actividadEconomica:actEconomica,
        codigoProductoSin:codProductoSin,
        codigoProducto:codProducto,
        descripcion:conceptoPro,
        cantidad:cantProducto,
        unidadMedida:uniMedidaSin,
        precioUnitario:preUnitario,
        montoDescuento:descProducto,
        subtotal:preTotal
    }

    arregloCarrito.push(objDetalle)
    dibujarTablaCarrito()
    
}

function dibujarTablaCarrito(){
    listaDetalle.innerHTML=""

    arregloCarrito.forEach((detalle)=>{
        let fila=document.createElement("tr")
        fila.innerHTML='<td>'+detalle.descripcion+'</td>'+
        '<td>'+detalle.cantidad+'</td>'+
        '<td>'+detalle.precioUnitario+'</td>'+
        '<td>'+detalle.montoDescuento+'</td>'+
        '<td>'+detalle.subtotal+'</td>'

        let tdEliminar=document.createElement("td")
        let botonEliminar=document.createElement("button")
        botonEliminar.classList.add("btn", "btn-danger")
        botonEliminar.innerText="Eliminar"
        botonEliminar.onclick=()=>{
            eliminarCarrito(detalle.codigoProducto)
        }

        tdEliminar.appendChild(botonEliminar)
        fila.appendChild(tdEliminar)

        listaDetalle.appendChild(fila)
    })
}

function eliminarCarrito(cod){
    arregloCarrito=arregloCarrito.filter((detalle)=>{
        if(cod!=detalle.codigoProducto){
            return detalle
        }
    })

    dibujarTablaCarrito()
}