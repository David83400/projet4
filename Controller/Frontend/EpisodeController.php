<?php

namespace David\Projet4\Controller\Frontend;

require_once 'Model/EpisodesManager.php';
require_once 'Model/CommentsManager.php';
require_once 'View/ControllerViews.php';

use David\Projet4\Model\EpisodesManager;
use David\Projet4\Model\CommentsManager;
use David\Projet4\View\ControllerViews;

class EpisodeController
{
    private $episode;
    private $comments;

    public function __construct()
    {
        $this->episode = new EpisodesManager();
        $this->comments = new CommentsManager();
    }

    /**
     * display the episode details and comments
     *
     * @param [int] $episodeId
     * @return void
     */
    public function displayEpisode($episodeId)
    {
        $episode = $this->episode->getEpisode($episodeId);
        $comments = $this->comments->getEpisodeComments($episodeId);
        $view = new ControllerViews("Frontend/episode");
        $view->generate(array('episode' => $episode, 'comments' => $comments));
    }

    /**
     * Add a comment in an episode
     *
     * @param [string] $author
     * @param [string] $comment
     * @param [int] $episodeId
     * @return void
     */
    public function addEpisodeComment($author, $comment, $episodeId)
    {
        // Sauvegarde du commentaire
        $this->comments->postEpisodeComment($author, $comment, $episodeId);
        // Actualisation de l'affichage du billet
        $this->displayEpisode($episodeId);
    }
}