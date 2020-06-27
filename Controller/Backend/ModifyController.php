<?php

namespace David\Projet4\Controller\Backend;

require_once 'Model/Backend/ModifyManager.php';
require_once 'View/ControllerViews.php';

use David\Projet4\Model\Backend\ModifyManager;
use David\Projet4\View\ControllerViews;

class modifyController
{
    private $modify;
    private $episode;

    public function __construct()
    {
        $this->episode = new ModifyManager();
    }

    public function displayAdminEpisode($episodeId)
    {
        $episode = $this->episode->getEpisode($episodeId);
        $episodeComments = $this->episode->getEpisodeComments($episodeId);
        $view = new ControllerViews("Backend/modify");
        $view->generateBackendViews(array('modify' => $this->modify, 'episode' => $episode, 'episodeComments' => $episodeComments));
    }

    public function modifyEpisode($title, $slug, $content, $episodeId)
    {
        $this->episode->updateEpisode($title, $slug, $content, $episodeId);
    }
}