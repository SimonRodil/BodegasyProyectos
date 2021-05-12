<?php 


header('Content-Type: application/json'); 

# Inicio sesión.
session_start();

require ('../../mod/config.php');
require ('../../mod/propiedades.php');
$con_propiedades = new Propiedades();
$query = $con_propiedades->DelPropiedad($_GET['id']);

echo json_encode($query);

?>