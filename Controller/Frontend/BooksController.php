<?php

namespace Projet4\Controller\Frontend;

require_once 'Model/Frontend/BooksManager.php';
require_once 'View/ControllerViews.php';

use Projet4\Model\Frontend\BooksManager;
use Projet4\View\ControllerViews;

/**
  * Manage the list books page
  *
  * @author  David Roche <davidroche83400@gmail.com
  *
*/
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