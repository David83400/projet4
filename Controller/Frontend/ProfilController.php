<?php

namespace David\Projet4\Controller\Frontend;

require_once 'Model/Frontend/ProfilManager.php';
require_once 'View/ControllerViews.php';

use David\Projet4\Model\Frontend\ProfilManager;
use David\Projet4\View\ControllerViews;

class ProfilController
{
    private $dataUser;
    
    public function __construct()
    {
        $this->dataUser = new ProfilManager();
    }
    /**
     * display the profil page
     *
     * @param [int] $errors
     * @return void
     */
    public function displayProfil($errors)
    {
        if (isset($_POST['formChangeMdp']))
        {
            $errors = $this->verifyFormChangeMdp($errors);
        }
        $view = new ControllerViews("Frontend/profil");
        $view->generateFrontendViews(array('errors' => $errors));
    }

    /**
     * Method that make verifications in the form to change mdp
     *
     * @param [int] $errors
     * @return void
     */
    public function verifyFormChangeMdp($errors)
    {
        $pseudo = $_SESSION['userPseudo'];
        $oldPass = sha1($_POST['oldPass']);
        $pass = sha1($_POST['newPass']);
        $newPassConfirm = sha1($_POST['newPassConfirm']);
        
        if((!empty($_POST['oldPass'])) && (!empty($_POST['newPass'])) && (!empty($_POST['newPassConfirm'])))
        {
            if($_SESSION['userPass'] == $oldPass)
            {
                if(strlen($_POST['newPass']) >= 8)
                {
                    if($pass == $newPassConfirm)
                    {
                        $this->changeMdp($pseudo, $pass);
                        $_SESSION['userPass'] = $pass;
                        header('Location:index.php');
                        $_SESSION['flash']['success'] = 'Le mot de passe a bien été modifié !';
                    }
                    else
                    {
                        $errors['message'] = "Les mots de passe ne sont pas identiques !";
                    }
                }
                else
                {
                    $errors['message'] = "Le nouveau mot de passe n'est pas valide !";
                }
            }
            else
            {
                $errors['message'] = "L'ancien mot de passe est incorrect !";
            }
        }
        else
        {
            $errors['message'] = "Tous les champs doivent être remplis !";
        }
        return $errors;
    }

    /**
     * Method to change mdp
     *
     * @param [string] $pseudo
     * @param [string] $pass
     * @return void
     */
    public function changeMdp($pseudo, $pass)
    {
        $this->dataUser->updateMdp($pseudo, $pass);
        return $pass;
    }
}