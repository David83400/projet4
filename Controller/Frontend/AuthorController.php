<?php

namespace Projet4\Controller\Frontend;

require_once 'View/ControllerViews.php';

use Projet4\View\ControllerViews;

/**
  * Manage the author page
  *
  * @author  David Roche <davidroche83400@gmail.com
  *
*/
class AuthorController
{
    /**
     * display the author page
     *
     * @return void
     */
    public function displayAuthor()
    {
        $view = new ControllerViews("Frontend/author");
        $view->generateFrontendViews(array());
    }
}