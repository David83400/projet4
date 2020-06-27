<?php

namespace David\Projet4\Controller\Frontend;

require_once 'Model/Frontend/BooksManager.php';
require_once 'View/ControllerViews.php';

use David\Projet4\Model\Frontend\BooksManager;
use David\Projet4\View\ControllerViews;

class BooksController
{
    private $books;

    public function __construct()
    {
        $this->books = new BooksManager();
    }
    
    /**
     * display a list of all books
     *
     * @return void
     */
    public function displayBooks()
    {
        $books = $this->books->getBooks();
        $view = new ControllerViews("Frontend/books");
        $view->generateFrontendViews(array('books' => $books));
    }
}