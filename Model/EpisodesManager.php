<?php

require_once 'Model/Manager.php';

class EpisodesManager extends Manager
{
    public function getEpisodes()
    {
        $sql = 'SELECT id, author, title, content, creationDate, modificationDate FROM posts ORDER BY id DESC';
        $episodes = $this->executeRequest($sql);
        return $episodes;
    }

    public function getEpisode($episodeId)
    {
        $sql = 'SELECT id, author, title, content, creationDate, modificationDate FROM posts WHERE id = ?';
        $episode = $this->executeRequest($sql, array($episodeId));
        if ($episode->rowCount() > 0)
        {
            return $episodes->fetch();
        }
        else
        {
            throw new exception ("Aucun épisode ne correspond à l'identifiant '$episodeId'");
        }
    }

    public function getLastEpisode()
    {
        $sql = 'SELECT id, author, title, content, creationDate, modificationDate FROM posts WHERE id = MAX(id)';
        $lastEpisode = $this->executeRequest($sql);
        return $lastEpisode;
    }
}