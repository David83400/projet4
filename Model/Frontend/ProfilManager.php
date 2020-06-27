<?php

namespace David\Projet4\Model\Frontend;

require_once 'Model/Manager.php';

use David\Projet4\Model\Manager;

class ProfilManager extends Manager
{
    public function updateMdp($pseudo, $pass)
    {
        $sql = 'UPDATE users SET pass = ? WHERE pseudo = ?';
        $req = $this->executeRequest($sql, array($pass, $pseudo));
        return $pass;
    }
}