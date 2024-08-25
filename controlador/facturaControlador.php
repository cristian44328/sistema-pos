<?php

$ruta=parse_url($_SERVER["REQUEST_URI"]);

if(isset($ruta["query"])){
    if($ruta["query"]=="ctrRegFactura"||$ruta["query"]=="ctrEditFactura"||
    $ruta["query"]=="ctrEliFactura"){
        $metodo=$ruta["query"];
        $factura=new ControladorFactura();
        $factura->$metodo();
    }

}

class ControladorFactura{

    static public function ctrInfoFacturas(){
        $respuesta=ModeloFactura::mdlInfoFacturas();
        return $respuesta;
    }
    static public function ctrRegFactura(){

        require "../modelo/facturaModelo.php";

        $data=array(
            "codFactura"=>$_POST["codFactura"],
            "cliente"=>$_POST["cliente"],
            "detalle"=>$_POST["detalle"],
            "neto"=>$_POST["neto"],
            "descuento"=>$_POST["descuento"],
            "total"=>$_POST["total"],
            "puntoVenta"=>$_POST["puntoVenta"],
            "usuario"=>$_POST["usuario"],
            "leyenda"=>$_POST["leyenda"]
        );

        //var_dump($data);
        $respuesta=ModeloFactura::mdlRegFactura($data);
        echo $respuesta;
        
    }
    static public function ctrInfoFactura($id){
        $respuesta=ModeloFactura::mdlInfoFactura($id);
        return $respuesta;
    }
    static public function ctrEditFactura(){

        require "../modelo/facturaModelo.php";
        
        $data=array(
            "codFactura"=>$_POST["codFactura"],
            "cliente"=>$_POST["cliente"],
            "detalle"=>$_POST["detalle"],
            "neto"=>$_POST["neto"],
            "descuento"=>$_POST["descuento"],
            "total"=>$_POST["total"],
            "puntoVenta"=>$_POST["puntoVenta"],
            "usuario"=>$_POST["usuario"],
            "leyenda"=>$_POST["leyenda"],
            "id"=>$_POST["idFactura"]
            
        );

        //var_dump($data);
        ModeloFactura::mdlEditFactura($data);
        $respuesta=ModeloFactura::mdlEditFactura($data);
        echo $respuesta; 

    }

    static public function ctrEliFactura(){
        require "../modelo/facturaModelo.php";

        $id=$_POST["id"];
        $respuesta=ModeloFactura::mdlEliFactura($id);
        echo $respuesta;

    }

}