<?php 

header('Content-Type: application/json'); 

# Inicio sesión.
session_start();

require ('../../mod/config.php');
require ('../../mod/barrios.php');
$con_barrios = new Barrios();
$query = $con_barrios->SelBarriosPorCiudad($_GET['ciudad'])->fetch_all(MYSQLI_ASSOC);

echo json_encode($query);

?>