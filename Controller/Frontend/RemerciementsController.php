<?php

namespace Projet4\Controller\Frontend;

require_once 'View/ControllerViews.php';

use Projet4\View\ControllerViews;

class RemerciementsController
{
    /**
     * display the remerciements page
     *
     * @return void
     */
    public function displayRemerciements()
    {
        $view = new ControllerViews("Frontend/remerciements");
        $view->generateFrontendViews(array());
    }
}