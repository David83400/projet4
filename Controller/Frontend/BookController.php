<?php

/*namespace projet4\Controller\Frontend;*/
namespace projet4\Controller\Frontend;

require_once 'Model/Frontend/BooksManager.php';
require_once 'Model/Frontend/CommentsManager.php';
require_once 'View/ControllerViews.php';

use projet4\Model\Frontend\BooksManager;
use projet4\Model\Frontend\CommentsManager;
use projet4\View\ControllerViews;

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
        $this->bookComments->postBookComment($author, $bookComment, $bookId);
        $this->displayBook($bookId);
    }

    /**
     * Method to signale a comment associated with a book
     *
     * @param [int] $id
     * @param [int] $bookId
     * @return void
     */
    public function signalBookComment($id, $bookId)
    {
        $this->bookComments->updateBookComment($id, $bookId);
        return $bookId;
    }
}