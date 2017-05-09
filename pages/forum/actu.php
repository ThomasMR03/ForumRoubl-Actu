<?php $nbUser = App::getInstance()->getTable('User')->nombreUser(); ?>
<?php $nbSms = App::getInstance()->getTable('message')->all(); ?>
<?php if(isset($_SESSION['Auth'])){
	$utilisateurs = App::getInstance()->getTable('User')->find($_SESSION['Id']);
} ?>

<table class="table">
		<thead>
			<tr>
				<td><a class="description" href="index.php">Forum de Roubl'Actu</a></td>
				<td class="description" style="text-align: center;">Messages</td>
				<td class="description" style="text-align: center;">Auteur</td>
				<td class="description" style="text-align: center;">Derniers Messages</td>
				<td><a class="myButton" style="text-decoration: none;" href="index.php?p=Sujet.Add&idC=<?=$_GET['idC']?>">
				Crée un sujet</a></td>
			</tr>
		</thead>
		<tbody>
			<?php foreach (App::getInstance()->getTable('Sujet')->lastBySujet($_GET['idC']) as $sujet) {
			foreach (App::getInstance()->getTable('message')->nbMessageSujet($sujet->id) as $nb) { ?>
			<tr>
			<td><a href="<?= $sujet->Url ?>"><p style="color: rgb(199,211,29)" class="action"><?= $sujet->titre ?></p></a>
			<p style="color: #FFFFFF;"><?= $sujet->description ?></p></td>
			<td><p style="color: #FFFFFF; text-align: center;" class="action"><?= $nb->nbSujet ?></td>
			<td><p style="color: #FFFFFF; text-align: center;" class="action"><?= $sujet->auteur ?></td>
			<?php foreach (App::getInstance()->getTable('message')->lastByMessageSujet($sujet->id) as $sms) { ?>
			<?php if(isset($sms)) : ?>
			<td><p style="color: #FFFFFF; text-align: center;" class="action"><?= $sms->date_creation_fr ?> </br> <?= $sms->auteur ?></p></td>
			<?php if(isset($_SESSION['Auth'])): ?>
          	<?php if($utilisateurs->membre_rang == 'Admin'): ?>
			<td><form action="index.php?p=Message.Del" method="post" class="formComDelete">
				<button class="buttonComDelete" type="submit" value="<?=$sujet->id?>" name="id">X</button>
			</form></td>
			<?php else : ?><?php endif; ?>
       		<?php else : ?><?php endif; ?>
			<?php endif; ?>
		<?php }}} ?>
		</tbody>
	</table>

	<h4 style="color: #FFFFFF">Nos membres ont posté un total de <?= count($nbSms) ?> message(s)</h4>.
	<h4 style="color: #FFFFFF">Nous avons <?= count($nbUser) ?> membre(s) enregistré(s)</h4>.