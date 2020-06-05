<?php

namespace David\Projet4\Model;

require_once 'Model/Manager.php';

class EpisodesManager extends Manager
{
    /**
     * Return the episodes list
     *
     * @return void
     */
    public function getEpisodes()
    {
        $sql = 'SELECT id, author, episodeImage, title, content, DATE_FORMAT(creationDate, \'%W %d %M %Y\') AS creationFrDate, DATE_FORMAT(modificationDate, \'%d/%m/%y\') AS modificationFrdate FROM episodes ORDER BY id DESC';
        $episodes = $this->executeRequest($sql);
        return $episodes;
    }

    /**
     * Return the requested episode
     *
     * @param [int] $episodeId
     * @return void
     */
    public function getEpisode($episodeId)
    {
        $sql = 'SELECT id, author, episodeImage, title, content, DATE_FORMAT(creationDate, \'%W %d %M %Y\') AS creationFrDate, DATE_FORMAT(modificationDate, \'%d/%m/%y\') AS modificationFrDate FROM episodes WHERE id = ?';
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
     */
    public function getLastEpisode()
    {
        $sql = 'SELECT id, author, title, content, DATE_FORMAT(creationDate, \'%W %d %M %Y\') AS creationFrDate, DATE_FORMAT(modificationDate, \'%d/%m/%y\') AS modificationFrDate FROM episodes ORDER BY id DESC LIMIT 1';
        $lastEpisode = $this->executeRequest($sql);
        return $lastEpisode;
    }
}