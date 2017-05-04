<?php $nbUser = App::getInstance()->getTable('User')->nombreUser(); ?>

<table class="table">
		<thead>
			<tr>
				<td class="description">Forum de Roubl'Actu</td>
				<td class="description">Sujets</td>
				<td class="description">Messages</td>
				<td class="description">Derniers Messages</td>
			</tr>
		</thead>
		<tbody>
			<tr>
			<td><a href="index.php?p=Forum.Actu"><p style="color: rgb(199,211,29)" class="action">Roubl'Actu</p></a>
			<p style="color: #FFFFFF;">Découvrer l'actualité comme nul part ailleurs</p></td>
			</tr>

			<tr>
				<td><a href="index.php?p=Lab"><p style="color: rgb(199,211,29)" class="action">Roubl'A Lab</p></a>
				<p style="color: #FFFFFF;">Vous avez des idées ? Venez nous en parler !</p></td>
			</tr>
		</tbody>
	</table>

	<h4 style="color: #FFFFFF">Nos membres ont posté un total de message(s)</h4>
	<h4 style="color: #FFFFFF">Nous avons <?= count($nbUser) ?> membre(s) enregistré(s)</h4>