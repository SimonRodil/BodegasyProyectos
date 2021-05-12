<?php 

header('Content-Type: application/json'); 

# Inicio sesión.
session_start();

require ('../../mod/config.php');
require ('../../mod/propiedades.php');
$con_propiedades = new Propiedades();

# Declaro las variables.
foreach($_POST as $nombre_campo => $valor){
    if($valor == '-' || empty($valor)) {
      $arreglo = "\$" . $nombre_campo . "=NULL;";
    } else {
      $arreglo = "\$" . $nombre_campo . "='" . $valor . "';";
    }
  
    eval($arreglo);
}

$pagina = ($_GET['pagina'] - 1) * 6;

$query_propiedades = $con_propiedades->FilterPropiedades($tipo_oferta, $tipo_propiedad, $ciudad, $barrio, $area, $precio, $pagina)->fetch_all(MYSQLI_ASSOC);

echo json_encode($query_propiedades);

?>