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

function editFactura(id){

    var formData=new FormData($("#FEditFactura")[0])

        $.ajax({
            type:"POST",
            url:"controlador/facturaControlador.php?ctrEditFactura",
            data:formData,
            cache:false,
            contentType:false,
            processData:false,
            success:function(data){

              if(data == "ok"){

                Swal.fire({
                    title: "Factura Actualizado",
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