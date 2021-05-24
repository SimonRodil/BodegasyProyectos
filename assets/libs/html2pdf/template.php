<page backcolor="#FEFEFE" backtop="0" backbottom="30mm" footer="date;heure;page" style="font-size: 12pt">
    <div style="max-width: 100%;">
		<bookmark title="Lettre" level="0" ></bookmark>
		<table cellspacing="0" style="width: 100%; text-align: center; font-size: 14px">
			<tr>
				<td style="width: 40%; color: #444444; text-align: left">
					<img style="width: 300px;" src="./assets/images/logo.png" alt="Logo">
				</td>
				<td style="width: 60%; text-align: right; font-weight: bold; font-size: 12px">
				  <h4 style="color: #1d1a3e; padding: 0"><?= $system['title'] ?></h4>
				  Contáctanos<br>
				  (+57) 301 532 83 00<br>
				  comercial@bodegasyproyectos.com
				</td>
			</tr>
		</table>
		<hr style="color: #eaeaea; width: 100%">
		<div style="width: 100%; display: inline-block">
		  <table cellspacing="0" style="width: 100%">
			<tr>
			  <td style="width: 50%; text-align: left">
				<ul style="list-style: none; margin: 0; padding: 0">
				  <li><h3>Nombre de la Propiedad:<br>- <?= $propiedad['nombre'] ?></h3></li>
				  <li><h3>Tipo de Oferta:<br>- <?= $propiedad['tipo_oferta_nombre'] ?></h3></li>
				  <li><h3>Tipo de Inmueble:<br>- <?= $propiedad['tipo_propiedad'] ?></h3></li>
				</ul>
			  </td>
			  <?php # if(!empty($propiedad['imagen_destacada'])):?>
			  <?php if(!empty($propiedad['imagen_destacada'])):?>
			  <td style="width: 50%; text-align: right; padding: 20px">
				<img src="./assets/images/propiedades/<?= $propiedad['imagen_destacada'] ?>" style="width: 250px;">
			  </td>
			  <?php endif; ?>
			</tr>
		  </table>
		  <table style="width: 100%">
			<tr>
			  <td style="background-color: #01627f; border-radius: 5px; color: white; padding: 0 15px 0 15px ;"><h1><b><u>Precio:</u> $<?= $propiedad['precio'] ?></b></h1></td>
			</tr>
		  </table>
		</div>

		<br>
		<br>
		<table cellspacing="5" style="width: 100%; text-align: left; font-size: 10pt">
			<tr>
				<th style="width: 33.33%; padding: 10px; border-radius: 5px; background: #eaeaea">Ciudad: <?= $propiedad['ciudad_nombre'] ?></th>
				<th style="width: 33.33%; padding: 10px; border-radius: 5px; background: #eaeaea">Barrio: <?= $propiedad['barrio_nombre'] ?></th>
				<th style="width: 33.33%; padding: 10px; border-radius: 5px; background: #eaeaea">Área (m2): <?= $propiedad['area'] ?></th>
			</tr>
		</table>
		<table cellspacing="5" style="width: 100%; text-align: left; font-size: 10pt">
			<tr>
				<th style="width: 33.33%; padding: 10px; border-radius: 5px; background: #eaeaea">Tamaño de Lote: <?= $propiedad['tamano_lote'] ?></th>
				<th style="width: 33.33%; padding: 10px; border-radius: 5px; background: #eaeaea">Año: <?= $propiedad['ano'] ?></th>
				<th style="width: 33.33%; padding: 10px; border-radius: 5px; background: #eaeaea">Baños: <?= $propiedad['banos'] ?></th>
			</tr>
		</table>
		  <table style="width: 100%" cellspacing="5">
			<tr>
			  <td style="background-color: #f8f8f8; border-radius: 5px; padding: 10px; width: 100%"><?= $propiedad['descripcion'] ?></td>
			</tr>
		  </table>
		<hr style="color: #eaeaea; width: 100%">
		<?php if($query_imagenes->num_rows): ?>
		<nobreak>
			<br>
			<table cellspacing="0" style="width: 100%; text-align: center;">
			  <tr>
				<?php $i=0; foreach($query_imagenes as $imagen): $i++; ?>
				<td style="width: 33%; padding: 5px"><img src="./assets/images/propiedades/fotos/<?= $imagen['imagen'] ?>" style="width: 100%"></td>
				<?php if($i == 3): break; endif; endforeach; ?>
			  </tr>
			</table>
		</nobreak>
		<?php endif; ?>
    </div>
</page>