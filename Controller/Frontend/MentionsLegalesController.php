<?php

namespace Projet4\Controller\Frontend;

require_once 'View/ControllerViews.php';

use Projet4\View\ControllerViews;

class MentionsLegalesController
{
    /**
     * display the mentions légales page
     *
     * @return void
     */
    public function displayMentionsLegales()
    {
        $view = new ControllerViews("Frontend/mentionsLegales");
        $view->generateFrontendViews(array());
    }
}