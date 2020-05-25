<?php

require_once 'Model/EpisodesManager.php';
require_once 'Model/CommentsManager.php';
require_once 'View/ControllerViews.php';

class EpisodeController
{
    private $episode;
    private $comments;

    /**
     * Undocumented function
     */
    public function __construct()
    {
        $this->episode = new EpisodesManager();
        $this->comments = new CommentsManager();
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
        $comments = $this->comments->getComments($episodeId);
        $view = new ControllerViews("episode");
        $view->generate(array('episode' => $episode));
    }
}