<?php

namespace David\Projet4\Model\Frontend;

require_once 'Model/Manager.php';

use David\Projet4\Model\Manager;

class CommentsManager extends Manager
{
    /**
     * Returns the list of comments associated with an episode
     *
     * @param [int] $episodeId
     * @return void
     */
    public function getEpisodeComments($episodeId)
    {
        $sql = 'SELECT id, author, episodeComment, episodeId, DATE_FORMAT(commentDate, \'%W %d %M %Y à %H h %i min %s s\') AS commentFrDate FROM episodeComments WHERE episodeId=? ORDER BY id DESC';
        $episodeComments = $this->executeRequest($sql, array($episodeId));
        return $episodeComments;
    }

    /**
     * Insert into bdd an episode comment
     *
     * @param [string] $author
     * @param [string] $episodeComment
     * @param [string] $episodeId
     * @return void
     */
    public function postEpisodeComment($author, $episodeComment, $episodeId)
    {
        $sql = 'INSERT INTO episodeComments(author, episodeComment, episodeId, flag, commentDate) VALUES(?, ?, ?, 0, NOW())';
        $this->executeRequest($sql, array($author, $episodeComment, $episodeId));
    }



    /**
     * Returns the list of comments associated with a book
     *
     * @param [int] $bookId
     * @return void
     */
    public function getBookComments($bookId)
    {
        $sql = 'SELECT id, author, bookComment, bookId, DATE_FORMAT(commentDate, \'%W %d %M %Y à %H h %i min %s s\') AS commentFrDate FROM bookComments WHERE bookId=? ORDER BY id DESC';
        $bookComments = $this->executeRequest($sql, array($bookId));
        return $bookComments;
    }

    /**
     * Insert into bdd a book comment
     *
     * @param [type] $author
     * @param [type] $bookComment
     * @param [type] $bookId
     * @return void
     */
    public function postBookComment($author, $bookComment, $bookId)
    {
        $sql = 'INSERT INTO bookComments(author, bookComment, bookId, flag, commentDate) VALUES(?, ?, ?, 0, NOW())';
        $this->executeRequest($sql, array($author, $bookComment, $bookId));
    }

    public function updateBookComment($id, $bookId)
    {
        $sql = 'SELECT bookId FROM bookComments WHERE id=?';
        $bookId = $this->executeRequest($sql, array($bookId));
        $sql = 'UPDATE bookComments SET flag = 1 WHERE id = ?';
        $req = $this->executeRequest($sql, array($id));
    }

    public function updateEpisodeComment($id, $episodeId)
    {
        $sql = 'SELECT episodeId FROM episodeComments WHERE id=?';
        $episodeId = $this->executeRequest($sql, array($episodeId));
        $sql = 'UPDATE episodeComments SET flag = 1 WHERE id = ?';
        $req = $this->executeRequest($sql, array($id));
    }
}