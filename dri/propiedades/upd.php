<?php 

header('Content-Type: application/json'); 

# Inicio sesión.
session_start();

require ('../../mod/config.php');
require ('../../mod/propiedades.php');
$con_propiedades = new Propiedades();

# Error de inicio de sesión.
if(!isset($_SESSION['sert_cpanel'])) { echo json_encode(['message'=>'Sesión no iniciada...']); http_response_code(400); return; }

$video = NULL;
$imagen_destacada = NULL;
$banos = NULL;

# Declaro las variables.
foreach($_POST as $nombre_campo => $valor){
    if($valor == '-' || empty($valor)) {
      $arreglo = "\$" . $nombre_campo . "=NULL;";
    } else {
      $arreglo = "\$" . $nombre_campo . "='" . $valor . "';";
    }
    eval($arreglo);
}

$query = $con_propiedades->UpdPropiedad($id, $nombre, $tipo_propiedad, $tipo_oferta, $banos, $area, $tamano_lote, $ano, $descripcion, $ciudad, $barrio, $imagen_destacada, $direccion, $video, $precio);

if($query != true) { echo json_encode(['message'=>'No se ha podido ejecutar el comando SQL...']); http_response_code(400); return; }
echo json_encode(['message'=>'Consulta exitosa!']); http_response_code(200); return;

?>