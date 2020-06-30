<?php

namespace David\Projet4\Model\Backend;

require_once 'Model/Manager.php';

use David\Projet4\Model\Manager;

class ModifyEpisodeManager extends Manager
{
    /**
     * Return the requested episode
     *
     * @param [int] $episodeId
     * @return void
     */
    public function getEpisode($episodeId)
    {
        $sql = 'SELECT id, author, episodeImage, title, slug, content, DATE_FORMAT(creationDate, \'%W %d %M %Y\') AS creationFrDate, DATE_FORMAT(modificationDate, \'%W %d %M %Y\') AS modificationFrDate FROM episodes WHERE id = ?';
        $episode = $this->executeRequest($sql, array($episodeId));
        if ($episode->rowCount() > 0)
        {
            return $episode->fetch();
        }
        else
        {
            throw new \exception ("Aucun épisode ne correspond à l'identifiant '$episodeId'");
        }
    }

    /**
     * Returns the list of comments associated with an episode
     *
     * @param [int] $episodeId
     * @return void
     */
    public function getEpisodeComments($episodeId)
    {
        $sql = 'SELECT id, author, episodeComment, episodeId, DATE_FORMAT(commentDate, \'%d %M %Y\') AS commentFrDate FROM episodeComments WHERE episodeId=? ORDER BY id DESC';
        $episodeComments = $this->executeRequest($sql, array($episodeId));
        return $episodeComments;
    }

    public function updateEpisode($title, $slug, $content, $episodeId)
    {
        $sql = 'UPDATE episodes SET title = ?, slug = ?, content = ?, modificationDate = now() WHERE id = ?';
        $req = $this->executeRequest($sql, array($title, $slug, $content, $episodeId));
    }
}