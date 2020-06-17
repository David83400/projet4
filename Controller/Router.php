<?php

namespace David\Projet4\Controller;

require_once 'Controller/Frontend/HomeController.php';
require_once 'Controller/Frontend/ConnexionController.php';
require_once 'Controller/Frontend/ProfilController.php';
require_once 'Controller/Frontend/BooksController.php';
require_once 'Controller/Frontend/BookController.php';
require_once 'Controller/Frontend/EpisodesController.php';
require_once 'Controller/Frontend/EpisodeController.php';
require_once 'Controller/Frontend/AuthorController.php';
require_once 'Controller/Frontend/ContactController.php';
require_once 'View/ControllerViews.php';

use David\Projet4\Controller\Frontend\HomeController;
use David\Projet4\Controller\Frontend\ConnexionController;
use David\Projet4\Controller\Frontend\ProfilController;
use David\Projet4\Controller\Frontend\BooksController;
use David\Projet4\Controller\Frontend\BookController;
use David\Projet4\Controller\Frontend\EpisodesController;
use David\Projet4\Controller\Frontend\EpisodeController;
use David\Projet4\Controller\Frontend\AuthorController;
use David\Projet4\Controller\Frontend\ContactController;
use David\Projet4\View\ControllerViews;

class Router
{
    private $homeControl;
    private $connexionControl;
    private $profilControl;
    private $booksControl;
    private $bookControl;
    private $episodesControl;
    private $episodeControl;
    private $authorControl;
    private $contactControl;

    public function __construct()
    {
        $this->homeControl = new HomeController();
        $this->connexionControl = new ConnexionController();
        $this->profilControl = new ProfilController();
        $this->booksControl = new BooksController();
        $this->bookControl = new BookController();
        $this->episodesControl = new EpisodesController();
        $this->episodeControl = new EpisodeController();
        $this->authorControl = new AuthorController();
        $this->contactControl = new ContactController();
    }
    
