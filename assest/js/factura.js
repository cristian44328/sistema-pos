function MNuevoUsuario(){

    $("#modal-default").modal("show")

    var obj=""
    $.ajax({
        type:"POST",
        url:"vista/usuario/fNuevoUsuario.php",
        data:obj,
        success:function(data){
            $("#content-default").html(data)
        }
    })
}

function regUsuario(){
    
    var formData=new FormData($("#FRegUsuario")[0])
    if(formData.get("password")==formData.get("vrPassword")){

        $.ajax({
            type:"POST",
            url:"controlador/usuarioControlador.php?ctrRegUsuario",
            data:formData,
            cache:false,
            contentType:false,
            processData:false,
            success:function(data){

              if(data="ok"){

                Swal.fire({
                    title: "Usuario registrado",
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

function MEditUsuario(id){

    $("#modal-default").modal("show")

    var obj=""
    $.ajax({
        type:"POST",
        url:"vista/usuario/FEditarUsuario.php?id="+id,
        data:obj,
        success:function(data){
            $("#content-default").html(data)
        }
    })

}

function editUsuario(id){

    var formData=new FormData($("#FEditUsuario")[0])

    if(formData.get("password")==formData.get("vrPassword")){

        $.ajax({
            type:"POST",
            url:"controlador/usuarioControlador.php?ctrEditUsuario",
            data:formData,
            cache:false,
            contentType:false,
            processData:false,
            success:function(data){

              if(data="ok"){

                Swal.fire({
                    title: "Usuario Actualizado",
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

function MEliUsuario(id){

    var obj={
        id:id
    }

    swal.fire({
        title:"Estas seguro de eliminar este usuario?",
        showDenyButton:true,
        showCancelButton:false,
        confirmButtonText:'confirmar',
        denyButtonText:'cancelar'
    }).then((result)=>{
        if(result.isConfirmed){
            $.ajax({
                type:"POST",
                url:"controlador/usuarioControlador.php?ctrEliUsuario",
                data:obj,
                success:function(data){
                 if(data=="ok"){
                    location.reload()
                 }else{
                    Swal.fire({
                        
                        icon: "error",
                        showConfirmButton: false,
                        title: "error",
                        text: "El usuario no pudo ser eliminado",
                        timer: 1000
                      })
                 }
               }
            })
        }
    })
}