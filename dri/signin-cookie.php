<?php 

# Creo la función para iniciar la sesión.
function IniciarSesionMedianteCookie($username) {
      
    # Me conecto y busco. Si existe la base de datos.
    $con_users = new Users();
    $search = $con_users->Seluser($username);
    
    # Chequea que exista ese registro en la base de datos
    if($search->num_rows > 0) {
      
      # Inserto el usuario en un array.
      $user = $search->fetch_array();
              
        # Inserto las variables en la sesión.
        $_SESSION= array (
          
          'sert_cpanel' => array(
            
            "id" => $user['id'],
            "username" => $user['username'],
            "password" => $user['password'],
            "email" => $user['email'],
            "rank" => $user['rank']
            
          )
          
        );
        
        LogReport("Inició Sesión (mediante Cookie): " . $user['username']);
        
        # Todo bien. END.
        return "success";
              
    # En caso de que no exista el registro arrojará error.  
    } else { session_destroy(); ?><script>alert('Datos Invalidos, vuelva a ingresar sesión correctamente.'); location.assign('/');</script><?php LogReport("Intentó ingresar (mediante Cookie) como: " . $username); }

} # } /.function IniciarSesionMedianteCookie();

?>