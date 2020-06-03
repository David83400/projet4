<?php

namespace David\Projet4\Controller;

require_once 'Controller/Frontend/HomeController.php';
require_once 'Controller/Frontend/EpisodesController.php';
require_once 'Controller/Frontend/EpisodeController.php';
require_once 'Controller/Frontend/AuthorController.php';
require_once 'View/ControllerViews.php';

use David\Projet4\Controller\Frontend\HomeController;
use David\Projet4\Controller\Frontend\EpisodesController;
use David\Projet4\Controller\Frontend\EpisodeController;
use David\Projet4\Controller\Frontend\AuthorController;

class Router
{
    private $homeControl;
    private $episodesControl;
    private $episodeControl;
    private $authorControl;

    public function __construct()
    {
        $this->homeControl = new HomeController();
        $this->episodesControl = new EpisodesController();
        $this->episodeControl = new EpisodeController();
        $this->authorControl = new AuthorController();
    }
    
    /**
     * Route the incoming request and execute the associated action
     *
     * @return void
     */
    public function routerRequest()
    {
        try {
            if (isset($_GET['action']))
            {
                if ($_GET['action'] == 'author')
                {
                    $this->authorControl->displayAuthor();
                }
                elseif ($_GET['action'] == 'episodes')
                {
                    $this->episodesControl->displayEpisodes();
                }
                elseif ($_GET['action'] == 'episode')
                {
                    $episodeId = intval($this->getParameter($_GET, 'id'));
                    if ($episodeId > 0)
                    {
                        $this->episodeControl->displayEpisode($episodeId);
                    }
                    else
                    {
                        throw new Exception('Identifiant d\'épisode invalide');
                    }
                }
                elseif ($_GET['action'] == 'comment')
                {
                    $author = $this->getParameter($_POST, 'author');
                    $comment = $this->getParameter($_POST, 'comment');
                    $episodeId = $this->getParameter($_POST, 'id');
                    $this->episodeControl->addComment($author, $comment, $episodeId);
                }
                else
                {
                    throw new Exception('Action non valide');
                }
            }
            else
            {
                $this->homeControl->displayHome();
            }
        }
        catch (Exception $e) {
            $this->error($e->getMessage());
        }
    }

    /**
     * display error message
     *
     * @param [string] $errorMessage
     * @return void
     */
    private function error($errorMessage)
    {
        $view = new ControllerViews("error");
        $view->generate(array('errorMessage' => $errorMessage));
    }

    /**
     *Find the requested parameter in an array
     *
     * @param [array] $array
     * @param [string] $name
     * @return void
     */
    private function getParameter($array, $name)
    {
        if (isset($array[$name]))
        {
            return $array[$name];
        }
        else
        {
            throw new Exception("Paramètre '$name' absent");
        }
    }
}