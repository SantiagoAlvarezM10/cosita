<h2>Persona</h2>

<table>

	<tr>
		<th>Tipo de documento</th>
		<th>Numero de documento</th>
		<th>Nombre</th>
		<th>Apellido</th>
		<th>Sexo</th>
		<th>Fecha de nacimiento</th>
		<th>Direccion</th>		
		<th>Ciudad</th>
		<th>Email</th>
		<th>Telefono</th>
		<th>Nacionalidad</th>
						
	</tr>

	<tr>
		<td> <?= $personas->tipo_documento ?></td>
		<td> <?= $personas->numero_documento ?></td>
		<td> <?= $personas->nombre ?></td>
		<td> <?= $personas->apellido ?></td>
		<td> <?= $personas->sexo ?></td>
		<td> <?= $personas->fecha_nacimiento ?></td>
		<td> <?= $personas->direccion ?></td>
		<td> <?= $personas->ciudad ?></td>
		<td> <?= $personas->email ?></td>
		<td> <?= $personas->telefono ?></td>
		<td> <?= $personas->nacionalidad ?></td>
																							
	</tr>

</table>

<h2>Lista de pregrados</h2>

<table>

	<tr>
		<th>Institucion</th>
		<th>Pais</th>
		<th>Fecha de graduacion</th>
		<th>Profesion</th>

	</tr>

	<?php 
		if (!empty($estudios)) {
			foreach ($estudios as $perry) {
				if (property_exists($perry, 'profesion')) { ?>
			
					<tr>
						<td> <?= $perry->institucion ?></td>
						<td> <?= $perry->pais ?></td>
						<td> <?= $perry->fecha_graduacion ?></td>
						<td> <?= $perry->profesion ?></td>
						<td> <a href= <?= "/cosita/index.php/estudios/modificar_prev/".$personas->nombre."/".$perry->id ?> >Modificar</a></td>
						<td> <a href= <?= "/cosita/index.php/estudios/eliminar_pre/".$perry->id ?> onclick="return confirm('Seguro? a peñalosa no le gusta esto');" >Eliminar</a></td>																																			
					</tr>	
		
	<?php 		}	
			} 
		} ?>

</table>

<h2>Lista de posgrados</h2>

<table>

	<tr>
		<th>Institucion</th>
		<th>Pais</th>
		<th>Fecha de graduacion</th>
		<th>Area</th>
		<th>Nivel</th>		

	</tr>

	<?php 
		if (!empty($estudios)) {
			foreach ($estudios as $perry) {
				if (property_exists($perry, 'area')) { ?>
			
					<tr>
						<td> <?= $perry->institucion ?></td>
						<td> <?= $perry->pais ?></td>
						<td> <?= $perry->fecha_graduacion ?></td>
						<td> <?= $perry->area ?></td>
						<td> <?= $perry->nivel ?></td>	
						<td> <a href= <?= "/cosita/index.php/estudios/modificar_posv/".$personas->nombre."/".$perry->id  ?> >Modificar</a></td>
						<td> <a href= <?= "/cosita/index.php/estudios/eliminar_pos/".$perry->id ?> onclick="return confirm('Seguro? a peñalosa no le gusta esto');" >Eliminar</a></td>												
																													
					</tr>	
		
	<?php 		}	
			} 
		} ?>

</table>