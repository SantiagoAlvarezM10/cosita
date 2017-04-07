<table>

	<tr>
		<th>Titulo</th>

	</tr>

	<?php foreach ($titles as $ti) { ?>
		
		<tr>
			<td> <?= $ti->title ?></td>
			<td> <?= "<a href=/cosita/index.php/news/ver/".$ti->title.">Ver noticia</a>" ?></td>
		</tr>

	<?php } ?>

</table>