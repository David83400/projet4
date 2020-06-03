<?php

namespace David\Projet4\Controller\Frontend;

require_once 'View/ControllerViews.php';

use David\Projet4\View\ControllerViews;

class AuthorController
{
    private $author;

    public function displayAuthor()
    {
        $view = new ControllerViews("Frontend/author");
        $view->generate(array('author' => $this->author));
    }
}