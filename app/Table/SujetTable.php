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

	public function nombreSujet($id)
	{
		return $this->query(" SELECT sujets.titre,
								COUNT(category_id)
								as sujet
								FROM sujets
								LEFT JOIN categories
								ON category_id = categories.id
								WHERE categories.id = ?
							", [$id]);
	}

	public function lastBySujet($category_id, $one=false)
	{
		return $this->query(" SELECT sujets.id,
								 	 sujets.titre,
								 	 sujets.description,
									 categories.titre as sujet
								FROM sujets
								LEFT JOIN categories
									ON categorie_id = categories.id
								WHERE categories.id = ?
								ORDER BY sujets.id DESC
							", [$category_id], $one);
	}

}