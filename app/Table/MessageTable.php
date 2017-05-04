<?php
namespace App\Table;

use Core\Table\Table;

/**
* 
*/
class MessageTable extends Table
{

	public function lastByMessage($category_id, $one=false)
	{
		return $this->query(" SELECT messages.id,
									 messages.message,
								 	 messages.auteur,
								 	 messages.date
								FROM messages
								LEFT JOIN sujets
									ON sujet_id = sujets.id
								WHERE sujets.id = ?
								ORDER BY messages.date DESC
							", [$category_id], $one);
	}

	public function nbMessageSujet($id)
	{
		return $this->query(" SELECT messages.id, count(sujet_id) as nbSujet FROM messages LEFT JOIN sujets ON sujet_id = sujets.id WHERE sujets.id = ? ", [$id]);
	}

}