<?php include ("../mod/config.php");
session_start();

# Chequeo que no haya iniciado sesión.
if(!isset($_SESSION['sert_cpanel']['id']) || empty($_SESSION['sert_cpanel']['id'])) { header ('Location: sign-in.php'); } 

# Me conecto a la base de datos.
$adb = new MySQL();
$con = $adb->Connect();

if(!empty($_POST['message'])) {
  
  # Recibo la información y la inserto en una variable.
  $message = $_POST['message'];
  $user = $_SESSION['sert_cpanel']['username'];
  
  # Envio el dato.
  $query = $con->prepare("INSERT INTO `reports` (`message`, `user`) VALUES (?, ?)");
  $query->bind_param("ss", $message, $user);
  $query->execute();
  
  if($query == TRUE) { 
    echo "success"; 
    LogReport("El usuario " . $user . " registró un reporte.");
  } else { echo $query; }
  
  $con->close();
  $query->close();
  
} else { echo "empty"; }

?>