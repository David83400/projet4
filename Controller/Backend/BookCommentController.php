<?php

namespace Projet4\Controller\Backend;

require_once 'Model/Backend/CommentsManager.php';
require_once 'View/ControllerViews.php';

use Projet4\Model\Backend\CommentsManager;
use Projet4\View\ControllerViews;

class BookCommentController
{
    private $editComment;
    
    public function __construct()
    {
        $this->editComment = new CommentsManager();
    }

    /**
     * Display the signaled comments page
     *
     * @param [int] $commentId
     * @return void
     */
    public function displayBookComment($commentId)
    {
        $bookComments = $this->editComment->getSignaledBookComment($commentId);
        $view = new ControllerViews("Backend/bookComment");
        $view->generateBackendViews(array('bookComments' => $bookComments));
    }

    /**
     * Method to accept a signaled comment
     *
     * @param [int] $commentId
     * @return void
     */
    public function acceptBookComment($commentId)
    {
        $this->editComment->updateBookComment($commentId);
    }

    /**
     * Method to delete a signaled comment
     *
     * @param [int] $commentId
     * @return void
     */
    public function removeBookComment($commentId)
    {
        $this->editComment->deleteBookComment($commentId);
    }
}