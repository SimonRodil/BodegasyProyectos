<?php 


header('Content-Type: application/json'); 

# Inicio sesión.
session_start();

require ('../../mod/config.php');
require ('../../mod/mensajeria.php');
$con_mensajeria = new Mensajes();
$query = $con_mensajeria->DelMensaje($_GET['id']);

echo json_encode($query);

?>