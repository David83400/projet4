<?php

namespace Projet4\Controller\Frontend;

require_once 'Model/Frontend/EpisodesManager.php';
require_once 'Model/Frontend/BooksManager.php';
require_once 'View/ControllerViews.php';

use Projet4\Model\Frontend\EpisodesManager;
use Projet4\Model\Frontend\BooksManager;
use Projet4\View\ControllerViews;

class HomeController
{
    private $lastEpisode;
    private $lastBooks;

    public function __construct()
    {
        $this->lastEpisode = new EpisodesManager();
        $this->lastBooks = new BooksManager();
    }

    /**
     *home page display
     *
     * @return void
     */
    public function displayHome()
    {
        $lastEpisode = $this->lastEpisode->getLastEpisode();
        $lastBooks = $this->lastBooks->getLastBooks();
        $view = new ControllerViews("Frontend/home");
        $view->generateFrontendViews(array('lastEpisode' => $lastEpisode, 'lastBooks' => $lastBooks));
    }
}