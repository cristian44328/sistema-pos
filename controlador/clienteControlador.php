<?php

$ruta=parse_url($_SERVER["REQUEST_URI"]);

if(isset($ruta["query"])){
    if($ruta["query"]=="ctrRegCliente"||
    $ruta["query"]=="ctrEditCliente"||
    $ruta["query"]=="ctrEliCliente"||
    $ruta["query"]=="ctrBusCliente"){
        $metodo=$ruta["query"];
        $cliente=new ControladorCliente();
        $cliente->$metodo();
    }

}

class ControladorCliente{

    static public function ctrInfoClientes(){
        $respuesta=ModeloCliente::mdlInfoClientes();
        return $respuesta;
    }
    
    static public function ctrRegCliente(){

        require "../modelo/clienteModelo.php";

        $data=array(
            "razon_social"=>$_POST["razon_social"],
            "nit"=>$_POST["nit"],
            "direccion"=>$_POST["direccion"],
            "nombre"=>$_POST["nombre"],
            "telefono"=>$_POST["telefono"],
            "email"=>$_POST["email"]

        );

        //var_dump($data);
        $respuesta=ModeloCliente::mdlRegCliente($data);
        echo $respuesta;
    
    }
    static public function ctrInfoCliente($id){
        $respuesta=ModeloCliente::mdlInfoCliente($id);
        return $respuesta;
    }

    static function ctrBusCliente(){
        
        require "../modelo/clienteModelo.php";

        $nitCliente=$_POST["nitCliente"];

        $respuesta=ModeloCliente::mdlBusCliente($nitCliente);
        echo json_encode($respuesta);
        
    }

    static public function ctrEditCliente(){

        require "../modelo/clienteModelo.php";
        
        $data=array(
            
            "razon_social"=>$_POST["razon_social"],
            "nit"=>$_POST["nit"],
            "direccion"=>$_POST["direccion"],
            "nombre"=>$_POST["nombre"],
            "telefono"=>$_POST["telefono"],
            "email"=>$_POST["email"],
            "id"=>$_POST["idCliente"]
        );

       // var_dump($data);
        ModeloCliente::mdlEditCliente($data);
        $respuesta=ModeloCliente::mdlEditCliente($data);
        echo $respuesta; 

    }

    static function ctrEliCliente(){
        require "../modelo/clienteModelo.php";

        $id=$_POST["id"];
        $respuesta=ModeloCliente::mdlEliCliente($id);
        echo $respuesta;

    }

}