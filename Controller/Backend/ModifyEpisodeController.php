<?php

namespace David\Projet4\Controller\Backend;

require_once 'Model/Backend/ModifyEpisodeManager.php';
require_once 'View/ControllerViews.php';

use David\Projet4\Model\Backend\ModifyEpisodeManager;
use David\Projet4\View\ControllerViews;

class modifyEpisodeController
{
    private $episode;

    public function __construct()
    {
        $this->episode = new ModifyEpisodeManager();
    }

    public function displayAdminEpisode($episodeId)
    {
        $episode = $this->episode->getEpisode($episodeId);
        $episodeComments = $this->episode->getEpisodeComments($episodeId);
        $view = new ControllerViews("Backend/modifyEpisode");
        $view->generateBackendViews(array('episode' => $episode, 'episodeComments' => $episodeComments));
    }

    public function modifyEpisode($title, $slug, $content, $episodeId)
    {
        $this->episode->updateEpisode($title, $slug, $content, $episodeId);
    }
}