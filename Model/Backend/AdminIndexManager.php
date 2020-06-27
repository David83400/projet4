<?php
namespace David\Projet4\Model\Backend;

require_once 'Model/Manager.php';

use David\Projet4\Model\Manager;

class AdminIndexManager extends Manager
{
    /**
     * Return the episodes list
     *
     * @return void
     */
    public function getEpisodes()
    {
        $sql = 'SELECT id, author, episodeImage, title, content, DATE_FORMAT(creationDate, \'%d %M %Y\') AS creationFrDate, DATE_FORMAT(modificationDate, \'%d %M %Y\') AS modificationFrDate FROM episodes ORDER BY id DESC';
        $episodes = $this->executeRequest($sql);
        return $episodes;
    }

    /**
     * delete the episode selected
     *
     * @param [int] $id
     * @return void
     */
    public function deleteEpisode($id)
    {
        $sql = 'DELETE episodes, episodeComments FROM episodes INNER JOIN episodeComments WHERE episodes.id = ? AND episodeComments.episodeId = episodes.id';
        $req = $this->executeRequest($sql, array($id));
    }
}