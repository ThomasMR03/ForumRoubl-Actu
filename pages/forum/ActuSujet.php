<div class="col-md-2">
	
</div>

<div class="col-md-8">
<div class="commentaire">
	<div id="scroll"></div>
	<h4>Message<a class="myButton" style="text-decoration: none; float: right; padding-bottom: 5px;" href="index.php?p=Message.Add&idC=<?= $_GET['idC'] ?>&idS=<?= $_GET['idS'] ?>">
	Crée un message</a></h4>

	<div id="commentaire">
	<span>
<?php foreach (App::getInstance()->getTable('message')->lastByMessage($_GET['idS']) as $sms) : ?>
	<div class="commentaire">
	<div class="commentairePersonne">
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