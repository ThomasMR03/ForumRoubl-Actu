<?php
	$app = App::getInstance();

	if ($_POST) {
		if (!empty($_POST['titre'] && $_POST['description'] && $_POST['auteur'] && $_POST['categorie_id'])) {
			$req = $app->getTable('Sujet')->create(
				[
				"titre"=>htmlspecialchars($_POST['titre']), 
				"description"=>htmlspecialchars($_POST['description']),
				"auteur"=>htmlspecialchars($_POST['auteur']),
				"categorie_id"=>htmlspecialchars($_POST['categorie_id'])
				]);
			if ($req) {
				////message Flash
				header('location: index.php');
				?>
				<div class="alert alert-success">Bien enregistré</div>
				<?php
			}
		}
	}
?>

<div class="col-md-2">
	
</div>
<div class="col-md-8"  id="zoneAdmin">
<h2  class="description" style="text-align: center; border-bottom:6px solid  color: red; padding-bottom: 20px; margin-bottom: 20px;">Crée un sujet</h2>
<form method="post">
	<input type="hidden" name="id" value="">
	<input type="hidden" name="auteur" value="<?= $_SESSION['Auth'] ?>">
	<input type="hidden" name="categorie_id" value="<?= $_GET['idC'] ?>">
	<input class="form-control" type="text" name="titre" value="" placeholder="Titre du sujet" style="margin-bottom: 20px;">
	<input class="form-control" type="text" name="description" value="" placeholder="Description" style="margin-bottom: 20px;">
	<input class="myButton" type="submit" name="" style="margin-bottom: 80px;">
</form>
</div>
<div class="col-md-2">
	
</div>