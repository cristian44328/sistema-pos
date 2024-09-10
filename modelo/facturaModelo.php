<?php
require_once "conexion.php";

class ModeloFactura{

    static public function mdlInfoFacturas(){

        $stmt=Conexion::conectar()->prepare("select * from factura");
        $stmt->execute();

        return $stmt->fetchAll();

    }
    static public function mdlRegFactura($data){

        $codFactura=$data["codFactura"];
        $cliente=$data["cliente"];
        $detalle=$data["detalle"];
        $neto=$data["neto"];
        $descuento=$data["descuento"];
        $total=$data["total"];
        $puntoVenta=$data["puntoVenta"];
        $usuario=$data["usuario"];
        $leyenda=$data["leyenda"];

        $stmt=Conexion::conectar()->prepare("insert into factura(cod_factura, id_cliente, detalle, neto, descuento, total,
        id_punto_venta, usuario, leyenda)
        values('$codFactura', '$cliente', '$detalle', '$neto', '$descuento', '$total', '$puntoVenta', '$usuario', '$leyenda')");

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

        $codFactura=$data["codFactura"];
        $cliente=$data["cliente"];
        $detalle=$data["detalle"];
        $neto=$data["neto"];
        $descuento=$data["descuento"];
        $total=$data["total"];
        $puntoVenta=$data["puntoVenta"];
        $usuario=$data["usuario"];
        $leyenda=$data["leyenda"];
        $id=$data["id"];

        $stmt=Conexion::conectar()->prepare("update factura set cod_factura='$codFactura', id_cliente='$cliente', detalle='$detalle',
        neto='$neto', descuento='$descuento', total='$total', id_punto_venta='$puntoVenta', usuario='$usuario', leyenda='$leyenda'
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

    static public function mdlNumFactura(){

        $stmt=Conexion::conectar()->prepare("select max(id_factura) from factura");
        $stmt->execute();

        return $stmt->fetch();

    }
    static public function mdlNuevoCufd($data){
        
        $cufd=$data["cufd"];
        $fechaVigCufd=$data["fechaVigCufd"];
        $codControlCufd=$data["codControlCufd"];

        $stmt=Conexion::conectar()->prepare("insert into cufd(codigo_cufd, codigo_control, fecha_vigencia)
        values('$cufd', '$codControlCufd', '$fechaVigCufd')");

        if($stmt->execute()){
            return "ok";
        }else{
            return "error";
        }

    }
    static public function mdlUltimoCufd(){

        $stmt=Conexion::conectar()->prepare("select * from cufd where id_cufd=(select max(id_cufd) from cufd)");
        $stmt->execute();

        return $stmt->fetch();
    }

    static public function mdlLeyenda(){

        $stmt=Conexion::conectar()->prepare("select * from leyenda order by rand() limit 1");
        $stmt->execute();

        return $stmt->fetch();
    }


}