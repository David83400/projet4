<?php

namespace David\Projet4\Controller\Backend;

require_once 'Model/Frontend/ProfilManager.php';
require_once 'View/ControllerViews.php';

use David\Projet4\Model\Frontend\ProfilManager;
use David\Projet4\View\ControllerViews;

class ProfilAdminController
{
    private $dataUser;
    
    public function __construct()
    {
        $this->dataUser = new ProfilManager();
    }
    /**
     * display the profil admin page
     *
     * @return void
     */
    public function displayProfilAdmin($errors)
    {
        if (isset($_POST['formAdminChangeMdp']))
        {
            $errors = $this->verifyFormAdminChangeMdp($errors);
        }
        $view = new ControllerViews("Backend/profilAdmin");
        $view->generateBackendViews(array('errors' => $errors));
    }

    public function verifyFormAdminChangeMdp($errors)
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
                        header('Location:index.php?action=admin');
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

    public function changeMdp($pseudo, $pass)
    {
        $this->dataUser->updateMdp($pseudo, $pass);
        return $pass;
    }
}