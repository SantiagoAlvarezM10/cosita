<table>

<h2><?= 'Actualizar datos de '.$profesor->nombre ?></h2><br/>

<form method='post' action='/cosita/index.php/profesores/modificar_prom'>

	<tr>
		<td>
				<label>Cedula:</label>
		</td>
		<td>
				<input type='number' name='cedula' value=<?= $profesor->cedula ?>>
		</td>		
	</tr>	
	<tr>
		<td>
				<label>Nombre:</label>
		</td>
		<td>
				<input type='text' name='nombre' value=<?= $profesor->nombre ?>>
		</td>		
	</tr>
	<tr>
		<td>
				<label>Fecha de nacimiento:</label>
		</td>
		<td>
				<input type='date' name='fecha_nac' value=<?= $profesor->fecha_nacimiento ?>>
		</td>		
	</tr>
	<tr>
		<td>
				<label>Lugar de nacimiento:</label>
		</td>
		<td>
				<input type='text' name='lugar_nac' value=<?= $profesor->lugar_nacimiento ?>>
		</td>		
	</tr>
	<tr>
		<td>
				<label>Titulo:</label>
		</td>
		<td>
				<input type='text' name='titulo' value=<?= $profesor->titulo ?>>
		</td>		
	</tr>
					
	<tr><td><br/></td></tr>	
	<tr>
		<td>
			<input type ='submit' value= 'Actualizar'>	
		</td>	
	</tr>

</form>

</table>