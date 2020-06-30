<?php
namespace David\Projet4\Model\Backend;

require_once 'Model/Manager.php';

use David\Projet4\Model\Manager;

class EpisodesCommentsManager extends Manager
{
    /**
     * return an episode comment signaled
     *
     * @return void
     */
    public function getEpisodeCommentSignaled()
    {
        $sql = 'SELECT episodeComments.id AS commentId, episodeComments.author AS commentAuthor, episodeComments.episodeComment AS comment, DATE_FORMAT(episodeComments.commentDate, \'%d %M %Y\') AS episodeCommentFrDate, episodes.title AS title, COUNT(*) AS nbComments FROM episodeComments INNER JOIN episodes ON episodeComments.flag = 1 AND episodeComments.episodeId = episodes.id';
        $episodeCommentsSignaled = $this->executeRequest($sql);
        return $episodeCommentsSignaled;
    }

    /**
     * Display an episode comment signaled on the edit comment page
     *
     * @param [int] $commentId
     * @return void
     */
    public function getEpisodeComments($commentId)
    {
        $sql = 'SELECT id, author, episodeComment, DATE_FORMAT(commentDate, \'%W %d %M %Y à %H h %i min %s s\') AS commentFrDate FROM episodeComments WHERE id=?';
        $bookComments = $this->executeRequest($sql, array($commentId));
        return $bookComments;
    }

    /**
     * Method to accept an episode comment signaled
     *
     * @param [int] $commentId
     * @return void
     */
    public function updateEpisodeCommentSignaled($commentId)
    {
        $sql = 'UPDATE episodeComments SET flag = 0 WHERE id = ?';
        $req = $this->executeRequest($sql, array($commentId));
    }

    /**
     * Method to delete an episode comment signaled
     *
     * @param [int] $commentId
     * @return void
     */
    public function deleteComments($commentId)
    {
        $sql = 'DELETE episodeComments FROM episodeComments WHERE episodeComments.id = ?';
        $req = $this->executeRequest($sql, array($commentId));
    }
}