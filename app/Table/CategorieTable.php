<?php
namespace App\Table;

use Core\Table\Table;

/**
* 
*/
class CategorieTable extends Table
{
	public function Cat()
	{
		return $this->query("SELECT id, titre, description, sujet_id FROM categories");
	}

}