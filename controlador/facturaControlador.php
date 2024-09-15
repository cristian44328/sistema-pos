<?php

$ruta=parse_url($_SERVER["REQUEST_URI"]);

if(isset($ruta["query"])){
    if($ruta["query"]=="ctrRegFactura"||
    $ruta["query"]=="ctrNumFactura"||
    $ruta["query"]=="ctrNuevoCufd"||
    $ruta["query"]=="ctrUltimoCufd"||
    $ruta["query"]=="ctrLeyenda"||
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
            "cliente"=>$_POST["idCliente"],
            "detalle"=>$_POST["detalle"],
            "neto"=>$_POST["neto"],
            "descuento"=>$_POST["descuento"],
            "total"=>$_POST["total"],
            "fecha"=>$_POST["fecha"],
            "cufd"=>$_POST["cufd"],
            "cuf"=>$_POST["cuf"],
            "xml"=>$_POST["xml"],
            "idUsuario"=>$_POST["idUsuario"],
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

    static public function ctrEliFactura(){
        require "../modelo/facturaModelo.php";

        $id=$_POST["id"];
        $respuesta=ModeloFactura::mdlEliFactura($id);
        echo $respuesta;

    }

    static public function ctrNumFactura(){

        require "../modelo/facturaModelo.php";
        $respuesta=ModeloFactura::mdlNumFactura();
        if($respuesta["max(id_factura)"]===null){
            echo "1";
        }else{
            echo $respuesta["max(id_factura)"]+1;
        }
    }

    static public function ctrNuevoCufd(){
        require "../modelo/facturaModelo.php";

        $data=array(
            "cufd"=>$_POST["cufd"],
            "fechaVigCufd"=>$_POST["fechaVigCufd"],
            "codControlCufd"=>$_POST["codControlCufd"]
        );

        echo ModeloFactura::mdlNuevoCufd($data);
    }

    static public function ctrUltimoCufd(){
        require "../modelo/facturaModelo.php";

        $respuesta = ModeloFactura::mdlUltimoCufd();
        echo json_encode($respuesta);
    }

    static public function ctrLeyenda(){
        require "../modelo/facturaModelo.php";
        
        $respuesta=ModeloFactura::mdlLeyenda();
        echo json_encode($respuesta);
    }

}