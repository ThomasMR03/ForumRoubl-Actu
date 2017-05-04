<?php
use Core\Auth\DBAuth;
define('ROOT', dirname(__DIR__)); // On défini ROOT // __DIR__ va chercher le dossier parent donc "newapp"
require ROOT.'/app/App.php'; // Récupère le fichier App.php du dossier app
App::load(); //Chargé autoloader

if (isset($_GET['p'])) {  //Si p existe
	$page = $_GET['p']; //Ajoute p devant le nom de la page
}else{
	$page = "home"; //Sinon $page = home
}

//////////////bouton connect 
$app = App::getInstance();
$auth = new DBAuth($app->getDb());
if ($auth->logged()) {
	$connect = "Disconnect";
}else{
	$connect = "Login";
}
/////////////////////////

ob_start();
if ($page==='home') { //Si page = home
	require ROOT.'/pages/index.php'; //Récupère la page ...

//Suite page obligatoire
}elseif ($page==='Login') {
	require ROOT.'/pages/users/login.php';
}elseif ($page==='Disconnect') {
	require ROOT.'/pages/users/disconnect.php';

}elseif ($page==='Forum.Actu') {
	require ROOT.'/pages/forum/actu.php';
}elseif ($page==='Forum.Actu_Sujet') {
	require ROOT.'/pages/forum/ActuSujet.php';

}elseif ($page==='Sujet.Add') {
	require ROOT.'/pages/add/sujetAdd.php';
}elseif ($page==='Catégorie.Add') {
	require ROOT.'/pages/add/categorieAdd.php';
}elseif ($page==='Message.Add') {
	require ROOT.'/pages/add/messageAdd.php';

}elseif ($page==='403') {
	require ROOT.'/pages/errors/403.php';
}else{ //Page 404
	require ROOT.'/pages/errors/404.php';
}
$content = ob_get_clean(); //ob = cache / get = on met tout dans la var / clean = sup le cache de la var
require ROOT.'/pages/templates/default.php'; 