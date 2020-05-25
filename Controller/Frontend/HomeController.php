<?php

namespace David\Projet4\Controller\Frontend;

require_once 'Model/EpisodesManager.php';
require_once 'View/ControllerViews.php';

use David\Projet4\Model\EpisodesManager;
use David\Projet4\View\ControllerViews;

class HomeController
{
    private $lastEpisode;

    public function __construct()
    {
        $this->lastEpisode = new EpisodesManager();
    }

    /**
     *home page display
     *
     * @return void
     */
    public function displayHome()
    {
        $lastEpisode = $this->lastEpisode->getLastEpisode();
        $view = new ControllerViews("Frontend/home");
        $view->generate(array('lastEpisode' => $lastEpisode));
    }
}