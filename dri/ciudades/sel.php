<?php 

header('Content-Type: application/json'); 

# Inicio sesión.
session_start();

require ('../../mod/config.php');
require ('../../mod/ciudades.php');
$con_ciudades = new Ciudades();
$query = $con_ciudades->SelCiudades()->fetch_all(MYSQLI_ASSOC);

echo json_encode($query);

?>