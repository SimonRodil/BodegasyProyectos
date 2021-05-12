<?php 

header('Content-Type: application/json'); 

# Inicio sesión.
session_start();

require ('../../mod/config.php');
require ('../../mod/propiedades.php');
$con_propiedades = new Propiedades();

# Error de inicio de sesión.
if(!isset($_SESSION['sert_cpanel'])) { echo json_encode(['message'=>'Sesión no iniciada...']); http_response_code(400); return; }

$nombre = $_POST['nombre'];
$id = $_POST['id'];

$query = $con_ciudades->UpdCiudad($id, $nombre);

if($query != true) { echo json_encode(['message'=>'No se ha podido ejecutar el comando SQL...']); http_response_code(400); return; }
echo json_encode(['message'=>'Consulta exitosa!']); http_response_code(200); return;

?>