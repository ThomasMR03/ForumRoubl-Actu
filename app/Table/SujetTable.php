<?php
namespace App\Table;

use Core\Table\Table;

/**
* 
*/
class SujetTable extends Table
{

	public function lastBySujet()
	{
		return $this->query(" SELECT sujets.id,
								 	 sujets.titre,
								 	 sujets.description,
								 	 sujets.auteur
								FROM sujets
								LEFT JOIN categories
									ON categorie_id = categories.id
								ORDER BY sujets.id DESC
							");
	}

	public function nbSujetCat($id)
	{
		return $this->query(" SELECT sujets.id, count(categorie_id) as nbSujetCat FROM sujets LEFT JOIN categories ON categorie_id = categories.id WHERE categories.id = ?", [$id]);
	}

}