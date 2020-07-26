<?php
namespace Projet4\Model\Backend;

require_once 'Model/Manager.php';

use Projet4\Model\Manager;

class MessagingManager extends Manager
{
    /**
     * Method to get all messages
     *
     * @return void
     */
    public function getMessages()
    {
        $sql = 'SELECT contactMessages.id AS idMessage, contactMessages.userMessage AS userMessage, contactMessages.flag AS flagMessage, DATE_FORMAT(contactMessages.messageDate, \'%d/%m/%Y\') AS messageFrDate, users.pseudo AS userPseudo, users.email AS userEmail, DATE_FORMAT(users.inscriptionDate, \'%d/%m/%Y\') AS inscriptionFrDate FROM contactMessages INNER JOIN users ON users.id = contactMessages.userId GROUP BY contactMessages.id DESC';
        $messages = $this->executeRequest($sql);
        return $messages;
    }

    /**
     * Method to get a message associated with an id
     *
     * @param [int] $idMessage
     * @return void
     */
    public function getMessage($idMessage)
    {
        $sql = 'SELECT contactMessages.id AS idMessage, contactMessages.userMessage AS userMessage, contactMessages.flag AS flagMessage, DATE_FORMAT(messageDate, \'%d/%m/%Y\') AS messageFrDate, users.pseudo AS userPseudo, users.email AS userEmail, DATE_FORMAT(users.inscriptionDate, \'%d/%m/%Y\') AS inscriptionFrDate FROM contactMessages INNER JOIN users ON contactMessages.id = ? AND users.id = contactMessages.userId';
        $message = $this->executeRequest($sql, array($idMessage));
        if ($message->rowCount() > 0)
        {
            return $message->fetch();
        }
        else
        {
            throw new \exception ("Aucun message ne correspond à l'identifiant '$idMessage'");
        }
    }

    /**
     * Method to mark a message as treated
     *
     * @param [int] $idMessage
     * @return void
     */
    public function updateMessage($idMessage)
    {
        $sql = 'UPDATE contactMessages SET flag = 0 WHERE id = ?';
        $req = $this->executeRequest($sql, array($idMessage));
    }
}
