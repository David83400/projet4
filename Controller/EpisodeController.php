<?php

require_once 'Model/EpisodesManager';
require_once 'View/ControllerViews';

class EpisodesManager
{
    private $episode;

    /**
     * Undocumented function
     */
    public function __construct()
    {
        $this->episode = new EpisodesManager();
    }

    /**
     * affiche les détails d'un billet
     *
     * @param [int] $episodeId
     * @return void
     */
    public function displayEpisode($episodeId)
    {
        $episode = $this->episode->getEpisode($episodeId);
        $View = new ControllerView("Episode");
        $view->generate(array('episode' => $episode));
    }
}