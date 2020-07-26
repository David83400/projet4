<?php

namespace Projet4\Model\Frontend;

require_once 'Model/Manager.php';

use Projet4\Model\Manager;

class ProfilManager extends Manager
{
    /**
     * Method to update mdp
     *
     * @param [string] $pseudo
     * @param [string] $pass
     * @return void
     */
    public function updateMdp($pseudo, $pass)
    {
        $sql = 'UPDATE users SET pass = ? WHERE pseudo = ?';
        $req = $this->executeRequest($sql, array($pass, $pseudo));
        return $pass;
    }
}