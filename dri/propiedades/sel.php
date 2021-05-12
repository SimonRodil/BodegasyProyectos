<?php 

header('Content-Type: application/json'); 

# Inicio sesión.
session_start();

require ('../../mod/config.php');
require ('../../mod/propiedades.php');
$con_propiedades = new Propiedades();
$query = $con_propiedades->SelPropiedades()->fetch_all(MYSQLI_ASSOC);

echo json_encode($query);

?>