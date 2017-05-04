<?php
namespace App\Table;

use Core\Table\Table;

/**
* 
*/
class SujetTable extends Table
{
	public function sujet()
	{
		return $this->query("SELECT id, titre, description FROM sujets");
	}

}