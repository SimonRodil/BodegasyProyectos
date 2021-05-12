<?php include ("../../mod/config.php");
include ("../../mod/users.php");
session_start();

# Chequeo que haya iniciado sesión..
if(!isset($_SESSION['sert_cpanel']['id']) || empty($_SESSION['sert_cpanel']['id'])) { header ('Location: sign-in.php'); }

# Me conecto a la base de datos.
$con_users = new Users();
$user = $con_users->SelUser($_GET['id'])->fetch_array();

if($user['rank'] < 9) {
  $query = $con_users->DelUser($_GET['id']);
} else {
  http_response_code(500);
  return;
}

# Si fue posible, muestro el mensaje, sinó muestro lo que me arroja la consulta.
if($query == TRUE) { echo "success"; LogReport("El Usuario " . $_SESSION['sert_cpanel']['username'] . " ha eliminado al usuario: " . $_GET['id']); } else { echo $query; }

?>