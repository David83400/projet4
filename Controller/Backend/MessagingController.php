<?php

namespace Projet4\Controller\Backend;

require_once 'Model/Backend/MessagingManager.php';
require_once 'View/ControllerViews.php';

use Projet4\Model\Backend\MessagingManager;
use Projet4\View\ControllerViews;

/**
  * Manage the list of contact messages in the administration messaging page
  *
  * @author  David Roche <davidroche83400@gmail.com
  *
*/
class MessagingController
{
    private $messages;

    public function __construct()
    {
        $this->messages = new MessagingManager();
    }

    /**
     * Display the messaging page
     *
     * @return void
     */
    public function displayMessaging()
    {
        $messages = $this->messages->getMessages();
        $view = new ControllerViews("Backend/messaging");
        $view->generateBackendViews(array('messages' => $messages));
    }

    /**
     * Mehod to delete a contact message
     *
     * @param [int] $id
     * @return void
     */
    public function removeMessage($id)
    {
        $this->messages->deleteMessage($id);
    }
}