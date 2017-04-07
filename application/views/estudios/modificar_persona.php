<table>

<h2><?= 'Modificar datos de '.$persona->nombre ?></h2><br/>

<form method='post' action='/cosita/index.php/estudios/modificar_perm'>

	<tr>
		<td>
				<label>Tipo de documento:</label>
		</td>
		<td>
				<input type='text' name='tdoc' value=<?= $persona->tipo_documento ?>>
		</td>		
	</tr>	
	<tr>
		<td>
				<label>Numero documento:</label>
		</td>
		<td>
				<input type='number' name='ndoc' value=<?= $persona->numero_documento ?>>
		</td>		
	</tr>
	<tr>
		<td>
				<label>Nombre:</label>
		</td>
		<td>
				<input type='text' name='nombre' value=<?= $persona->nombre ?>>
		</td>		
	</tr>
	<tr>
		<td>
				<label>Apellido:</label>
		</td>
		<td>
				<input type='text' name='apellido' value=<?= $persona->apellido ?>>
		</td>		
	</tr>
	<tr>
		<td>
				<label>Sexo:</label>
		</td>
		<td>
				<input type='text' name='sexo' value=<?= $persona->sexo ?>>
		</td>		
	</tr>
	<tr>
		<td>
				<label>Fecha de nacimiento:</label>
		</td>
		<td>
				<input type='date' name='fecha' value=<?= $persona->fecha_nacimiento ?>>
		</td>		
	</tr>
	<tr>
		<td>
				<label>Direccion:</label>
		</td>
		<td>
				<input type='text' name='direccion' value=<?= $persona->direccion ?>>
		</td>		
	</tr>
	<tr>
		<td>
				<label>Ciudad:</label>
		</td>
		<td>
				<input type='text' name='ciudad' value=<?= $persona->ciudad ?>>
		</td>		
	</tr>
	<tr>
		<td>
				<label>Email:</label>
		</td>
		<td>
				<input type='email' name='email' value=<?= $persona->email ?>>
		</td>		
	</tr>
	<tr>
		<td>
				<label>Telefono:</label>
		</td>
		<td>
				<input type='number' name='telefono' value=<?= $persona->telefono ?>>
		</td>		
	</tr>
	<tr>
		<td>
				<label>Nacionalidad:</label>
		</td>
		<td>
				<input type='text' name='nacionalidad' value=<?= $persona->nacionalidad ?>>
		</td>		
	</tr>						
	<tr><td><br/></td></tr>	
	<tr>
		<td>
			<input type ='submit' value= 'Modificar'>	
		</td>	
	</tr>

</form>

</table>