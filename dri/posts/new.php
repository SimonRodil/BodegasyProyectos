<?php session_start();

# Chequeo que no haya iniciado sesión.
if(!isset($_SESSION['sert_cpanel']['id']) || empty($_SESSION['sert_cpanel']['id'])) { header ('Location: sign-in.php'); } else {
  
  include "../../mod/config.php";
  include "../../mod/posts.php";
  
  # Establezco conexión con la base de datos.
  $con_posts = new Posts();
    
  # Chequeamos que el titulo no esté vacio.
  if(!empty($_POST['title'])) {
    
    # Guardamos el titulo en una varaible, igual al shortcut.
    $title = $_POST['title'];
    $shortcut = shortcut($_POST['title']);
    $name_image = md5(date("d-m-y_H-i-s")) . "." . pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
    $content = $_POST['content'];
    
    # Busco que no exista un shortcut así en la base de datos.
    $check_query = $con_posts->SelPost($shortcut);
    
    # Si hay alguna publicación con ese titulo nos dirá que no.
    if($check_query->num_rows < 1) {
      
      # Subo los datos.
      $upload_post = $con_posts->NewPost($title, $name_image, $shortcut, $content);
      
      # Chequeo que se haya subido correctamente.
      if($upload_post == true) { 
      
        ## Subo la imagen.
        # Planifico la locación donde estará.
        $location = "../../../images/posts/";
        
        # Chequeo que si exista la locación a donde vá.
        if(!file_exists($location)) { mkdir($location); }
        
        # Preparo la subida.
        $target = $location . $name_image;
        
        # Subo el archivo.
        $upload_image = move_uploaded_file($_FILES['image']['tmp_name'], $target);
        
        # Chequeo que la imagen se haya subido.
        if($upload_image == TRUE) {
          
          # Muestro el mensaje de exito.
          echo "success";
          # Registro la acción realizada.
          LogReport("El usuario " . $_SESSION['sert_cpanel']['username'] . " Ha creado la noticia: " . $title);
          
        } else { echo "Error: " . $upload_image; }
      
      } else { echo "Error: " . $upload_post; }
      
    } else { echo "error-exist"; }
    
  } else { echo "error-title"; }
  
}

?>