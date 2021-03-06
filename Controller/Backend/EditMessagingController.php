<?php

namespace Projet4\Controller\Backend;

require_once 'Model/Backend/MessagingManager.php';
require_once 'View/ControllerViews.php';

use Projet4\Model\Backend\MessagingManager;
use Projet4\View\ControllerViews;

/**
  * Manage the edition of contact messages in the back office
  *
  * @author  David Roche <davidroche83400@gmail.com
  *
*/
class EditMessagingController
{
    private $editMessages;

    public function __construct()
    {
        $this->editMessages = new MessagingManager();
    }
    
    /**
     * Display the edit mesage page
     *
     * @param [int] $idMessage
     * @return void
     */
    public function displayEditMessaging($idMessage)
    {
        $messages = $this->editMessages->getMessage($idMessage);
        $view = new ControllerViews("Backend/editMessaging");
        $view->generateBackendViews(array('messages' => $messages));
    }

    /**
     * Method to mark a message as processed
     *
     * @param [int] $idMessage
     * @return void
     */
    public function treatMessage($idMessage)
    {
        $this->editMessages->updateMessage($idMessage);
    }
}