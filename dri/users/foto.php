<?php 

require ('../../mod/config.php');
require ('../../mod/users.php');

$con_users = new Users();
$user = $con_users->SelUser($_POST['id'])->fetch_array();

$tmp_files_folder = "../../assets/images/profile_pictures/tmp/";

// Elimino todo lo que está en la carpeta temporal.
$files = glob($tmp_files_folder. '*'); // get all file names
foreach($files as $file){ // iterate files
  if(is_file($file))
    unlink($file); // delete file
}

// requires php5
define('UPLOAD_DIR', '../../assets/images/profile_pictures/');
$img = $_POST['image'];
$img = str_replace('data:image/png;base64,', '', $img);
$img = str_replace(' ', '+', $img);
$data = base64_decode($img);
$img_name = uniqid() . '.png';
$file = UPLOAD_DIR . $img_name;
$success = file_put_contents($file, $data);

// Elimino la antigua foto de perfil
if($user['profile_pic'] != 'default.jpg'):
  unlink(UPLOAD_DIR . $user['profile_pic']);
endif;

if($success == true):
  $query = $con_users->CambiarFotoPerfil($_POST['id'], $img_name);
  http_response_code(200);
else:
  http_response_code(500);
endif;

?>