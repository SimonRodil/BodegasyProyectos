<?php session_start();

# Chequeo que no haya iniciado sesión.
if(!isset($_SESSION['sert_cpanel']['id']) || empty($_SESSION['sert_cpanel']['id'])) { header ('Location: sign-in.php'); } else {
  
  include "../../mod/config.php";
  include "../../mod/posts.php";
  
  # Establezco conexión con la base de datos.
  $con_posts = new Posts();
  
  # Chequeo que esté el ID del post.
  if(isset($_GET['id']) && !empty($_GET['id'])){
    
    # Chequeamos que el titulo no esté vacio.
    if(!empty($_POST['title'])) {

      # Guardamos el titulo en una varaible, igual al shortcut.
      $id = $_GET['id'];
      $title = $_POST['title'];
      $shortcut = shortcut($_POST['title']);
      $content = $_POST['content'];
      $change_image = FALSE;

      # Busco que no exista un shortcut así en la base de datos.
      $check_query = $con_posts->SelPost($shortcut);
      $post = $check_query->fetch_array();

      # Si hay alguna publicación con ese titulo nos dirá que no.
      if($check_query->num_rows < 1 || $id == $post['id']) {

        # Chequeo si la imagen se va a cambiar o no.
        if(!empty($_FILES['image']['tmp_name'])) {

          # Establezco el nombre de la imagen
          $name_image = crypt(date("d-m-y_H-i-s"), 'divinams') . "." . pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
          $change_image = TRUE;

        } else { $name_image = NULL; }

        # Subo los datos.
        $upload_post = $con_posts->UpdPost($id, $title, $name_image, $shortcut, $content);

        # Chequeo que se haya subido correctamente.
        if($upload_post == TRUE) { 

          if($change_image == TRUE) {

            ## Subo la imagen.
            # Planifico la locación donde estará.
            $location = "../../../img/posts/";
            # Preparo la subida.
            $target = $location . $name_image;
            # Subo el archivo.
            $upload_image = move_uploaded_file($_FILES['image']['tmp_name'], $target);

            # Chequeo que la imagen se haya subido.
            if($upload_image == TRUE) {

              # Muestro el mensaje de exito.
              echo "success";
              # Registro la acción realizada.
              LogReport("El usuario " . $_SESSION['sert_cpanel']['username'] . " Ha editado la noticia: " . $title);

            } else { echo "Error: " . $upload_image; }

          } else { echo "success"; 

          LogReport("El usuario " . $_SESSION['sert_cpanel']['username'] . " Ha editado la noticia: " . $title); }

        } else { echo "Error: " . $upload_post; }

      } else { echo "error-exist"; }

    } else { echo "error-title"; }
    
  }
  
}

?>