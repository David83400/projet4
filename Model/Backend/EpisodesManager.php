<?php
namespace Projet4\Model\Backend;

require_once 'Model/Manager.php';

use Projet4\Model\Manager;

class EpisodesManager extends Manager
{
    /**
     * Return the episodes list
     *
     * @return void
     */
    public function getEpisodes()
    {
        $sql = 'SELECT episodes.id AS id, episodes.author AS author, episodes.episodeImage AS episodeImage, episodes.title AS title, episodes.content AS content, DATE_FORMAT(episodes.creationDate, \'%d/%m/%Y\') AS creationFrDate, DATE_FORMAT(episodes.modificationDate, \'%d/%m/%Y\') AS modificationFrDate, episodeComments.episodeId FROM episodes LEFT JOIN episodeComments ON episodeComments.episodeId = episodes.id GROUP BY episodes.id DESC';
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
        $sql = 'SELECT id, author, episodeImage, title, slug, content, DATE_FORMAT(creationDate, \'%d/%m/%Y\') AS creationFrDate, DATE_FORMAT(modificationDate, \'%d/%m/%Y\') AS modificationFrDate FROM episodes WHERE id = ?';
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
     * Method to create a new episode
     *
     * @param [string] $author
     * @param [string] $title
     * @param [string] $slug
     * @param [string] $content
     * @return void
     */
    public function createEpisode($author, $episodeImage, $title, $slug, $content)
    {
        $sql = 'INSERT INTO episodes(author, episodeImage, title, slug, content, creationDate, modificationDate) VALUES(?, ?, ?, ?, ?, NOW(), NOW())';
        $this->executeRequest($sql, array($author, $episodeImage, $title, $slug, $content));
    }

    /**
     * Method to modify the episode selected
     *
     * @param [string] $title
     * @param [string] $slug
     * @param [string] $content
     * @param [int] $episodeId
     * @return void
     */
    public function updateEpisode($title, $slug, $content, $episodeId)
    {
        $sql = 'UPDATE episodes SET title = ?, slug = ?, content = ?, modificationDate = NOW() WHERE id = ?';
        $req = $this->executeRequest($sql, array($title, $slug, $content, $episodeId));
    }

    /**
     * delete the episode selected with is comments
     *
     * @param [int] $id
     * @param [int] $commentId
     * @return void
     */
    public function deleteEpisodeAndComments($id, $commentId)
    {
        $sql = 'DELETE episodes FROM episodes WHERE episodes.id = ?';
        $req = $this->executeRequest($sql, array($id));
        $sql = 'DELETE episodeComments FROM episodeComments WHERE episodeId = ?';
        $req = $this->executeRequest($sql, array($commentId));
    }
}