<?php if(isset($_SESSION['Auth'])){
	$utilisateurs = App::getInstance()->getTable('User')->find($_SESSION['Id']);
} ?>

<div class="col-md-2">
	
</div>

<div class="col-md-8">
<div class="commentaire">
	<div id="scroll"></div>
	<?php if(isset($_SESSION['Auth'])): ?>
	<h4>Message<a class="myButton" style="text-decoration: none; float: right; padding-bottom: 5px;" href="index.php?p=Message.Add&idC=<?= $_GET['idC'] ?>&idS=<?= $_GET['idS'] ?>">
	Crée un message</a></h4>
	<?php else : ?>
	<h4>Message</h4>
	<?php endif; ?>

	<div id="commentaire">
	<span>
<?php foreach (App::getInstance()->getTable('message')->lastByMessage($_GET['idS']) as $sms) : ?>
	<div class="commentaire">
	<div class="commentairePersonne">
	<?php if(isset($_SESSION['Auth'])): ?>
       	<?php if($utilisateurs->membre_rang == 'Admin'): ?>
	<form action="index.php?p=Message.Del" method="post" class="formComDelete">
		<button style="margin-left: 10px;" class="buttonComDelete" type="submit" value="<?=$sms->id?>" name="id">X</button>
	</form>
	<?php else : ?><?php endif; ?>
    <?php else : ?><?php endif; ?>
	<p style="float: right;"><?= $sms->date_creation_fr ?></p>
	<h5><?= $sms->auteur ?></h5>
	<p><?= $sms->message ?></p>
	</div>
	</div>
<?php endforeach; ?>
	</span>
	</div>


	</div>
	</div>
	
</div>
</div>

<div class="col-md-2">
	
</div>