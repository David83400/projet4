<?php

namespace David\projet4\Controller\Frontend;

require_once 'Model/Frontend/BooksManager.php';
require_once 'Model/Frontend/CommentsManager.php';
require_once 'View/ControllerViews.php';

use David\projet4\Model\Frontend\BooksManager;
use David\projet4\Model\Frontend\CommentsManager;
use David\projet4\View\ControllerViews;

class BookController
{
    private $book;
    private $bookComments;

    public function __construct()
    {
        $this->book = new BooksManager();
        $this->bookComments = new CommentsManager();
    }

    /**
     * display the book details and comments
     *
     * @param [int] $bookId
     * @return void
     */
    public function displayBook($bookId)
    {
        $book = $this->book->getBook($bookId);
        $bookComments = $this->bookComments->getBookComments($bookId);
        $view = new ControllerViews("Frontend/book");
        $view->generateFrontendViews(array('book' => $book, 'bookComments' => $bookComments));
    }

    /**
     * Add a comment associated with a book
     *
     * @param [type] $author
     * @param [type] $bookComment
     * @param [type] $bookId
     * @return void
     */
    public function addBookComment($author, $bookComment, $bookId)
    {
        // Sauvegarde du commentaire
        $this->bookComments->postBookComment($author, $bookComment, $bookId);
        // Actualisation de l'affichage du billet
        $this->displayBook($bookId);
    }
}