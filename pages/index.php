<?php $nbUser = App::getInstance()->getTable('User')->nombreUser(); ?>
<?php $nbSms = App::getInstance()->getTable('message')->all(); ?>

<table class="table">
		<thead>
			<tr>
				<td class="description">Forum de Roubl'Actu</td>
				<td class="description" style="text-align: center;">Sujets</td>
				<td class="description" style="text-align: center;">Messages</td>
				<td class="description" style="text-align: center;">Derniers Messages</td>
				<td><a class="myButton" style="text-decoration: none;" href="index.php?p=Catégorie.Add">Crée une catégorie</a></td>
			</tr>
		</thead>
		<tbody>
		<?php foreach (App::getInstance()->getTable('Categorie')->cat() as $cat) { ?>
		<?php foreach (App::getInstance()->getTable('sujet')->nbSujetCat($cat->id) as $nbSujet) :?>
			<tr>
			<td><a href="<?= $cat->Url ?>"><p style="color: rgb(199,211,29)" class="action"><?= $cat->titre ?></p></a>
			<p style="color: #FFFFFF;"><?= $cat->description ?></p></td>
			<td><p style="color: #FFFFFF; text-align: center;" class="action"><?=$nbSujet->nbSujetCat?></p></td>
			</tr>
		<?php endforeach;} ?>
		</tbody>
	</table>

	<h4 style="color: #FFFFFF">Nos membres ont posté un total de <?= count($nbSms) ?> message(s)</h4>.
	<h4 style="color: #FFFFFF">Nous avons <?= count($nbUser) ?> membre(s) enregistré(s)</h4>.