<?php

class Manager
{
    private $db;

    protected function executeRequest($sql, $params = null)
    {
        if ($params == null)
        {
            $result = $this->getDb()->query($sql);
        }
        else
        {
            $result = $this->getDb()->prepare($sql);
            $result->execute($params);
        }
        return $result;
    }

    private function getDb()
    {
        if ($this->$db == null)
        {
            $this->db = new PDO('mysql:host=localhost;dbname=blogforteroche;charset=utf8', 'David', 'introuvable1967', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }
    }
}