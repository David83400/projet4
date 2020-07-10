<?php

namespace David\Projet4\Controller\Backend;

require_once 'Model/Backend/EpisodesManager.php';
require_once 'View/ControllerViews.php';

use David\Projet4\Model\Backend\EpisodesManager;
use David\Projet4\View\ControllerViews;

class modifyEpisodeController
{
    private $episode;

    public function __construct()
    {
        $this->episode = new EpisodesManager();
    }

    /**
     * Display the modify episode page
     *
     * @param [int] $episodeId
     * @return void
     */
    public function displayAdminEpisode($episodeId, $errors)
    {
        $episode = $this->episode->getEpisode($episodeId);
        if (isset($_POST['formModifyEpisode']))
        {
            $errors = $this->verifFormModifyEpisode($errors);
        }
        $view = new ControllerViews("Backend/modifyEpisode");
        $view->generateBackendViews(array('episode' => $episode, 'errors' => $errors));
    }

    /**
     * Method to make verifications in the modify episode form
     *
     * @return void
     */
    public function verifFormModifyEpisode($errors)
    {
        if ((!empty($_POST['title'])) && (!empty($_POST['slug'])) && (!empty($_POST['content'])))
        {
            $episodeId = intval($_GET['id']);
            $title = $_POST['title'];
            $slug = $_POST['slug'];
            $content = $_POST['content'];
            $this->modifyEpisode($title, $slug, $content, $episodeId);
            header('Location:index.php?action=admin');
            $_SESSION['flash']['success'] = 'L\'épisode a bien été modifié !';
        }
        else
        {
            $errors['message'] = "Tous les champs doivent être remplis !";  
        }
        return $errors;
    }

    /**
     * Method to modify an episode
     *
     * @param [string] $title
     * @param [string] $slug
     * @param [string] $content
     * @param [int] $episodeId
     * @return void
     */
    public function modifyEpisode($title, $slug, $content, $episodeId)
    {
        $this->episode->updateEpisode($title, $slug, $content, $episodeId);
    }
}