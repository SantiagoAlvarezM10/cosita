<table>

	<tr>
		<th>Cedula</th>
		<th>Nombre</th>
		<th>Fecha de nacimiento</th>
		<th>Lugar de nacimiento</th>
		<th>Titulo</th>

	</tr>

	<?php 
		if (!empty($profesores)) {
			foreach ($profesores as $perry) { ?>
			
			<tr>
				<td> <?= $perry->cedula ?></td>
				<td> <?= $perry->nombre ?></td>
				<td> <?= $perry->fecha_nacimiento ?></td>
				<td> <?= $perry->lugar_nacimiento ?></td>
				<td> <?= $perry->titulo ?></td>
				<td> <a href= <?= "/cosita/index.php/profesores/modificar_prov/".$perry->cedula ?> >Actualizar</a></td>																															
			</tr>
		
	<?php
			} 
		} ?>

</table>