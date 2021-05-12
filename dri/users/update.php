<?php include "../../mod/config.php";
include "../../mod/users.php";
session_start();

$con_users = new Users;

# Chequeo que haya iniciado sesión..
if(!isset($_SESSION['sert_cpanel']['id']) || empty($_SESSION['sert_cpanel']['id'])) { header ('Location: sign-in.php'); }

# Chequeo que no esten vacios los campos..
if(!empty($_POST['username']) && !empty($_POST['email'])) {
  
  # Chequeo que el email sea valido..
  if(filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL) == TRUE) {
    
    # Chequeo que el Email y/o usuario no exista/n en el sistema..
    $check_rows = $con_users->Seluser($_POST['email']);
    $user = $check_rows->fetch_array();
    
    # Me aseguro que no hayan registros a ese nombre..
    if($check_rows->num_rows < 1 || ($_POST['email'] == $user['email'])) {
      
      # Contraseña
      if($_POST['password'] == ''){ $password = NULL; } else { $password = password($_POST['password']); }
      
      # Preparo las variables de los datos.
      $username = $_POST['username'];
      $email = $_POST['email'];
      
      $id = $_POST['id'];
      
      # Envio los datos.
      $update = $con_users->UpdUser($id, $password, $email, $username);
      
      # Muestro el mensaje, guardo el registro.
      if($update == TRUE) { 
        
        echo "success"; 
        LogReport("El usuario " . $_SESSION['sert_cpanel']['username'] . " actualizó sus datos con los siguientes datos:  (Usuario: " . $username . ") (Contraseña: " . $_POST['password'] . " -> " . $password . ") (Email: " . $email . ")"); 
      
      # Muestro el mensaje de error y lo guardo en los registros.  
      } else { 
        
        echo $update;
        LogReport("El usuario " . $_SESSION['sert_cpanel']['username'] . " trató de actualizar y le dio el error de actualizar por: " . $update); 
        
      }
      
    # Muestro el error y guardo el registro de lo sucedido..
    } else { 
      
      echo "error-user-email"; 
      LogReport("El usuario: " . $_SESSION['sert_cpanel']['username'] . ", Intento actualizar su correo y/o usuario con: " . $_POST['username'] . " - " . $_POST['email'] . ", pero estas ya se encontraban ocupados."); 
      
    }
    
  # Muestro el error..  
  } else { echo "error-email-validate"; }
  
# Muestro el error..
} else { echo "error-empty"; }

?>