<?php

namespace Projet4\Model\Frontend;

require_once 'Model/Manager.php';

use Projet4\Model\Manager;

/**
  * Manage calls to db for the messages
  *
  * @author  David Roche <davidroche83400@gmail.com
  *
*/
class ContactManager extends Manager
{
    /**
     * Method to add a message in the database
     *
     * @param [int] $userId
     * @param [string] $message
     * @return void
     */
    public function addMessage($userId, $message)
    {
        $sql = 'INSERT INTO contactMessages(userId, userMessage, flag, messageDate) VALUES(?, ?, 1, NOW())';
        $this->executeRequest($sql, array($userId, $message));
    }
}