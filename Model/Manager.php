<?php

namespace David\Projet4\Model;

abstract class Manager

{
    private $db;

    /**
     * Implements a prepared or query request
     *
     * @param [string] $sql
     * @param [mixed] $params
     * @return void
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
     * @return void
     */
    protected function getDb()
    {
        if ($this->db == null)
        {  // Création de la connexion
            $this->db = new \PDO('mysql:host=localhost;dbname=blogforteroche;charset=utf8', 'David', 'introuvable1967');
        }
        return $this->db;
    }
}