<table>

<h2><?= 'Añadir pregrado a '.$persona ?></h2><br/>

<form method='post' action=<?= '/cosita/index.php/estudios/registrar_prem/'.$ndoc ?>>

	<tr>
		<td>
				<label>Institucion:</label>
		</td>
		<td>
				<input type='text' name='institucion'>
		</td>		
	</tr>	
	<tr>
		<td>
				<label>Pais:</label>
		</td>
		<td>
				<input type='text' name='pais'>
		</td>		
	</tr>
	<tr>
		<td>
				<label>Fecha de graduacion:</label>
		</td>
		<td>
				<input type='text' name='fecha_graduacion'>
		</td>		
	</tr>
	<tr>
		<td>
				<label>Profesion:</label>
		</td>
		<td>
				<input type='text' name='profesion'>
		</td>		
	</tr>
	<tr>
		<td>
				<label>Fecha de expedicion:</label>
		</td>
		<td>
				<input type='text' name='fecha_expedicion'>
		</td>		
	</tr>
	<tr>
		<td>
				<label>Numero tarjeta profesional:</label>
		</td>
		<td>
				<input type='number' name='numero_tp'>
		</td>		
	</tr>	
	<tr><td><br/></td></tr>	
	<tr>
		<td>
			<input type ='submit' value= 'Añadir'>	
		</td>	
	</tr>

</form>

</table>