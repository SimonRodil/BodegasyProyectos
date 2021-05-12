<?php include "../../mod/config.php";
include "../../mod/contact.php";
session_start();

# Chequeo que haya iniciado sesión..
if(!isset($_SESSION['sert_cpanel']['id']) || empty($_SESSION['sert_cpanel']['id'])) { header ('Location: sign-in.php'); }

# Establezco conexion con la BD.
$con_contact = new Contact();
$con_reply = new Reply();

# Chequeo que las variables recibidas no esten vacias.
if(!empty($_POST['message'])) {
  
  # Guardo la respuesta en una variable.
  $message_reply = $_POST['message'];
  
  # El ID del mensaje.
  $id_message = $_POST['id'];
  
  # Chequeo que si exista el mensaje que voy a responder.
  if ($con_contact->SelMessage($id_message)->num_rows > 0) {
    
    # Procedo a guardar el mensaje.
    $query = $con_reply->NewReply($id_message, $message_reply);
    
    # Chequeo que se haya ejecutado de manera exitosa.
    if($query == TRUE) {
      
      echo "success";
      LogReport("El usuario " . $_SESSION['sert_cpanel']['username'] . " ha respondido el mensaje de ID: " . $id_message . " con la siguiente respuesta: " . $message_reply);
      
    } else { echo $query; }
    
  } else { echo "error-message-row"; }
  
} else { echo "error-empty"; }

?>