<?php

namespace David\Projet4\Controller\Frontend;

require_once 'View/ControllerViews.php';

use David\Projet4\View\ControllerViews;

class ContactController
{
    private $contact;

    /**
     * display the contact page
     *
     * @return void
     */
    public function displayContact()
    {
        $view = new ControllerViews('Frontend/contact');
        $view->generate(array('contact' => $this->contact));
    }
}