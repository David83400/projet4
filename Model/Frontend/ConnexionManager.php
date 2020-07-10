<?php

namespace David\Projet4\Model\Frontend;

require_once 'Model/Manager.php';

use David\Projet4\Model\Manager;

class ConnexionManager extends Manager
{
    /**
     * method to verify if the post pseudo is not in bdd
     *
     * @param [string] $pseudo
     * @return void
     */
    public function selectPseudoUser($pseudo)
    {
        $sql = 'SELECT id FROM users WHERE pseudo = ?';
        $req = $this->executeRequest($sql, array($pseudo));
        $userPseudo = $req->fetch();
        return $userPseudo;
    }

    /**
     *  method to verify if the post emeil is not in bdd
     *
     * @param [string] $email
     * @return void
     */
    public function selectMailUser($email)
    {
        $sql = 'SELECT id FROM users WHERE email = ?';
        $req = $this->executeRequest($sql, array($email));
        $userMail = $req->fetch();
        return $userMail;
    }

    /**
     * method that select the infos user in bdd to compare with data post
     *
     * @param [string] $pseudo
     * @param [string] $pass
     * @return void
     */
    public function compareUser($pseudo, $pass)
    {
        $sql = 'SELECT id, pseudo, email, pass, isAdmin, DATE_FORMAT(inscriptionDate, \'%d/%m/%Y\') AS inscriptionFrDate FROM users WHERE pseudo = ? AND pass = ?';
        $req = $this->executeRequest($sql, array($pseudo, $pass));
        $userInfo = $req->fetch();
        return $userInfo;
    }

    /**
     * method to create user
     *
     * @param [string] $pseudo
     * @param [string] $pass
     * @param [string] $email
     * @return void
     */
    public function createUser($pseudo, $pass, $email)
    {
        $sql = 'INSERT INTO users(pseudo, pass, email, isAdmin, inscriptionDate) VALUES(?, ?, ?, 0, NOW())';
        $this->executeRequest($sql, array($pseudo, $pass, $email));
    }
}