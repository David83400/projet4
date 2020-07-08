<?php

namespace David\Projet4\Controller\Frontend;

require_once 'Model/Frontend/ConnexionManager.php';
require_once 'View/ControllerViews.php';

use David\Projet4\Model\Frontend\ConnexionManager;
use David\Projet4\View\ControllerViews;

class ConnexionController
{
    private $users;
    
    public function __construct()
    {
        $this->users = new ConnexionManager();
    }

    /**
     * display the connexion page
     *
     * @return void
     */
    public function displayConnexion($errors)
    {
        $view = new ControllerViews("Frontend/connexion");
        $view->generateFrontendViews(array('errors' => $errors));
    }

    public function displayErrors($errors)
    {
        $this->displayConnexion($errors);
    }
    
    /**
     * method that return the pseudo checked in bdd to compare with data post
     *
     * @param [string] $pseudo
     * @return void
     */
    public function verifyPseudoUser($pseudo)
    {
       $userPseudo = $this->users->selectPseudoUser($pseudo);
       return $userPseudo;
    }
    
    /**
     * method that return the email checked in bdd to compare with data post
     *
     * @return void
     */
    public function verifyMailUser($email)
    {
       $userMail = $this->users->selectMailUser($email);
       return $userMail;
    }

    /**
     *  return the infos user selected in bdd to compare with data post
     *
     * @param [type] $pseudo
     * @param [type] $pass
     * @return void
     */
    public function confirmUser($pseudo, $pass)
    {
        $userInfo = $this->users->compareUser($pseudo, $pass);
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
    public function addUser($pseudo, $pass, $email)
    {
        $this->users->createUser($pseudo, $pass, $email);
    }
}