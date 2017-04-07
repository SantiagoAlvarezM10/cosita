<table>

	<tr>
		<th>Tipo de documento</th>
		<th>Numero de documento</th>
		<th>Nombre</th>
		<th>Apellido</th>
		<th>Email</th>
		<th>Telefono</th>

	</tr>

	<?php 
		if (!empty($personas)) {
			foreach ($personas as $perry) { ?>
			
			<tr>
				<td> <?= $perry->tipo_documento ?></td>
				<td> <?= $perry->numero_documento ?></td>
				<td> <?= $perry->nombre ?></td>
				<td> <?= $perry->apellido ?></td>
				<td> <?= $perry->email ?></td>
				<td> <?= $perry->telefono ?></td>	
				<td>
					<form method='post' action=<?= 'detalle_per/'.$perry->numero_documento ?>>
						<input type='submit' value='Detalle'>
					</form>
				</td>
				<td>
					<form method='post' action=<?= 'registrar_prev/'.$perry->nombre.'/'.$perry->numero_documento ?>>
						<input type='submit' value='Añadir pregrado'>
					</form>
				</td>
				<td>
					<form method='post' action=<?= 'registrar_posv/'.$perry->nombre.'/'.$perry->numero_documento ?>>
						<input type='submit' value='Añadir posgrado'>
					</form>
				</td>
				<td> <a href= <?= "/cosita/index.php/estudios/modificar_perv/".$perry->numero_documento ?> >Modificar</a></td>
				<td> <a href= <?= "/cosita/index.php/estudios/eliminar_per/".$perry->numero_documento ?> onclick="return confirm('Estás seguro que deseas eliminar la pobre personita :v?');" >Eliminar</a></td>																															
			</tr>
		
	<?php
			} 
		} ?>

</table>