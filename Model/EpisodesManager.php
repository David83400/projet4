<?php

require_once 'Model/Manager.php';

class EpisodesManager extends Manager
{
    public function getEpisodes()
    {
        $sql = 'SELECT id, author, title, content, creationDate, modificationDate FROM episodes ORDER BY id DESC';
        $episodes = $this->executeRequest($sql);
        return $episodes;
    }

    public function getEpisode($episodeId)
    {
        $sql = 'SELECT id, author, title, content, creationDate, modificationDate FROM episodes WHERE id = ?';
        $episode = $this->executeRequest($sql, array($episodeId));
        if ($episode->rowCount() > 0)
        {
            return $episode->fetch(); // Accès à la première ligne de résultat
        }
        else
        {
            throw new exception ("Aucun épisode ne correspond à l'identifiant '$episodeId'");
        }
    }

    public function getLastEpisode()
    {
        $sql = 'SELECT id, author, title, content, creationDate, modificationDate FROM episodes ORDER BY id DESC LIMIT 1';
        $lastEpisode = $this->executeRequest($sql);
        return $lastEpisode;
    }
}