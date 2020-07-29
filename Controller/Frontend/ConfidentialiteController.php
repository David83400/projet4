<?php

namespace Projet4\Controller\Frontend;

require_once 'View/ControllerViews.php';

use Projet4\View\ControllerViews;

/**
  * Manage the policy of confidentiality page
  *
  * @author  David Roche <davidroche83400@gmail.com
  *
*/
class ConfidentialiteController
{
    /**
     * display the confidentiality page
     *
     * @return void
     */
    public function displayConfidentialite()
    {
        $view = new ControllerViews("Frontend/confidentialite");
        $view->generateFrontendViews(array());
    }
}