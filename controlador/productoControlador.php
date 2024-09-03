<?php

$ruta=parse_url($_SERVER["REQUEST_URI"]);

if(isset($ruta["query"])){
    if($ruta["query"]=="ctrRegProducto"||
    $ruta["query"]=="ctrEditProducto"||
    $ruta["query"]=="ctrBusProducto"||
    $ruta["query"]=="ctrEliProducto"){
        $metodo=$ruta["query"];
        $producto=new ControladorProducto();
        $producto->$metodo();
    }

}

class ControladorProducto{

    static public function ctrInfoProductos(){
        $respuesta=ModeloProducto::mdlInfoProductos();
        return $respuesta;
    }
    static public function ctrRegProducto(){

        require "../modelo/productoModelo.php";

        $imagen=$_FILES["imgProducto"];

        //var_dump($imagen);
        $imgNombre=$imagen["name"];
        $imgTmp=$imagen["tmp_name"];

        move_uploaded_file($imgTmp,"../assest/dist/img/productos/".$imgNombre);

        $data=array(
            "cod_Producto"=>$_POST["cod_producto"],
            "producto_sin"=>$_POST["cod_producto_sin"],
            "nombre_p"=>$_POST["nombre_p"],
            "precio"=>$_POST["precio_p"],
            "medida"=>$_POST["medida_p"],
            "medida_sin"=>$_POST["medida_sin"],
            "imagen"=>$imgNombre,
        );

        //var_dump($data);
        $respuesta=ModeloProducto::mdlRegProducto($data);
        echo $respuesta;
        
    }
    static public function ctrInfoProducto($id){
        $respuesta=ModeloProducto::mdlInfoProducto($id);
        return $respuesta;
    }
    static public function ctrEditProducto(){

        require "../modelo/productoModelo.php";

        $imagen=$_FILES["imgProducto"];

        if($imagen["name"]==""){
            $imgNombre=$_POST["imgActual"];
        }else{
            $imgNombre=$imagen["name"];
            $imgTmp=$imagen["tmp_name"];
            move_uploaded_file($imgTmp,"../assest/dist/img/productos/".$imgNombre);
        }

        //var_dump($imagen);
        $data=array(

            "producto_sin"=>$_POST["cod_producto_sin"],
            "nombre_p"=>$_POST["nombre_p"],
            "precio"=>$_POST["precio_p"],
            "medida"=>$_POST["medida_p"],
            "medida_sin"=>$_POST["medida_sin"],
            "imagen"=>$imgNombre,
            "disponible"=>$_POST["disponible"],
            "id"=>$_POST["idProducto"]
        );

        //var_dump($data);
        ModeloProducto::mdlEditProducto($data);
        $respuesta=ModeloProducto::mdlEditProducto($data);
        echo $respuesta; 

    }

    static public function ctrEliProducto(){
        require "../modelo/productoModelo.php";

        $id=$_POST["id"];
        $respuesta=ModeloProducto::mdlEliProducto($id);
        echo $respuesta;

    }

    static public function ctrBusProducto(){
        
        require "../modelo/productoModelo.php";

        $codProducto=$_POST["codProducto"];

        $respuesta=ModeloProducto::mdlBusProducto($codProducto);
        echo json_encode($respuesta);   
    }

}