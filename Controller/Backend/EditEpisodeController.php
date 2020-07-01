<?php

namespace David\Projet4\Controller\Backend;

require_once 'Model/Backend/EpisodesManager.php';
require_once 'View/ControllerViews.php';

use David\Projet4\Model\Backend\EpisodesManager;
use David\Projet4\View\ControllerViews;

class EditEpisodeController
{
    private $editEpisode;

    public function __construct()
    {
        $this->editEpisode = new EpisodesManager();
    }
    /**
     * display the edit episode page
     *
     * @return void
     */
    public function displayEditEpisode()
    {
        $view = new ControllerViews("Backend/editEpisode");
        $view->generateBackendViews(array());
    }

    public function addEpisode($author, $episodeImage, $title, $slug, $content)
    {
        $this->editEpisode->createEpisode($author, $episodeImage, $title, $slug, $content);
    }
}