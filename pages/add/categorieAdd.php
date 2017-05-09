<?php $utilisateurs = App::getInstance()->getTable('User')->find($_SESSION['Id']); ?>
<?php if(isset($_SESSION['Auth']) & $utilisateurs->membre_rang == 'Admin'): ?>
<?php else : header('location: index.php'); ?>
<?php endif; ?>

<?php
	$app = App::getInstance();

	if ($_POST) {
		if (!empty($_POST['titre'] && $_POST['description'])) {
			$req = $app->getTable('Categorie')->create(
				["titre"=>$_POST['titre'], 
				"description"=>$_POST['description']
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
<h2  class="description" style="text-align: center; border-bottom:6px solid  color: red; padding-bottom: 20px; margin-bottom: 20px;">Crée une catégorie</h2>
<form method="post">
	<input type="hidden" name="id" value="">
	<input class="form-control" type="text" name="titre" value="" placeholder="Titre de la catégorie" style="margin-bottom: 20px;">
	<input class="form-control" type="text" name="description" value="" placeholder="Description" style="margin-bottom: 20px;">
	<input class="myButton" type="submit" name="" style="margin-bottom: 80px;">
</form>
</div>
<div class="col-md-2">
	
</div>