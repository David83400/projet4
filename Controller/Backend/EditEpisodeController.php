<?php

namespace Projet4\Controller\Backend;

require_once 'Model/Backend/EpisodesManager.php';
require_once 'View/ControllerViews.php';

use Projet4\Model\Backend\EpisodesManager;
use Projet4\View\ControllerViews;

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
     * @param [int] $errors
     * @return void
     */
    public function displayEditEpisode($errors)
    {
        if (isset($_POST['formEditEpisode']))
        {
            $errors = $this->verifyFormEditEpisode();
        }
        $view = new ControllerViews("Backend/editEpisode");
        $view->generateBackendViews(array('errors' => $errors));
    }

    /**
     * Method that make verifications on the edit episode form
     *
     * @return void
     */
    public function verifyFormEditEpisode()
    {
        if ((!empty($_POST['title'])) && (!empty($_POST['slug'])) && (!empty($_POST['content'])) && (!empty($_POST['author'])))
        {
            $errors = array();
            $author = htmlspecialchars($_POST['author']);
            $episodeImage = 'http://localhost/blogJeanForteroche/projet4/Public/images/couverture.jpg';
            $title = htmlspecialchars($_POST['title']);
            $slug = htmlspecialchars($_POST['slug']);
            $content = $_POST['content'];
            $this->addEpisode($author, $episodeImage, $title, $slug, $content);
            header('Location:index.php?action=admin');
            $_SESSION['flash']['success'] = 'L\'épisode a bien été créé !';
        }
        else
        {
            $errors['message'] = "Tous les champs doivent être remplis !";
        }
        return $errors;
    }

    /**
     * Method to create an episode
     *
     * @param [string] $author
     * @param [jpg] $episodeImage
     * @param [string] $title
     * @param [string] $slug
     * @param [string] $content
     * @return void
     */
    public function addEpisode($author, $episodeImage, $title, $slug, $content)
    {
        $this->editEpisode->createEpisode($author, $episodeImage, $title, $slug, $content);
    }
}