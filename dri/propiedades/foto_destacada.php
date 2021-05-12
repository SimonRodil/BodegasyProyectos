<?php 

require ('../../mod/config.php');
require ('../../mod/propiedades.php');
header('Content-Type: application/json'); 

$con_propiedades = new Propiedades();
$propiedad = $con_propiedades->SelPropiedad($_POST['id'])->fetch_array();

$tmp_files_folder = "../../images/propiedades/tmp/";

// Elimino todo lo que está en la carpeta temporal.
$files = glob($tmp_files_folder. '*'); // get all file names
foreach($files as $file){ // iterate files
  if(is_file($file))
    unlink($file); // delete file
}

// requires php5
define('UPLOAD_DIR', '../../images/propiedades/');
$img = $_POST['image'];
$img = str_replace('data:image/jpeg;base64,', '', $img);
$img = str_replace(' ', '+', $img);
$data = base64_decode($img);
$img_name = 'fd_' . uniqid() . '.jpg';
$file = UPLOAD_DIR . $img_name;
$success = file_put_contents($file, $data);

// Elimino la antigua foto de perfil
if($propiedad['imagen_destacada'] != NULL):
  unlink(UPLOAD_DIR . $propiedad['imagen_destacada']);
endif;

if($success == true):
  $query = $con_propiedades->AsignarFotoDestacada($_POST['id'], $img_name);
	if($query == true) {
		http_response_code(200);
		echo json_encode(['imagen_destacada' => $img_name]);
	} else {
		unlink($file);
		http_response_code(500);
	}
else:
  http_response_code(500);
endif;

?>