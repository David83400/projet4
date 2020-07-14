<?php

namespace David\Projet4\Controller\Backend;

require_once 'Model/Backend/MessagingManager.php';
require_once 'View/ControllerViews.php';

use David\Projet4\Model\Backend\MessagingManager;
use David\Projet4\View\ControllerViews;

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
}