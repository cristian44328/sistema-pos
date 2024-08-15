<?php
require_once "conexion.php";

class ModeloFactura{

    static public function mdlInfoFacturas(){

        $stmt=Conexion::conectar()->prepare("select * from factura");
        $stmt->execute();

        return $stmt->fetchAll();

    }
    static public function mdlRegFactura($data){
        $loginFactura=$data["loginFactura"];
        $password=$data["password"];
        $perfil=$data["perfil"];

        $stmt=Conexion::conectar()->prepare("insert into factura(login_factura, password, perfil)
        values('$loginFactura', '$password', '$perfil')");

        if($stmt->execute()){
            return "ok";
        }else{
            return "error";
        }
    }
    static public function mdlInfoFactura($id){
        $stmt=Conexion::conectar()->prepare("select * from factura where id_factura=$id");
        $stmt->execute();

        return $stmt->fetch();
    }
    static public function mdlEditFactura($data){
        $password=$data["password"];
        $perfil=$data["perfil"];
        $estado=$data["estado"];
        $id=$data["id"];

        $stmt=Conexion::conectar()->prepare("update factura set password='$password', perfil='$perfil', estado='$estado'
        where id_factura=$id");

        if($stmt->execute()){
            return "ok";
        }else{
            return "error";
        }
    }
    static public function mdlEliFactura($id){

        $stmt=Conexion::conectar()->prepare("delete from factura where id_factura='$id'");

        if($stmt->execute()){
            return "ok";
        }else{
            return "error";
        }
    }

}