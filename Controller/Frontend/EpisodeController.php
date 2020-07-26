<?php

namespace Projet4\Controller\Frontend;

require_once 'Model/Frontend/EpisodesManager.php';
require_once 'Model/Frontend/CommentsManager.php';
require_once 'View/ControllerViews.php';

use Projet4\Model\Frontend\EpisodesManager;
use Projet4\Model\Frontend\CommentsManager;
use Projet4\View\ControllerViews;

class EpisodeController
{
    private $episode;
    private $episodeComments;

    public function __construct()
    {
        $this->episode = new EpisodesManager();
        $this->episodeComments = new CommentsManager();
    }

    /**
     * display the episode details and comments
     *
     * @param [int] $episodeId
     * @return void
     */
    public function displayEpisode($errors,$episodeId)
    {
        $episode = $this->episode->getEpisode($episodeId);
        $episodeComments = $this->episodeComments->getEpisodeComments($episodeId);
        $view = new ControllerViews("Frontend/episode");
        $view->generateFrontendViews(array('episode' => $episode, 'episodeComments' => $episodeComments, 'errors' => $errors));
    }

    /**
     * Add a comment associated with an episode
     *
     * @param [string] $author
     * @param [string] $episodeComment
     * @param [int] $episodeId
     * @return void
     */
    public function addEpisodeComment($author, $episodeComment, $episodeId)
    {
        $this->episodeComments->postEpisodeComment($author, $episodeComment, $episodeId);
        $this->displayEpisode($errors, $episodeId);
    }

    /**
     * Method to signal an episode comment
     *
     * @param [int] $id
     * @param [int] $episodeId
     * @return void
     */
    public function signalEpisodeComment($id, $episodeId)
    {
        $this->episodeComments->updateEpisodeComment($id, $episodeId);
        return $episodeId;
    }
}