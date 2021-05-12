<?php 

include 'users.php';

# Me aseguro de que haya una contraseña..
if(!empty($_GET['q'])) { ?>
<blockquote>
<?= password($_GET['q']); ?>
</blockquote>
<p>Clic <a href="password-revealer.php">acá</a> si deseas mostrar otro parametro.</p>
<?php } else { ?> 
<form method="get">
  <label for="query">Parametros para incidir en la contraseña:</label><br>
  <input type="text" placeholder="Escriba acá..." name="q"><br><br>
  
  <button type="submit">Mostrar.</button>
</form>
<?php } ?>
