<?php 


header('Content-Type: application/json'); 

# Inicio sesión.
session_start();

require ('../../mod/config.php');
require ('../../mod/blog.php');
$con_blog = new Blogs();
$query = $con_blog->DelBlog($_GET['id']);

echo json_encode($query);

?>