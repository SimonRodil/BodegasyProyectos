<?php include "../../mod/config.php";
include "../../mod/posts.php";
session_start();

# Chequeo que haya iniciado sesión..
if(!isset($_SESSION['sert_cpanel']['id']) || empty($_SESSION['sert_cpanel']['id'])) { header ('Location: sign-in.php'); }

# Establezco conexion con la BD.
$con_posts = new Posts();

# Chequeo que las variables recibidas no esten vacias.
if(!empty($_GET['id'])) {
  
  # El ID del mensaje.
  $id = $_GET['id'];
  
  # Chequeo que si exista el mensaje que voy a responder.
  if ($con_posts->SelPost($id)->num_rows > 0) {
    
    # Busco la imagen para borrarla.
    $post = $con_posts->SelPost($id)->fetch_array();
    unlink("../../../images/posts/" . $post['image']);
    
    # Procedo a guardar el mensaje.
    $query = $con_posts->DelPost($id);
    
    # Chequeo que se haya ejecutado de manera exitosa.
    if($query == TRUE) {
      
      echo "success";
      LogReport("El usuario " . $_SESSION['sert_cpanel']['username'] . " ha eliminado la publicación de ID: " . $id);
      
    } else { echo $query; }
    
  } else { echo "error-message-row"; }
  
} else { echo "error-empty"; }

?>