<?php 

header('Content-Type: application/json'); 

# Inicio sesión.
session_start();

require ('../../../mod/config.php');
require ('../../../mod/propiedades.php');
$con_propiedades = new Galeria();
$query = $con_propiedades->SelGaleria($_POST['id'])->fetch_all(MYSQLI_ASSOC);

echo json_encode($query);

?>