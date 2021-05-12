<?php 


header('Content-Type: application/json'); 

# Inicio sesión.
session_start();

require ('../../../mod/config.php');
require ('../../../mod/propiedades.php');
$con_galeria = new Galeria();
$imagen = $con_galeria->SelImagen($_GET['id'])->fetch_array();
$query = $con_galeria->DelImagen($_GET['id']);
$folder = "../../../images/propiedades/fotos/";
unlink($folder . $imagen['imagen']);

?>