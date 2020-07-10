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
        if (isset($_POST['formConnect']))
        {
            $errors = $this->verifyFormConnect();
        }
        elseif (isset($_POST['formCreate']))
        {
            $errors = $this->verifyFormCreate();
        }
        $view = new ControllerViews("Frontend/connexion");
        $view->generateFrontendViews(array('errors' => $errors));
    }

    /**
     * Method that make verifications in the form connect
     *
     * @return void
     */
    public function verifyFormConnect()
    {
        if ((!empty($_POST['pseudo'])) && (!empty($_POST['pass'])))
        {
            $pseudo = $_POST['pseudo'];
            $pass = sha1($_POST['pass']);

            $userInfo = $this->confirmUser($pseudo, $pass);
            if ($userInfo)
            {
                $_SESSION['userId'] = $userInfo['id'];
                $_SESSION['userPseudo'] = $userInfo['pseudo'];
                $_SESSION['userEmail'] = $userInfo['email'];
                $_SESSION['userPass'] = $userInfo['pass'];
                $_SESSION['userAdmin'] = $userInfo['isAdmin'];
                $_SESSION['userInscriptionDate'] = $userInfo['inscriptionFrDate'];
                if($_SESSION['userAdmin'] == 1)
                {
                    header('Location:index.php?action=admin');
                    $_SESSION['flash']['success'] = 'Vous êtes maintenant connecté !';
                }
                else
                {
                    header('location:index.php');
                    $_SESSION['flash']['success'] = 'Vous êtes maintenant connecté !';
                }
            }
            else
            {
                $errors['pseudo'] = "Pseudo ou mot de passe incorrect !";
            }
        }
        else
        {
            $errors['pseudo'] = "Veuillez remplir tous les champs !";  
        }
        return $errors;
    }

    /**
     * Method that make verifications in the form create
     *
     * @return void
     */
    public function verifyFormCreate()
    {
        $pseudo = $_POST['pseudo'];
        $pass = sha1($_POST['pass']);
        $email = $_POST['email'];

        if ((!empty($_POST['pseudo'])) && (!empty($_POST['pass'])) && (!empty($_POST['passConfirm'])) && (!empty($_POST['email'])))
        {
            if ((strlen($_POST['pseudo']) >= 5) && (strlen($_POST['pseudo']) < 20))
            {
                if (preg_match('/^[a-zA-Z0-9_]+$/', $_POST['pseudo']))
                {
                    $userPseudo = $this->verifyPseudoUser($pseudo);
                    if ($userPseudo == false)
                    {
                        if (strlen($_POST['pass']) >= 8)
                        {
                            if ($_POST['pass'] == $_POST['passConfirm'])
                            {
                                if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
                                {
                                    $userMail = $this->verifyMailUser($email);
                                    if($userMail == false)
                                    {
                                        if(empty($errors))
                                        {
                                            $this->addUser($pseudo, $pass, $email);
                                            $userInfo = $this->confirmUser($pseudo, $pass);

                                            if ($userInfo)
                                            {
                                                $_SESSION['userId'] = $userInfo['id'];
                                                $_SESSION['userPseudo'] = $userInfo['pseudo'];
                                                $_SESSION['userEmail'] = $userInfo['email'];
                                                $_SESSION['userPass'] = $userInfo['pass'];
                                                $_SESSION['userAdmin'] = $userInfo['isAdmin'];
                                                $_SESSION['userInscriptionDate'] = $userInfo['inscriptionFrDate'];
                                                header('location:index.php');
                                                $_SESSION['flash']['success'] = 'Votre compte a bien été créé !';
                                            }
                                            else
                                            {
                                                $errors['message'] = "Un problème est survenu, veuillez réessayer !";
                                            }
                                        }
                                    }
                                    else
                                    {
                                        $errors['email'] = "Cet email est déja utilisé pour un autre compte !";
                                    }
                                }
                                else
                                {
                                    $errors['email'] = "Votre email n'est pas valide !";
                                }
                            }
                            else
                            {
                                $errors['pass'] = "Les mots de passe ne correspondent pas !";
                            }
                        }
                        else
                        {
                            $errors['pass'] = "Les mots de passe ne sont pas valides !";
                        }
                    }
                    else
                    {
                        $errors['pseudo'] = "Ce pseudo est déja utilisé !";
                    }
                }
                else
                {
                    $errors['pseudo'] = "Votre pseudo n'est pas valide !";
                }
            }
            else
            {
                $errors['pseudo'] = "Le pseudo choisi n'est pas valide !";
            }
        }
        else
        {
            $errors['message'] = "Veuillez remplir tous les champs !"; 
        }
        return $errors;
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