<?php

namespace David\Projet4\Controller\Frontend;

require_once 'Model/EpisodesManager.php';
require_once 'View/ControllerViews.php';

use David\Projet4\Model\EpisodesManager;
use David\Projet4\View\ControllerViews;

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
        $view->generate(array('episodes' => $episodes));
    }
}