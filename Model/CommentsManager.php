<?php

require_once 'Model/Manager.php';

class CommentsManager extends Manager
{
    // Renvoie la liste des commentaires associés à un billet
    public function getComments($episodeId)
    {
        $sql = 'SELECT id, author, comment, commentDate FROM comments WHERE episodeId=? ORDER BY id DESC';
        $comments = $this->executeRequest($sql, array($episodeId));
        return $comments;
    }
}