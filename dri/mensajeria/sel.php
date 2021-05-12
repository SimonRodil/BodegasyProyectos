<?php 

header('Content-Type: application/json'); 

# Inicio sesión.
session_start();

$asesor = $_SESSION['sert_cpanel']['id'];

require ('../../mod/config.php');
require ('../../mod/mensajeria.php');
$con_mensajeria = new Mensajes();
$query = $con_mensajeria->SelMensajesPorAsesor($asesor)->fetch_all(MYSQLI_ASSOC);

echo json_encode($query);

?>