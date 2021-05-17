<?php 

header('Content-Type: application/json'); 

require ('../../../mod/config.php');
require ('../../../mod/propiedades.php');
$con_propiedades = new Propiedades();
$con_galeria = new Galeria();

if(!isset($_POST['propiedad']) || empty($_POST['propiedad'])) { http_response_code(500); echo 'ID de la propiedad no definido'; return; }

$propiedad = $con_propiedades->SelPropiedad($_POST['propiedad'])->fetch_array();

$folder = "../../../assets/images/propiedades/fotos/";
$info_file = pathinfo($_FILES['image']['name']);
$img_name = uniqid() . '.' . $info_file['extension'];
$dir = $folder . $img_name;
$upload = move_uploaded_file($_FILES['image']['tmp_name'], $dir);

if($upload == true):
  $query = $con_galeria->NuevaImagen($propiedad['id'], $img_name);
  http_response_code(200);
  echo json_encode(['base64' => $img_name, 'id' => $query['id']]);
else:
  http_response_code(500);
  unlink($dir);
endif;

?>