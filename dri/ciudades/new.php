<?php 

header('Content-Type: application/json'); 

# Inicio sesión.
session_start();

require ('../../mod/config.php');
require ('../../mod/ciudades.php');
$con_ciudades = new Ciudades();

# Error de inicio de sesión.
if(!isset($_SESSION['sert_cpanel'])) { echo json_encode(['message'=>'Sesión no iniciada...']); http_response_code(400); return; }

$nombre = $_POST['nombre'];

$query = $con_ciudades->NewCiudad($nombre);

if($query != true) { echo json_encode(['message'=>'No se ha podido ejecutar el comando SQL...']); http_response_code(400); return; }
echo json_encode(['message'=>'Consulta exitosa!, ']); http_response_code(200); return;

?>