    /**
     * Route the incoming request and execute the associated action
     *
     * @return void
     */
    public function routerRequest()
    {
        try 
        {
            if (isset($_GET['action']))
            {
                $errors = [];
                $successMessage = array();
                
                if ($_GET['action'] == 'connexion')
                {
                    $this->connexionControl->displayConnexion();

                    if (isset($_POST['formCreate']))
                    {
                        $pseudo = $this->getParameter($_POST, 'pseudo');
                        $pass = sha1($_POST['pass']);
                        $email = $this->getParameter($_POST, 'email');

                        if ((!empty($_POST['pseudo'])) && (!empty($_POST['pass'])) && (!empty($_POST['passConfirm'])) && (!empty($_POST['email'])))
                        {
                            if (strlen($_POST['pseudo']) < 20)
                            {
                                if (preg_match('/^[a-zA-Z0-9_]+$/', $_POST['pseudo']))
                                {
                                    $userPseudo = $this->connexionControl->verifyPseudoUser($pseudo);
                                    if ($userPseudo == false)
                                    {
                                        if ($_POST['pass'] == $_POST['passConfirm'])
                                        {
                                            if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
                                            {
                                                $userMail = $this->connexionControl->verifyMailUser($email);
                                                if($userMail == false)
                                                {
                                                    if(empty($errors))
                                                    {
                                                        $this->connexionControl->addUser($pseudo, $pass, $email);
                                                        $userInfo = $this->connexionControl->confirmUser($pseudo, $pass);

                                                        if ($userInfo)
                                                        {
                                                            $_SESSION['userId'] = $userInfo['id'];
                                                            $_SESSION['userPseudo'] = $userInfo['pseudo'];
                                                            $_SESSION['userEmail'] = $userInfo['email'];
                                                            $_SESSION['userPass'] = $userInfo['pass'];
                                                            $_SESSION['userAdmin'] = $userInfo['isAdmin'];
                                                            $_SESSION['userInscriptionDate'] = $userInfo['inscriptionFrDate'];
                                                            $successMessage['message'] = 'Votre compte a bien été créé !';
                                                            var_dump($successMessage);
                                                            //header('location:index.php');
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
                                $errors['pseudo'] = "Le pseudo choisi est trop long !";
                            }
                        }
                        else
                        {
                            $errors['message'] = "Veuillez remplir tous les champs !"; 
                        }
                        var_dump($errors);
                    }
                    elseif (isset($_POST['formConnect']))
                    {
                        $pseudo = $this->getParameter($_POST, 'pseudo');
                        $pass = sha1($_POST['pass']);

                        if ((!empty($_POST['pseudo'])) && (!empty($_POST['pass'])))
                        {
                            $userInfo = $this->connexionControl->confirmUser($pseudo, $pass);
                            if ($userInfo)
                            {
                                $_SESSION['userId'] = $userInfo['id'];
                                $_SESSION['userPseudo'] = $userInfo['pseudo'];
                                $_SESSION['userEmail'] = $userInfo['email'];
                                $_SESSION['userPass'] = $userInfo['pass'];
                                $_SESSION['userAdmin'] = $userInfo['isAdmin'];
                                $_SESSION['userInscriptionDate'] = $userInfo['inscriptionFrDate'];
                                $successMessage['message'] = 'Vous êtes maintenant connecté !';
                                //header('location:index.php');
                                var_dump($successMessage);
                                var_dump($_SESSION);
                            }
                            else
                            {
                                $errors['message'] = "Email ou mot de passe incorrect !";
                            }
                        }
                        else
                        {
                            $errors['message'] = "Veuillez remplir tous les champs !";  
                        }
                        var_dump($errors);
                    }
                }
                elseif ($_GET['action'] == 'profil')
                {
                    $this->profilControl->displayProfil();
                    if (isset($_POST['formChangeMdp']))
                    {
                        $pseudo = $_SESSION['userPseudo'];
                        $oldPass = sha1($_POST['oldPass']);
                        $pass = sha1($_POST['newPass']);
                        $newPassConfirm = sha1($_POST['newPassConfirm']);
                        
                        if($_SESSION['userPass'] == $oldPass)
                        {
                            if($pass == $newPassConfirm)
                            {
                                $this->profilControl->changeMdp($pseudo, $pass);
                                $_SESSION['userPass'] = $pass;
                                $successMessage['message'] = 'Le mot de passe a bien été modifié !';
                                var_dump($successMessage);
                            }
                            else
                            {
                                $errors['message'] = "Les mots de passe ne sont pas identiques !";
                            }
                        }
                        else
                        {
                            $errors['message'] = "L'ancien mot de passe est incorrect !";
                        }
                       var_dump($errors);     
                    }
                }
                elseif ($_GET['action'] == 'deconnect')
                {
                    session_start();
                    session_destroy();
                    header('Location:index.php');
                }
                elseif ($_GET['action'] == 'author')
                {
                    $this->authorControl->displayAuthor();
                }
                elseif ($_GET['action'] == 'books')
                {
                    $this->booksControl->displayBooks();
                }
                elseif ($_GET['action'] == 'book')
                {
                    $bookId = intval($this->getParameter($_GET, 'id'));
                    if ($bookId > 0)
                    {
                        $this->bookControl->displayBook($bookId);
                    }
                    else
                    {
                        throw new \Exception('Identifiant de roman invalide');
                    }
                }
                elseif ($_GET['action'] == 'bookComment')
                {
                    $author = $this->getParameter($_POST, 'author');
                    $bookComment = $this->getParameter($_POST, 'bookComment');
                    $bookId = $this->getParameter($_POST, 'id');
                    $this->bookControl->addBookComment($author, $bookComment, $bookId);
                }
                elseif ($_GET['action'] == 'episodes')
                {
                    $this->episodesControl->displayEpisodes();
                }
                elseif ($_GET['action'] == 'episode')
                {
                    $episodeId = intval($this->getParameter($_GET, 'id'));
                    if ($episodeId > 0)
                    {
                        $this->episodeControl->displayEpisode($episodeId);
                    }
                    else
                    {
                        throw new \Exception('Identifiant d\'épisode invalide');
                    }
                }
                elseif ($_GET['action'] == 'episodeComment')
                {
                    $author = $this->getParameter($_POST, 'author');
                    $episodeComment = $this->getParameter($_POST, 'episodeComment');
                    $episodeId = $this->getParameter($_POST, 'id');
                    $this->episodeControl->addEpisodeComment($author, $episodeComment, $episodeId);
                }
                elseif ($_GET['action'] == 'contact')
                {
                    $this->contactControl->displayContact();
                }
                else
                {
                    throw new \Exception('Action non valide');
                }
            }
            else
            {
                $this->homeControl->displayHome();
            }
        }
        catch (\Exception $e)
        {
            $this->error($e->getMessage());
        }
    }

    /**
     * display error message
     *
     * @param [string] $errorMessage
     * @return void
     */
    private function error($errorMessage)
    {
        $view = new ControllerViews("error");
        $view->generate(array('errorMessage' => $errorMessage));
    }

    /**
     *Find the requested parameter in an array
     *
     * @param [array] $array
     * @param [string] $name
     * @return void
     */
    private function getParameter($array, $name)
    {
        if (isset($array[$name]))
        {
            return htmlspecialchars($array[$name]);
        }
        else
        {
            throw new \Exception("Paramètre '$name' absent");
        }  
    }
}