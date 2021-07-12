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
require ('../../mod/mensajeria.php');
require ('../../mod/propiedades.php');
require ('../../mod/users.php');
$con_mensajeria = new Mensajes();
$con_propiedades = new Propiedades();
$con_users = new Users();
$query_propiedad = $con_propiedades->SelPropiedad($propiedad);

if(!$query_propiedad->num_rows): echo json_encode(['message'=>'No existe la propiedad...']); http_response_code(400); return;
endif;

$propiedad = $query_propiedad->fetch_array();
$query_asesor = $con_users->SelUser($propiedad['asesor']);
if(!$query_asesor->num_rows) { $mail_asesor = 'comercial@bodegasyproyectos.com'; }
$asesor = $query_asesor->fetch_array();

if($asesor['email'] == null || $asesor['email'] == '' || empty($asesor['email'])){
	$mail_asesor = 'comercial@bodegasyproyectos.com';
} else {
	$mail_asesor = $asesor['email'];
}

try {
  
  // Varios destinatarios
  $para  = $mail_asesor;
  # $para  = 'rodileduar.simon@gmail.com';

  // asunto
  $asunto = 'Nuevo Interesado en una Propiedad (PÁGINA WEB)';

  // mensaje
  $mensaje = '
  <b>NOMBRE Y APELLIDO</b>: '. $_POST['nombre'] . ' <br>
  <b>CORREO ELECTRÓNICO</b>: '. $_POST['email'] . ' <br>
  <b>TELÉFONO</b>: '. $_POST['telefono'] . ' <br>
  <br>
  <br>
  <b>MENSAJE</b>: ' . $_POST['message'] . '<br><br>
  <p>Alguien está interesado en una propiedad, para saber que propiedad es <a href="' . $_SERVER['SERVER_NAME'] . '/detalles-propiedad?propiedad=' . $propiedad['id'] . '">clic aquí</a></p>
  <i>Enviado directamente desde la página web, en los formularios de contactos.</i><br>
  <i>Este mensaje también se encuentra en el panel de la página web.</i><br>
  <i>' . date('d/m/Y h:i:s') . '</i>
  ';

  // Para enviar un correo HTML, debe establecerse la cabecera Content-type
  $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
  $cabeceras .= 'Content-type: text/html; charset=utf-8' . "\r\n";

  // Cabeceras adicionales
  $cabeceras .= 'To: Andres Rios <' . $para . '>' . "\r\n";
  $cabeceras .= 'From: Bodegas & Proyectos <system@bodegasyproyectos.com>' . "\r\n";

  // Enviarlo
  $query = mail($para, $asunto, $mensaje, $cabeceras);

} catch (Exception $e) {}

$query = $con_mensajeria->NewMensaje($propiedad['asesor'], $nombre, $telefono, $email, $mensaje, $propiedad['id']);

if($query != true) { echo json_encode(['message'=>'No se ha podido ejecutar el comando SQL...']); http_response_code(400); return; }
echo json_encode(['message'=>'Consulta exitosa!, ']); http_response_code(200); return;

?>