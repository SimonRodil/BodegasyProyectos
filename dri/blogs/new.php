<?php 

header('Content-Type: application/json'); 

if(!isset($_POST)): echo json_encode(['message'=>'No existe la propiedad...']); http_response_code(400); return;
endif;

# Declaro las variables.
foreach($_POST as $nombre_campo => $valor){
    if($valor == '-' || empty($valor)) {
      $arreglo = "\$" . $nombre_campo . "=NULL;";
    } else {
      $arreglo = "\$" . $nombre_campo . "='" . $valor . "';";
    }
    eval($arreglo);
}

require ('../../mod/config.php');
require ('../../mod/blog.php');
$con_blog = new Blogs();

if(isset($_FILES['image']['name'])):
  try {
    $tmp_files_folder = "../../assets/images/blog/";
    $img_name = uniqid() . '.' . pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
    $dir = $tmp_files_folder . $img_name;
    $upload = move_uploaded_file($_FILES['image']['tmp_name'], $dir);
    if($upload == true):
      $image = $img_name;
      http_response_code(200);
    else:
      echo 'No se puedo subir la imagen, intente neuvamente.';
      http_response_code(500);
    endif;
  } catch (Exception $e) { return true; }
else: 
  $image = null;
endif;

$shortcut = null;
$url = null;

$query = $con_blog->NewBlog($title, $shortcut, $content, $image, $url, $to_publish);

if($query != true) { echo json_encode(['message'=>'No se ha podido ejecutar el comando SQL...']); http_response_code(400); return; }
echo json_encode(['message'=>'Consulta exitosa!, ']); http_response_code(200); return;

?>