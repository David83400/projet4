<?php

namespace Projet4\Controller\Frontend;

require_once 'Model/Frontend/EpisodesManager.php';
require_once 'View/ControllerViews.php';

use Projet4\Model\Frontend\EpisodesManager;
use Projet4\View\ControllerViews;

/**
  * Manage the list episodes page
  *
  * @author  David Roche <davidroche83400@gmail.com
  *
*/
class EpisodesController
{
    private $episodes;

    public function __construct()
    {
        $this->episodes = new EpisodesManager();
    }
    
    /**
     * display a list of all blog episodes
     *
     * @return void
     */
    public function displayEpisodes()
    {
        $episodes = $this->episodes->getEpisodes();
        $view = new ControllerViews("Frontend/episodes");
        $view->generateFrontendViews(array('episodes' => $episodes));
    }
}