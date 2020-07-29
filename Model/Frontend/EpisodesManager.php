<?php

namespace Projet4\Model\Frontend;

require_once 'Model/Manager.php';

use Projet4\Model\Manager;

/**
  * Manage calls to db for the episodes
  *
  * @author  David Roche <davidroche83400@gmail.com
  *
*/
class EpisodesManager extends Manager
{
    /**
     * Return the episodes list
     *
     * @return [mixed]
     */
    public function getEpisodes()
    {
        $sql = 'SELECT id, author, episodeImage, title, content, DATE_FORMAT(creationDate, \'%d/%m/%Y\') AS creationFrDate, DATE_FORMAT(modificationDate, \'%d/%m/%y\') AS modificationFrDate FROM episodes ORDER BY id DESC';
        $episodes = $this->executeRequest($sql);
        return $episodes;
    }

    /**
     * Return the requested episode
     *
     * @param [int] $episodeId
     * @return [mixed]
     */
    public function getEpisode($episodeId)
    {
        $sql = 'SELECT id, author, episodeImage, title, content, DATE_FORMAT(creationDate, \'%d/%m/%Y\') AS creationFrDate, DATE_FORMAT(modificationDate, \'%d/%m/%y\') AS modificationFrDate FROM episodes WHERE id = ?';
        $episode = $this->executeRequest($sql, array($episodeId));
        if ($episode->rowCount() > 0)
        {
            return $episode->fetch(); // Accès à la première ligne de résultat
        }
        else
        {
            throw new \exception ("Aucun épisode ne correspond à l'identifiant '$episodeId'");
        }
    }

    /**
     * Return the last episode
     * 
     * @return [mixed]
     */
    public function getLastEpisode()
    {
        $sql = 'SELECT id, author, title, content, DATE_FORMAT(creationDate, \'%d/%m/%Y\') AS creationFrDate, DATE_FORMAT(modificationDate, \'%d/%m/%y\') AS modificationFrDate FROM episodes ORDER BY id DESC LIMIT 1';
        $lastEpisode = $this->executeRequest($sql);
        return $lastEpisode;
    }
}