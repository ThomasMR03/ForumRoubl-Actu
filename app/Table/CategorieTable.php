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
		return $this->query("SELECT id, titre, description FROM categories");
	}

	public function nbSmsCat($id)
	{
		return $this->query(" SELECT categories.id, count(categorie_sms_id) as nbSmsCat FROM categories LEFT JOIN messages ON categorie_sms_id = categories.id WHERE categories.id = ?", [$id]);
	}

}