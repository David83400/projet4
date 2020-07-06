<?php
namespace David\Projet4\Model\Backend;

require_once 'Model/Manager.php';

use David\Projet4\Model\Manager;

class CommentsManager extends Manager
{
    /**
     * return a book comment signaled to the adminIndexController
     *
     * @return void
     */
    public function getSignaledBookComments()
    {
        $sql = 'SELECT bookComments.id AS commentId, bookComments.author AS commentAuthor, bookComments.bookComment AS comment, DATE_FORMAT(bookComments.commentDate, \'%d %M %Y\') AS commentFrDate, books.title AS title, COUNT(*) AS nbComments FROM bookComments INNER JOIN books ON bookComments.flag = 1 AND bookComments.bookId = books.id';
        $signaledComments = $this->executeRequest($sql);
        return $signaledComments;
    }

    /**
     * return an episode comment signaled to the adminIndexController
     *
     * @return void
     */
    public function getSignaledEpisodeComments()
    {
        $sql = 'SELECT episodeComments.id AS commentId, episodeComments.author AS commentAuthor, episodeComments.episodeComment AS comment, DATE_FORMAT(episodeComments.commentDate, \'%d %M %Y\') AS commentFrDate, episodes.title AS title, COUNT(*) AS nbComments FROM episodeComments INNER JOIN episodes ON episodeComments.flag = 1 AND episodeComments.episodeId = episodes.id';
        $signaledComments = $this->executeRequest($sql);
        return $signaledComments;
    }

    /**
     * Display a signaled episode comment on the edit comment page
     *
     * @param [int] $commentId
     * @return void
     */
    public function getSignaledEpisodeComment($commentId)
    {
        $sql = 'SELECT episodeComments.id AS commentId, episodeComments.author AS commentAuthor, episodeComments.episodeComment AS comment, DATE_FORMAT(episodeComments.commentDate, \'%d %M %Y\') AS commentFrDate FROM episodeComments WHERE id = ?';
        $episodeComment = $this->executeRequest($sql, array($commentId));
        return $episodeComment;
    }

    /**
     * Display a signaled book comment on the edit comment page
     *
     * @param [int] $commentId
     * @return void
     */
    public function getSignaledBookComment($commentId)
    {
        $sql = 'SELECT bookComments.id AS commentId, bookComments.author AS commentAuthor, bookComments.bookComment AS comment, DATE_FORMAT(bookComments.commentDate, \'%d %M %Y\') AS commentFrDate FROM bookComments WHERE id = ?';
        $bookComments = $this->executeRequest($sql, array($commentId));
        return $bookComments;
    }

    /**
     * Method to accept an episode comment signaled
     *
     * @param [int] $commentId
     * @return void
     */
    public function updateEpisodeComment($commentId)
    {
        $sql = 'UPDATE episodeComments SET flag = 0 WHERE id = ?';
        $req = $this->executeRequest($sql, array($commentId));
    }

    /**
     * Method to accept a book comment signaled
     *
     * @param [int] $commentId
     * @return void
     */
    public function updateBookComment($commentId)
    {
        $sql = 'UPDATE bookComments SET flag = 0 WHERE id = ?';
        $req = $this->executeRequest($sql, array($commentId));
    }

    /**
     * Method to delete an episode comment
     *
     * @param [int] $commentId
     * @return void
     */
    public function deleteEpisodeComment($commentId)
    {
        $sql = 'DELETE episodeComments FROM episodeComments WHERE id = ?';
        $req = $this->executeRequest($sql, array($commentId));
    }

    /**
     * Method to delete a book comment
     *
     * @param [int] $commentId
     * @return void
     */
    public function deleteBookComment($commentId)
    {
        $sql = 'DELETE bookComments FROM bookComments WHERE id = ?';
        $req = $this->executeRequest($sql, array($commentId));
    }
}