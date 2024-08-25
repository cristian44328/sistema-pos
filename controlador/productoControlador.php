<?php

$ruta=parse_url($_SERVER["REQUEST_URI"]);

if(isset($ruta["query"])){
    if($ruta["query"]=="ctrRegProducto"||$ruta["query"]=="ctrEditProducto"||
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

        $data=array(
            "cod_Producto"=>$_POST["cod_producto"],
            "producto_sin"=>$_POST["producto_sin"],
            "nombre_p"=>$_POST["nombre_p"],
            "precio"=>$_POST["precio"],
            "medida"=>$_POST["medida"],
            "medida_sin"=>$_POST["medida_sin"],
            "imagen"=>$_POST["imagen"],
            "disponible"=>$_POST["disponible"]
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
        
        $data=array(

            "cod_Producto"=>$_POST["cod_producto"],
            "producto_sin"=>$_POST["producto_sin"],
            "nombre_p"=>$_POST["nombre_p"],
            "precio"=>$_POST["precio"],
            "medida"=>$_POST["medida"],
            "medida_sin"=>$_POST["medida_sin"],
            "imagen"=>$_POST["imagen"],
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

}