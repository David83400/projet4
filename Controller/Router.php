<?php

require_once 'Controller/EpisodesController';
require_once 'Controller/EpisodeController';
require_once 'View/ControllerViews';

class Router
{
    private $homeControl;
    private $episodesControl;
    private $episodeControl;

    public function __construct()
    {
        $this->homeControl = new HomeController;
        $this->episodesControl = new EpisodesController;
        $this->episodeControl = new EpisodeController;
    }
    /**
     * Route la requète entrante et exécute l'action associée
     *
     * @return void
     */
    public function routerRequest()
    {
        try {
            if (isset($_GET['action']))
            {
                if ($_GET['action'] == 'episodes')
                {
                    $this->episodesControl->displayEpisodes();
                }
                elseif ($_GET['action'] == 'episode')
                {
                    $episodeId = intval($this->getParameter($_GET, 'id'));
                    if (episodeId > 0)
                    {
                        $this->episodeControl->displayEpisode($episodeId);
                    }
                    else
                    {
                        throw new Exception('Identifiant d\'épisode invalide');
                    }
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
     * affiche le message d'erreur
     *
     * @param [string] $errorMessage
     * @return void
     */
    public function error($errorMessage)
    {
        $view = new ControllerViews("Error");
        $view->generate(array('errorMessage' => $erreorMessage));
    }

    /**
     * Recherche le paramètre demandé dans un tableau
     *
     * @param [array] $array
     * @param [string] $name
     * @return void
     */
    public function getParameter($array, $name)
    {
        if (isset($array[$name]))
        {
            return $array[$name];
        }
        else
        {
            throw new Exception('Paramètre' . $name . 'absent');
        }
    }
}