<?php 

session_start();

# Chequeo que haya iniciado sesión..
if(!isset($_SESSION['sert_cpanel']['id']) || empty($_SESSION['sert_cpanel']['id'])) { header ('Location: sign-in.php'); }

require "../../mod/config.php";
require "../../mod/users.php";
$con_users = new Users;

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
      if(empty($_POST['password_1'])){ $password = NULL; } else { $password = password($_POST['password_1']); }
      
      # Declaro las variables.
      foreach($_POST as $nombre_campo => $valor){
          if($valor == '-' || empty($valor)) {
            $arreglo = "\$" . $nombre_campo . "=NULL;";
          } else {
            $arreglo = "\$" . $nombre_campo . "='" . $valor . "';";
          }
          eval($arreglo);
      }
      
      $id = $_POST['id'];
      
      # Envio los datos.
      $update = $con_users->UpdUser($id, $username, $name, $password, $email, $rank, $telephone, $facebook, $linkedin, $twitter, $instagram);
      
      # Muestro el mensaje, guardo el registro.
      if($update == TRUE) { 
        
        echo "success"; 
        LogReport("El usuario " . $_SESSION['sert_cpanel']['username'] . " actualizó sus datos con los siguientes datos:  (Usuario: " . $username . ") (Contraseña: " . $_POST['password_1'] . " -> " . $password . ") (Email: " . $email . ")");  http_response_code(200); return; 
      
      # Muestro el mensaje de error y lo guardo en los registros.  
      } else { 
        
        echo $update;
        LogReport("El usuario " . $_SESSION['sert_cpanel']['username'] . " trató de actualizar y le dio el error de actualizar por: " . $update); 
         http_response_code(500); return; 
        
      }
      
    # Muestro el error y guardo el registro de lo sucedido..
    } else { 
      
      echo "error-user-email"; 
      LogReport("El usuario: " . $_SESSION['sert_cpanel']['username'] . ", Intento actualizar su correo y/o usuario con: " . $_POST['username'] . " - " . $_POST['email'] . ", pero estas ya se encontraban ocupados.");  http_response_code(500); return; 
      
    }
    
  # Muestro el error..  
  } else { echo "error-email-validate"; http_response_code(500); return;  }
  
# Muestro el error..
} else { echo "error-empty"; http_response_code(500); return;  }

?>