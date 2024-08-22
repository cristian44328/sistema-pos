function MNuevoCliente(){

    $("#modal-default").modal("show")

    var obj=""
    $.ajax({
        type:"POST",
        url:"vista/cliente/fNuevoCliente.php",
        data:obj,
        success:function(data){
            $("#content-default").html(data)
        }
    })
}

function regCliente(){
    
    var formData=new FormData($("#FRegCliente")[0])

        $.ajax({
            type:"POST",
            url:"controlador/clienteControlador.php?ctrRegCliente",
            data:formData,
            cache:false,
            contentType:false,
            processData:false,
            success:function(data){

                console.log(data)

              if(data == "ok"){

                Swal.fire({
                    title: "Cliente registrado",
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

function MEditCliente(id){

    $("#modal-default").modal("show")

    var obj=""
    $.ajax({
        type:"POST",
        url:"vista/cliente/FEditarCliente.php?id="+id,
        data:obj,
        success:function(data){
            $("#content-default").html(data)
        }
    })

}

function editCliente(id){

    var formData=new FormData($("#FEditCliente")[0])

    if(formData.get("password")==formData.get("vrPassword")){

        $.ajax({
            type:"POST",
            url:"controlador/clienteControlador.php?ctrEditCliente",
            data:formData,
            cache:false,
            contentType:false,
            processData:false,
            success:function(data){

              if(data="ok"){

                Swal.fire({
                    title: "Cliente Actualizado",
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
    
}

function MEliCliente(id){

    var obj={
        id:id
    }

    swal.fire({
        title:"Estas seguro de eliminar a este cliente?",
        showDenyButton:true,
        showCancelButton:false,
        confirmButtonText:'confirmar',
        denyButtonText:'cancelar'
    }).then((result)=>{
        if(result.isConfirmed){
            $.ajax({
                type:"POST",
                url:"controlador/clienteControlador.php?ctrEliCliente",
                data:obj,
                success:function(data){
                 if(data=="ok"){
                    location.reload()
                 }else{
                    Swal.fire({
                        
                        icon: "error",
                        showConfirmButton: false,
                        title: "error",
                        text: "El Cliente no pudo ser eliminado",
                        timer: 1000
                      })
                 }
               }
            })
        }
    })
}