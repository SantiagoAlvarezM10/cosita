<table>

<h2><?= 'Modificar pregrado a '.$persona ?></h2><br/>

<form method='post' action=<?= '/cosita/index.php/estudios/modificar_prem/'.$pregrado->id ?>>

	<tr>
		<td>
				<label>Institucion:</label>
		</td>
		<td>
				<input type='text' name='institucion' value=<?= $pregrado->institucion ?>>
		</td>		
	</tr>	
	<tr>
		<td>
				<label>Pais:</label>
		</td>
		<td>
				<input type='text' name='pais' value=<?= $pregrado->pais ?>>
		</td>		
	</tr>
	<tr>
		<td>
				<label>Fecha de graduacion:</label>
		</td>
		<td>
				<input type='text' name='fecha_graduacion' value=<?= $pregrado->fecha_graduacion ?>>
		</td>		
	</tr>
	<tr>
		<td>
				<label>Profesion:</label>
		</td>
		<td>
				<input type='text' name='profesion' value=<?= $pregrado->profesion ?>>
		</td>		
	</tr>
	<tr>
		<td>
				<label>Fecha de expedicion:</label>
		</td>
		<td>
				<input type='text' name='fecha_expedicion' value= <?= $pregrado->tarjeta_profesional->fecha_expedicion ?>>
		</td>		
	</tr>
	<tr>
		<td>
				<label>Numero tarjeta profesional:</label>
		</td>
		<td>
				<input type='number' name='numero_tp' value= <?= $pregrado->tarjeta_profesional->numero ?>>
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