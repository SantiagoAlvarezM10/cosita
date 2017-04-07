<table>

<h2><?= 'Añadir posgrado a '.$persona ?></h2><br/>

<form method='post' action=<?= '/cosita/index.php/estudios/registrar_posm/'.$ndoc ?>>

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
				<label>Area:</label>
		</td>
		<td>
				<input type='text' name='area'>
		</td>		
	</tr>
	<tr>
		<td>
				<label>Nivel:</label>
		</td>
		<td>
				<input type='text' name='nivel'>
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