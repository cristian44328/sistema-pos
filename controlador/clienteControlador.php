<?php

$ruta=parse_url($_SERVER["REQUEST_URI"]);

if(isset($ruta["query"])){
    if($ruta["query"]=="ctrRegCliente"||$ruta["query"]=="ctrEditCliente"||
    $ruta["query"]=="ctrEliCliente"){
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
        $password=password_hash($_POST["password"], PASSWORD_DEFAULT);

        $data=array(
            "loginCliente"=>$_POST["login"],
            "password"=>$password,
            "perfil"=>"Moderador"
        );

        //var_dump($data);
        $respuesta=ModeloCliente::mdlRegCliente($data);
        echo $respuesta;
        
    }
    static public function ctrInfoCliente($id){
        $respuesta=ModeloCliente::mdlInfoCliente($id);
        return $respuesta;
    }
    static public function ctrEditCliente(){

        require "../modelo/clienteModelo.php";

        if($_POST["password"]==$_POST["passActual"]){
            $password=$_POST["passActual"];
        }else{
            $password=password_hash($_POST["password"], PASSWORD_DEFAULT);
        }

        
        $data=array(
            "password"=>$password,
            "id"=>$_POST["idCliente"],
            "perfil"=>$_POST["perfil"],
            "estado"=>$_POST["estado"]
        );

        //var_dump($data);
        ModeloCliente::mdlEditCliente($data);
        $respuesta=ModeloCliente::mdlEditCliente($data);
        echo $respuesta; 

    }

    static public function ctrEliCliente(){
        require "../modelo/clienteModelo.php";

        $id=$_POST["id"];
        $respuesta=ModeloCliente::mdlEliCliente($id);
        echo $respuesta;

    }

}