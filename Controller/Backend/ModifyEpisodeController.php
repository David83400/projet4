<?php

namespace Projet4\Controller\Backend;

require_once 'Model/Backend/EpisodesManager.php';
require_once 'View/ControllerViews.php';

use Projet4\Model\Backend\EpisodesManager;
use Projet4\View\ControllerViews;

/**
  * Manage the modify page in the back office
  *
  * @author  David Roche <davidroche83400@gmail.com
  *
*/
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
     * @param [string] $errors
     * @return void
     */
    public function displayAdminEpisode($episodeId, $errors)
    {
        $episode = $this->episode->getEpisode($episodeId);
        if (isset($_POST['formModifyEpisode']))
        {
            $errors = $this->verifFormModifyEpisode();
        }
        $view = new ControllerViews("Backend/modifyEpisode");
        $view->generateBackendViews(array('episode' => $episode, 'errors' => $errors));
    }

    /**
     * Method to make verifications in the modify episode form
     *
     * @param [int] $errors
     * @return void
     */
    public function verifFormModifyEpisode()
    {
        if ((!empty($_POST['title'])) && (!empty($_POST['slug'])) && (!empty($_POST['content'])))
        {
            $errors = array();
            $episodeId = intval($_GET['id']);
            $title = htmlspecialchars($_POST['title']);
            $slug = htmlspecialchars($_POST['slug']);
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