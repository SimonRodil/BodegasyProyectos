<?php 

header('Content-Type: application/json'); 

# Inicio sesión.
session_start();

$asesor = $_SESSION['sert_cpanel']['id'];

require ('../../mod/config.php');
require ('../../mod/blog.php');
$con_blog = new Blogs();
$query = $con_blog->SelBlogs()->fetch_all(MYSQLI_ASSOC);

echo json_encode($query);

?>