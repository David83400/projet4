<?php

require_once 'Model/EpisodesManager.php';
require_once 'View/ControllerViews.php';

class HomeController
{
    private $lastEpisode;

    public function __construct()
    {
        $this->lastEpisode = new EpisodesManager();
    }

    public function displayHome()
    {
        $lastEpisode = $this->lastEpisode->getLastEpisode();
        $view = new ControllerViews("home");
        $view->generate(array('lastEpisode' => $lastEpisode));
    }
}