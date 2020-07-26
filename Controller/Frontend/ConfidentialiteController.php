<?php

namespace Projet4\Controller\Frontend;

require_once 'View/ControllerViews.php';

use Projet4\View\ControllerViews;

class ConfidentialiteController
{
    /**
     * display the confidentialité page
     *
     * @return void
     */
    public function displayConfidentialite()
    {
        $view = new ControllerViews("Frontend/confidentialite");
        $view->generateFrontendViews(array());
    }
}