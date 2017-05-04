<?php $nbUser = App::getInstance()->getTable('User')->nombreUser(); ?>

<table class="table">
		<thead>
			<tr>
				<td class="description">Forum de Roubl'Actu</td>
				<td class="description">Réponses</td>
				<td class="description">Auteur</td>
				<td class="description">Derniers Messages</td>
				<td><a class="myButton" style="text-decoration: none;" href="index.php?p=Sujet.Add">Crée un sujet</a></td>
			</tr>
		</thead>
		<tbody>
			<?php foreach (App::getInstance()->getTable('Sujet')->sujet() as $sujet) : ?>
			<tr>
			<td><a href=""><p style="color: rgb(199,211,29)" class="action"><?= $sujet->titre ?></p></a>
			<p style="color: #FFFFFF;"><?= $sujet->description ?></p></td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>

	<h4 style="color: #FFFFFF">Nos membres ont posté un total de message(s)</h4>
	<h4 style="color: #FFFFFF">Nous avons <?= count($nbUser) ?> membre(s) enregistré(s)</h4>