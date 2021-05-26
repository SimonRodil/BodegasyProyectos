<?php 

$tmp_files_folder = "../../assets/images/profile_pictures/tmp/";
$img_name = $_FILES['image']['name'];
$dir = $tmp_files_folder . $img_name;
$upload = move_uploaded_file($_FILES['image']['tmp_name'], $dir);
if($upload == true):
  echo $img_name;
  http_response_code(200);
else:
  http_response_code(500);
endif;

?>