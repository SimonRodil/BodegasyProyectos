<?php 

header('Content-Type: application/json'); 

# Inicio sesión.
session_start();

require ('../../mod/config.php');
require ('../../mod/propiedades.php');
$con_propiedades = new Propiedades();

if(isset($_GET['asesor']) && !empty($_GET['asesor'])):
  $query = $con_propiedades->SelPropiedadesPorAsesor($_GET['asesor'])->fetch_all(MYSQLI_ASSOC);
endif;

echo json_encode($query);

?>