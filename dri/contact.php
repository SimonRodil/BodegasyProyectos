<?php 

header('Content-Type: application/json'); 

if(!isset($_POST) || empty($_POST)) { echo json_encode(['message' => 'La cabecera de data no está en método POST, por lo tanto no estamos recibiendo ningún dato.']);
http_response_code(400);
return; }

// Varios destinatarios
$para  = 'comercial@bodegasyproyectos.com';
# $para  = 'rodileduar.simon@gmail.com';

// asunto
$asunto = 'Mensaje de Contacto (PÁGINA WEB)';

// mensaje
$mensaje = '
<b>NOMBRE Y APELLIDO</b>: '. $_POST['name'] . ' <br>
<b>CORREO ELECTRÓNICO</b>: '. $_POST['email'] . ' <br>
<b>TELÉFONO</b>: '. $_POST['telephone'] . ' <br>
<br>
<br>
<b>ASUNTO</b>: ' . $_POST['subject'] . '<br>
<b>MENSAJE</b>: ' . $_POST['message'] . '<br><br>
<i>Enviado directamente desde la página web, en los formularios de contactos.</i><br>
<i>Este mensaje también se encuentra en el panel de la página web.</i><br>
<i>' . date('d/m/Y h:i:s') . '</i>
';

// Para enviar un correo HTML, debe establecerse la cabecera Content-type
$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
$cabeceras .= 'Content-type: text/html; charset=utf-8' . "\r\n";

// Cabeceras adicionales
$cabeceras .= 'To: Andres Rios <' . $para . '>' . "\r\n";
$cabeceras .= 'From: Bodegas & Locales <system@bodegasylocales.com>' . "\r\n";

// Enviarlo
$query = mail($para, $asunto, $mensaje, $cabeceras);

if($query == TRUE) { http_response_code(200); echo json_encode(['message' => 'Mensaje Enviado correctamente.']); } else {
  http_response_code(400); echo json_encode(['message' => 'El mensaje no se pud enviar $query = false.']);
}

?>