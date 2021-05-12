<?php include "../../mod/config.php";
include "../../mod/contact.php";
session_start();

# Chequeo que haya iniciado sesión..
if(!isset($_SESSION['sert_cpanel']['id']) || empty($_SESSION['sert_cpanel']['id'])) { header ('Location: sign-in.php'); }

# Establezco conexion con la BD.
$con_contact = new Contact();

# Chequeo que las variables recibidas no esten vacias.
if(!empty($_GET['id'])) {
  
  # El ID del mensaje.
  $id_message = $_GET['id'];
  
  # Chequeo que si exista el mensaje que voy a responder.
  if ($con_contact->SelMessage($id_message)->num_rows > 0) {
    
    # Procedo a guardar el mensaje.
    $query = $con_contact->DelMessage($id_message);
    
    # Chequeo que se haya ejecutado de manera exitosa.
    if($query == TRUE) {
      
      echo "success";
      LogReport("El usuario " . $_SESSION['sert_cpanel']['username'] . " ha eliminado el mensaje de ID: " . $id_message);
      
    } else { echo $query; }
    
  } else { echo "error-message-row"; }
  
} else { echo "error-empty"; }

?>