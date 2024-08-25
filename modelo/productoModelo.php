<?php
require_once "conexion.php";

class ModeloProducto{

    static public function mdlInfoProductos(){

        $stmt=Conexion::conectar()->prepare("select * from producto");
        $stmt->execute();

        return $stmt->fetchAll();

    }
    static public function mdlRegProducto($data){
        $cod_pro=$data["cod_Producto"];
        $cod_pro_sin=$data["producto_sin"];
        $nom_pro=$data["nombre_p"];
        $precio=$data["precio"];
        $medida=$data["medida"];
        $medida_sin=$data["medida_sin"];
        $imagen=$data["imagen"];
        

        $stmt=Conexion::conectar()->prepare("insert into producto(cod_producto, cod_producto_sin, nombre_producto, precio_producto,
        unidad_medida, unidad_medida_sin, imagen_producto)
        values('$cod_pro', '$cod_pro_sin', '$nom_pro', '$precio', '$medida', '$medida_sin', '$imagen')");

        if($stmt->execute()){
            return "ok";
        }else{
            return "error";
        }
    }
    static public function mdlInfoProducto($id){
        $stmt=Conexion::conectar()->prepare("select * from producto where id_producto=$id");
        $stmt->execute();

        return $stmt->fetch();
    }

    static public function mdlEditProducto($data){

        $cod_pro=$data["cod_Producto"];
        $cod_pro_sin=$data["producto_sin"];
        $nom_pro=$data["nombre_p"];
        $precio=$data["precio"];
        $medida=$data["medida"];
        $medida_sin=$data["medida_sin"];
        $imagen=$data["imagen"];
        $disponible=$data["disponible"];
        $id=$data["id"];

        $stmt=Conexion::conectar()->prepare("update producto set cod_producto='$cod_pro', cod_producto_sin='$cod_pro_sin',
        nombre_producto='$nom_pro', precio_producto='$precio', unidad_medida='$medida', unidad_medida_sin='$medida_sin', 
        imagen_producto='$imagen', disponible='$disponible' where id_producto=$id");

        if($stmt->execute()){
            return "ok";
        }else{
            return "error";
        }
    }
    static public function mdlEliProducto($id){

        $stmt=Conexion::conectar()->prepare("delete from producto where id_producto='$id'");

        if($stmt->execute()){
            return "ok";
        }else{
            return "error";
        }
    }

    
}