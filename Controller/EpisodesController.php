<?php

require_once 'Model/EpisodesManager.php';
require_once 'View/ControllerViews.php';

class EpisodesController
{
    private $episodes;

    /**
     * 
     * 
     */
    public function __construct()
    {
        $this->episodes = new EpisodesManager();
    }
    /**
     * affiche la liste de tous les billets du blog
     *
     * @return void
     */
    public function displayEpisodes()
    {
        $episodes = $this->episodes->getEpisodes();
        $view = new ControllerViews("Episodes");
        $view->generate(array('episodes' => $episodes));
    }
}