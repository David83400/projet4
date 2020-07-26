<?php

namespace Projet4\Controller\Backend;

require_once 'Model/Backend/CommentsManager.php';
require_once 'View/ControllerViews.php';

use Projet4\Model\Backend\CommentsManager;
use Projet4\View\ControllerViews;

class EpisodeCommentController
{
    private $editComment;
    
    public function __construct()
    {
        $this->editComment = new CommentsManager();
    }

    /**
     * Display the signaled comments page
     *
     * @param [int] $commentId
     * @return void
     */
    public function displayEpisodeComment($commentId)
    {
        $episodeComments = $this->editComment->getSignaledEpisodeComment($commentId);
        $view = new ControllerViews("Backend/episodeComment");
        $view->generateBackendViews(array('episodeComments' => $episodeComments));
    }

    /**
     * Method to accept a signaled comment
     *
     * @param [int] $commentId
     * @return void
     */
    public function acceptEpisodeComment($commentId)
    {
        $this->editComment->updateEpisodeComment($commentId);
    }

    /**
     * Method to delete a signaled comment
     *
     * @param [int] $commentId
     * @return void
     */
    public function removeEpisodeComment($commentId)
    {
        $this->editComment->deleteEpisodeComment($commentId);
    }
}