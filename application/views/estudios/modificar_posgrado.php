<table>

<h2><?= 'Modificar posgrado a '.$persona ?></h2><br/>

<form method='post' action=<?= '/cosita/index.php/estudios/modificar_posm/'.$posgrado->id ?>>

	<tr>
		<td>
				<label>Institucion:</label>
		</td>
		<td>
				<input type='text' name='institucion' value=<?= $posgrado->institucion ?>>
		</td>		
	</tr>	
	<tr>
		<td>
				<label>Pais:</label>
		</td>
		<td>
				<input type='text' name='pais' value=<?= $posgrado->pais ?>>
		</td>		
	</tr>
	<tr>
		<td>
				<label>Fecha de graduacion:</label>
		</td>
		<td>
				<input type='text' name='fecha_graduacion' value=<?= $posgrado->fecha_graduacion ?>>
		</td>		
	</tr>
	<tr>
		<td>
				<label>Area:</label>
		</td>
		<td>
				<input type='text' name='area' value=<?= $posgrado->area ?>>
		</td>		
	</tr>
	<tr>
		<td>
				<label>Nivel:</label>
		</td>
		<td>
				<input type='text' name='nivel' value=<?= $posgrado->nivel ?>>
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