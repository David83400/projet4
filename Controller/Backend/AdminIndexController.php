<?php

namespace David\Projet4\Controller\Backend;

require_once 'Model/Backend/EpisodesManager.php';
require_once 'Model/Backend/CommentsManager.php';
require_once 'View/ControllerViews.php';

use David\Projet4\Model\Backend\EpisodesManager;
use David\Projet4\Model\Backend\CommentsManager;
use David\Projet4\View\ControllerViews;

class AdminIndexController
{
    private $episodes;
    private $signaledComments;

    public function __construct()
    {
        $this->episodes = new EpisodesManager();
        $this->signaledComments = new CommentsManager();
    }
    
    /**
     * display the administration page
     *
     * @return void
     */
    public function displayAdminIndex()
    {
        $episodes = $this->episodes->getEpisodes();
        $episodeComments = $this->signaledComments->getSignaledEpisodeComments();
        $bookComments = $this->signaledComments->getSignaledBookComments();
        $view = new ControllerViews("Backend/admin");
        $view->generateBackendViews(array('episodes' => $episodes, 'episodeComments' => $episodeComments, 'bookComments' => $bookComments));
    }

    public function removeEpisodeAndComments($id, $commentId)
    {
        $this->episodes->deleteEpisodeAndComments($id, $commentId);
    }
}