<?php

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
        $view = new ControllerViews("Home");
        $view->generate(array('lastEpisode' => $lastEpisode));
    }
}