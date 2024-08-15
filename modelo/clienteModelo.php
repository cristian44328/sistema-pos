<?php
require_once "conexion.php";

class ModeloCliente{

    
    static public function mdlInfoClientes(){

        $stmt=Conexion::conectar()->prepare("select * from cliente");
        $stmt->execute();

        return $stmt->fetchAll();

    }
    static public function mdlRegCliente($data){
        $loginCliente=$data["loginCliente"];
        $password=$data["password"];
        $perfil=$data["perfil"];

        $stmt=Conexion::conectar()->prepare("insert into Cliente(login_cliente, password, perfil)
        values('$loginCliente', '$password', '$perfil')");

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
        $password=$data["password"];
        $perfil=$data["perfil"];
        $estado=$data["estado"];
        $id=$data["id"];

        $stmt=Conexion::conectar()->prepare("update cliente set password='$password', perfil='$perfil', estado='$estado'
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