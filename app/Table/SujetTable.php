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

	public function lastBySujet($category_id, $one=false)
	{
		return $this->query(" SELECT sujets.id,
								 	 sujets.titre,
								 	 sujets.description,
								 	 sujets.auteur,
									 categories.titre as sujet
								FROM sujets
								LEFT JOIN categories
									ON categorie_id = categories.id
								WHERE categories.id = ?
								ORDER BY sujets.id DESC
							", [$category_id], $one);
	}

	public function nbSujetCat($id)
	{
		return $this->query(" SELECT sujets.id, count(categorie_id) as nbSujetCat FROM sujets LEFT JOIN categories ON categorie_id = categories.id WHERE categories.id = ?", [$id]);
	}

}