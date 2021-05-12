<?php 


header('Content-Type: application/json'); 

# Inicio sesión.
session_start();

require ('../../mod/config.php');
require ('../../mod/propiedades.php');
$con_propiedades = new Propiedades();
$query = $con_propiedades->DelPropiedad($_GET['id']);

echo $query;

if($query == TRUE): http_response_code(200);
else: http_response_code(500);
endif;

?>