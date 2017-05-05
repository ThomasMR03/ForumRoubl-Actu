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
								 	 DATE_FORMAT(date_creation, 'Le %d/%m/%Y à %H:%i:%s') as date_creation_fr
								FROM messages
								LEFT JOIN sujets
									ON sujet_id = sujets.id
								WHERE sujets.id = ?
								ORDER BY date_creation_fr DESC
							", [$category_id], $one);
	}

	public function nbMessageSujet($id)
	{
		return $this->query(" SELECT messages.id, messages.auteur, DATE_FORMAT(date_creation, 'Le %d/%m/%Y à %H:%i:%s') as date_creation_fr, count(sujet_id) as nbSujet FROM messages LEFT JOIN sujets ON sujet_id = sujets.id WHERE sujets.id = ? ORDER BY date_creation_fr DESC ", [$id]);
	}

	public function lastByMessageSujet($category_id, $one=false)
	{
		return $this->query(" SELECT messages.id,
									 messages.message,
								 	 messages.auteur,
								 	 DATE_FORMAT(date_creation, 'Le %d/%m/%Y à %H:%i:%s') as date_creation_fr
								FROM messages
								LEFT JOIN sujets
									ON sujet_id = sujets.id
								WHERE sujets.id = ?
								ORDER BY date_creation_fr DESC LIMIT 0, 1
							", [$category_id], $one);
	}

}