<table>

	<tr>
		<th><?= $titulo ?></th>

	</tr>

	<?php foreach ($errores as $er) { ?>
		
		<tr>
			<td> <?= $er ?></td>
		</tr>

	<?php } ?>

</table>