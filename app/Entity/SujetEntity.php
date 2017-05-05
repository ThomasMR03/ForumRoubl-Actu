<?php
namespace App\Entity;
use Core\Entity\Entity;

/**
* 
*/
class SujetEntity extends Entity
{
	public function getUrl()
	{
		return 'index.php?p=Forum.Actu_Sujet&idC='.$_GET['idC'].'&idS='.$this->id;
	}

}