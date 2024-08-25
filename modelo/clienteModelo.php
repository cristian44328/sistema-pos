<?php
require_once "conexion.php";

class ModeloCliente{

    
    static public function mdlInfoClientes(){

        $stmt=Conexion::conectar()->prepare("select * from cliente");
        $stmt->execute();

        return $stmt->fetchAll();

    }
    static public function mdlRegCliente($data){
        
        $razon_social=$data["razon_social"];
        $nit=$data["nit"];
        $direccion=$data["direccion"];
        $nombre=$data["nombre"];
        $telefono=$data["telefono"];
        $email=$data["email"];

        $stmt=Conexion::conectar()->prepare("insert into cliente(razon_social_cliente, nit_ci_cliente, direccion_cliente, nombre_cliente, telefono_cliente, email_cliente)
        values('$razon_social', '$nit', '$direccion', '$nombre', '$telefono', '$email')");

        if($stmt->execute()){
            return "ok";
        }else{
            return "error";
        }
    }
    static public function mdlInfoCliente($id){
        $stmt=Conexion::conectar()->prepare("select * from cliente where id_cliente=$id");
        $stmt->execute();

        return $stmt->fetch();
    }
    static public function mdlEditCliente($data){

        $razon=$data["razon_social"];
        $nit=$data["nit"];
        $direccion=$data["direccion"];
        $nombre=$data["nombre"];
        $telefono=$data["telefono"];
        $email=$data["email"];
        $id=$data["id"];

        $stmt=Conexion::conectar()->prepare("update cliente set razon_social_cliente='$razon', nit_ci_cliente='$nit',
        direccion_cliente='$direccion', nombre_cliente='$nombre', telefono_cliente='$telefono', email_cliente='$email' 
        where id_cliente=$id");

        if($stmt->execute()){
            return "ok";
        }else{
            return "error";
        }
    }
    static public function mdlEliCliente($id){

        $stmt=Conexion::conectar()->prepare("delete from cliente where id_cliente='$id'");

        if($stmt->execute()){
            return "ok";
        }else{
            return "error";
        }
    }

}