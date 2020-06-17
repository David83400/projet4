<?php

namespace David\Projet4\Model;

require_once 'Model/Manager.php';

class ProfilManager extends Manager
{
    public function updateMdp($pseudo, $pass)
    {
        $sql = 'UPDATE users SET pass = ? WHERE pseudo = ?';
        $req = $this->executeRequest($sql, array($pass, $pseudo));
        var_dump($pseudo);
        var_dump($pass);
        return $pass;
    }
}