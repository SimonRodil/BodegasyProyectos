<?php 

header('Content-Type: application/json'); 

# Inicio sesión.
session_start();

require ('../../mod/config.php');
require ('../../mod/users.php');
$con_users = new Users();
$query = $con_users->SelUsers()->fetch_all(MYSQLI_ASSOC);

echo json_encode($query);

?>