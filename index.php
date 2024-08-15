<?php
/* controladores */
require_once "controlador/plantillaControlador.php";
require_once "controlador/usuarioControlador.php";

/*Modelos*/
require_once "modelo/usuarioModelo.php";

$plantilla=new ControladorPlantilla();
$plantilla->ctrPlantilla();