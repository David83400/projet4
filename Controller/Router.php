<?php

namespace David\Projet4\Controller;

require_once 'Controller/Frontend/HomeController.php';
require_once 'Controller/Frontend/BooksController.php';
require_once 'Controller/Frontend/BookController.php';
require_once 'Controller/Frontend/EpisodesController.php';
require_once 'Controller/Frontend/EpisodeController.php';
require_once 'Controller/Frontend/AuthorController.php';
require_once 'View/ControllerViews.php';

use David\Projet4\Controller\Frontend\HomeController;
use David\Projet4\Controller\Frontend\BooksController;
use David\Projet4\Controller\Frontend\BookController;
use David\Projet4\Controller\Frontend\EpisodesController;
use David\Projet4\Controller\Frontend\EpisodeController;
use David\Projet4\Controller\Frontend\AuthorController;
use David\Projet4\View\ControllerViews;

class Router
{
    private $homeControl;
    private $booksControl;
    private $bookControl;
    private $episodesControl;
    private $episodeControl;
    private $authorControl;

    public function __construct()
    {
        $this->homeControl = new HomeController();
        $this->booksControl = new BooksController();
        $this->bookControl = new BookController();
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
        try 
        {
            if (isset($_GET['action']))
            {
                if ($_GET['action'] == 'author')
                {
                    $this->authorControl->displayAuthor();
                }
                elseif ($_GET['action'] == 'books')
                {
                    $this->booksControl->displayBooks();
                }
                elseif ($_GET['action'] == 'book')
                {
                    $bookId = intval($this->getParameter($_GET, 'id'));
                    if ($bookId > 0)
                    {
                        $this->bookControl->displayBook($bookId);
                    }
                    else
                    {
                        throw new \Exception('Identifiant de roman invalide');
                    }
                }
                elseif ($_GET['action'] == 'bookComment')
                {
                    $author = $this->getParameter($_POST, 'author');
                    $bookComment = $this->getParameter($_POST, 'bookComment');
                    $bookId = $this->getParameter($_POST, 'id');
                    $this->bookControl->addBookComment($author, $bookComment, $bookId);
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
                        throw new \Exception('Identifiant d\'épisode invalide');
                    }
                }
                elseif ($_GET['action'] == 'episodeComment')
                {
                    $author = $this->getParameter($_POST, 'author');
                    $episodeComment = $this->getParameter($_POST, 'episodeComment');
                    $episodeId = $this->getParameter($_POST, 'id');
                    $this->episodeControl->addEpisodeComment($author, $episodeComment, $episodeId);
                }
                else
                {
                    throw new \Exception('Action non valide');
                }
            }
            else
            {
                $this->homeControl->displayHome();
            }
        }
        catch (\Exception $e)
        {
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
            throw new \Exception("Paramètre '$name' absent");
        }  
    }
}