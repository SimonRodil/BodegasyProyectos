<?php require "../mod/config.php";

setcookie("sert_session", "", time() - 1000);

session_start();

LogReport("Cerró Sesión: " . $_SESSION['sert_cpanel']['username']);

session_destroy();

echo "success";

?>