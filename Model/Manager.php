<?php

namespace Projet4\Model;

/**
  * Manage calls to db
  *
  * @author  David Roche <davidroche83400@gmail.com
  *
*/
abstract class Manager
{
    private $db;

    /**
     * Implements a prepared or query request
     *
     * @param [string] $sql
     * @param [mixed] $params
     * @return [mixed]
     */
    protected function executeRequest($sql, $params = null)
    {
        if ($params == null)
        {
            $result = $this->getDb()->query($sql); // exécution directe
        }
        else
        {
            $result = $this->getDb()->prepare($sql); // requête préparée
            $result->execute($params);
        }
        return $result;
    }

    /**
     * Database connexion
     *
     * @return [mixed]
     */
    protected function getDb()
    {
        if ($this->db == null)
        {
            $this->db = new \PDO('mysql:host=localhost;dbname=blogforteroche;charset=utf8', 'David', 'introuvable1967', array(\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION));
        }
        return $this->db;
    }
}