<?php $utilisateurs = App::getInstance()->getTable('User')->find($_SESSION['Id']); ?>
<?php if(isset($_SESSION['Auth'])): ?>
<?php else : header('location: index.php'); ?>
<?php endif; ?>

<?php 

$date = date('Y-m-d');
$heure = date("H:i:s");
$app = App::getInstance();

if ($_POST) {
		if (!empty($_POST['categorie_sms_id'] && $_POST['sujet_id'] && $_POST['auteur'] && $_POST['message'] && $_POST['date_creation'])) {
			$req = $app->getTable('message')->create(
				[
				"categorie_sms_id"=>htmlspecialchars($_POST['categorie_sms_id']),
				"sujet_id"=>htmlspecialchars($_POST['sujet_id']),
				"date_creation"=>htmlspecialchars($_POST['date_creation']),
				"auteur"=>htmlspecialchars($_POST['auteur']),
				"message"=>htmlspecialchars($_POST['message'])
				]);
			if ($req) {
				////message Flash
				header('location: index.php?p=Forum.Actu_Sujet&idC='.$_GET['idC'].'&idS='.$_GET['idS'])
				?>
				<div class="alert alert-success">Bien enregistré</div>
				<?php
			}
		}
	}

 ?>

<div class="col-md-4">
	
</div>

<div class="col-md-4">

<?php if(isset($_SESSION['Auth'])): ?> <!-- Si connecté affiche form commentaire, sinon affiche Redirection -->
        <div class="commentaireTexte">
			<h2>Rediger votre message</h2>
				<form method="post">
					<input type="hidden" name="categorie_sms_id" value="<?= $_GET['idC'] ?>">
					<input type="hidden" name="sujet_id" value="<?= $_GET['idS'] ?>">
					<input type="hidden" name="auteur" value="<?= $_SESSION['Auth']?>">
					<input type="hidden" name="date_creation" value="<?= $date?> <?= $heure ?>">
					<textarea class="form-control" name="message" placeholder="Ajouter votre message" ></textarea>
					<input class="myButton" type="submit" name="" style="margin-top: 20px;">
				</form>
		</div>
        <?php else : ?>
          	<p style="color: white">Je vous invite à vous connecter, si vous voulez poster un commentaire. <a href="index.php?p=Login">>> Connexion <<</a></p>
          	<p style="color: white">Si vous n'êtes pas inscrit, je vous invite à le faire ici <a href="index.php?p=Register">>> Inscription <<</a></p>
        <?php endif; ?>
</div>
	
</div>

<div class="col-md-4">


	
</div>