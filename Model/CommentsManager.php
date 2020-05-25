<?php

namespace David\Projet4\Model;

require_once 'Model/Manager.php';

class CommentsManager extends Manager
{
    /**
     * Returns the list of comments associated with an episode
     *
     * @param [int] $episodeId
     * @return void
     */
    public function getComments($episodeId)
    {
        $sql = 'SELECT id, author, comment, DATE_FORMAT(commentDate, \'%W %d %M %Y à %H h %i min %s s\') AS commentFrDate FROM comments WHERE episodeId=? ORDER BY id DESC';
        $comments = $this->executeRequest($sql, array($episodeId));
        return $comments;
    }

    public function postComment($author, $comment, $episodeId)
    {
        $sql = 'INSERT INTO comments(author, comment, episodeId, commentDate) VALUES(?, ?, ?, NOW())';
        
        $this->executeRequest($sql, array($author, $comment, $episodeId));
    }
}