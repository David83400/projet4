<?php

namespace Projet4\Model\Frontend;

require_once 'Model/Manager.php';

use Projet4\Model\Manager;

/**
  * Manage calls to db for the info users
  *
  * @author  David Roche <davidroche83400@gmail.com
  *
*/
class ProfilManager extends Manager
{
    /**
     * Method to update mdp
     *
     * @param [string] $pseudo
     * @param [string] $pass
     * @return [string]
     */
    public function updateMdp($pseudo, $pass)
    {
        $sql = 'UPDATE users SET pass = ? WHERE pseudo = ?';
        $req = $this->executeRequest($sql, array($pass, $pseudo));
        return $pass;
    }
}