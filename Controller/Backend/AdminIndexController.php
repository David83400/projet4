<?php

namespace Projet4\Controller\Backend;

require_once 'Model/Backend/EpisodesManager.php';
require_once 'Model/Backend/CommentsManager.php';
require_once 'View/ControllerViews.php';

use Projet4\Model\Backend\EpisodesManager;
use Projet4\Model\Backend\CommentsManager;
use Projet4\View\ControllerViews;

/**
  * Manage the episodes list and sigaled comments in the back office
  * @author  David Roche <davidroche83400@gmail.com
  *
*/
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

    /**
     * Method to delete an episode and the comments associated
     *
     * @param [int] $id
     * @param [int] $commentId
     * @return void
     */
    public function removeEpisodeAndComments($id, $commentId)
    {
        $this->episodes->deleteEpisodeAndComments($id, $commentId);
    }
}