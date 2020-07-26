<?php

namespace Projet4\Controller;

require 'Controller/Autoloader.php';
Autoloader::register();

use Projet4\Controller\Autoloader;
use Projet4\Controller\Frontend\HomeController;
use Projet4\Controller\Frontend\ConnexionController;
use Projet4\Controller\Frontend\ProfilController;
use Projet4\Controller\Backend\AdminIndexController;
use Projet4\Controller\Backend\modifyEpisodeController;
use Projet4\Controller\Backend\EpisodeCommentController;
use Projet4\Controller\Backend\BookCommentController;
use Projet4\Controller\Backend\EditEpisodeController;
use Projet4\Controller\Backend\MessagingController;
use Projet4\Controller\Backend\EditMessagingController;
use Projet4\Controller\Backend\ProfilAdminController;
use Projet4\Controller\Frontend\BooksController;
use Projet4\Controller\Frontend\BookController;
use Projet4\Controller\Frontend\EpisodesController;
use Projet4\Controller\Frontend\EpisodeController;
use Projet4\Controller\Frontend\AuthorController;
use Projet4\Controller\Frontend\ContactController;
use Projet4\Controller\Frontend\MentionsLegalesController;
use Projet4\Controller\Frontend\ConfidentialiteController;
use Projet4\Controller\Frontend\RemerciementsController;
use Projet4\View\ControllerViews;

class Router
{
    private $homeControl;
    private $connexionControl;
    private $profilControl;
    private $adminIndexControl;
    private $modifyEpisodeControl;
    private $episodeCommentControl;
    private $bookCommentControl;
    private $editEpisodeControl;
    private $messagingControl;
    private $editMessagingControl;
    private $profilAdminControl;
    private $booksControl;
    private $bookControl;
    private $episodesControl;
    private $episodeControl;
    private $authorControl;
    private $contactControl;
    private $mentionsLegalesControl;
    private $confidentialiteControl;
    private $remerciementsControl;

    public function __construct()
    {
        $this->homeControl = new HomeController();
        $this->connexionControl = new ConnexionController();
        $this->profilControl = new ProfilController();
        $this->adminIndexControl = new AdminIndexController();
        $this->modifyEpisodeControl = new ModifyEpisodeController();
        $this->episodeCommentControl = new EpisodeCommentController();
        $this->bookCommentControl = new BookCommentController();
        $this->editEpisodeControl = new EditEpisodeController();
        $this->messagingControl = new MessagingController();
        $this->editMessagingControl = new EditMessagingController();
        $this->profilAdminControl = new ProfilAdminController();
        $this->booksControl = new BooksController();
        $this->bookControl = new BookController();
        $this->episodesControl = new EpisodesController();
        $this->episodeControl = new EpisodeController();
        $this->authorControl = new AuthorController();
        $this->contactControl = new ContactController();
        $this->mentionsLegalesControl = new MentionsLegalesController();
        $this->confidentialiteControl = new ConfidentialiteController();
        $this->remerciementsControl = new RemerciementsController();
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
                session_start();
                $errors = array();
                if ($_GET['action'] == 'connexion')
                {
                    $this->connexionControl->displayConnexion($errors);
                }
                elseif ($_GET['action'] == 'profil')
                {
                    $this->profilControl->displayProfil($errors);
                }
                elseif (($_GET['action'] == 'admin'))
                {
                    if((isset($_SESSION['userAdmin'])) && ($_SESSION['userAdmin']) == 1)
                    {
                        $this->adminIndexControl->displayAdminIndex();
                    }
                    else
                    {
                        header('Location:index.php?action=connexion');
                    }
                }
                elseif (($_GET['action'] == 'modifyEpisode'))
                {
                    if((isset($_SESSION['userAdmin'])) && ($_SESSION['userAdmin']) == 1)
                    {
                        $episodeId = intval($this->getParameter($_GET, 'id'));
                        if ($episodeId > 0)
                        {
                            $this->modifyEpisodeControl->displayAdminEpisode($episodeId, $errors);
                        }
                        else
                        {
                            throw new \Exception('Identifiant d\'épisode invalide');
                        }  
                    }
                    else
                    {
                        header('Location:index.php?action=connexion');
                    }
                    
                }
                elseif ($_GET['action'] == 'deleteEpisode')
                {
                    $id = intval($this->getParameter($_GET, 'id'));
                    $commentId = intval($this->getParameter($_GET, 'episodeId'));

                    if ($id > 0)
                    {
                        $this->adminIndexControl->removeEpisodeAndComments($id, $commentId);
                        header('Location:index.php?action=admin');
                        $_SESSION['flash']['success'] = 'L\'épisode a bien été supprimé !';
                    }
                    else
                    {
                        throw new \Exception('Identifiant d\'épisode invalide');
                    }
                }
                elseif (($_GET['action'] == 'editEpisodeComment') && ((isset($_SESSION['userAdmin'])) && ($_SESSION['userAdmin']) == 1))
                {
                    $commentId = intval($this->getParameter($_GET, 'id'));
                    if ($commentId > 0)
                    {
                        $this->episodeCommentControl->displayEpisodeComment($commentId);
                        if (isset($_POST['formAcceptComment']))
                        {
                            $this->episodeCommentControl->acceptEpisodeComment($commentId);
                            header('Location:index.php?action=admin');
                            $_SESSION['flash']['success'] = 'Le commentaire a bien été mis en ligne !';
                        }
                        elseif (isset($_POST['formDeleteComment']))
                        {
                            $this->episodeCommentControl->removeEpisodeComment($commentId);
                            header('Location:index.php?action=admin');
                            $_SESSION['flash']['success'] = 'Le commentaire a bien été supprimé !';
                        }
                    }
                    else
                    {
                        throw new \Exception('Identifiant de commentaire invalide');
                    }
                    
                }
                elseif (($_GET['action'] == 'editBookComment') && ((isset($_SESSION['userAdmin'])) && ($_SESSION['userAdmin']) == 1))
                {
                    $commentId = intval($this->getParameter($_GET, 'id'));
                    if ($commentId > 0)
                    {
                        $this->bookCommentControl->displayBookComment($commentId);
                        if (isset($_POST['formAcceptComment']))
                        {
                            $this->bookCommentControl->acceptBookComment($commentId);
                            header('Location:index.php?action=admin');
                            $_SESSION['flash']['success'] = 'Le commentaire a bien été mis en ligne !';
                        }
                        elseif (isset($_POST['formDeleteComment']))

                        {
                            $this->bookCommentControl->removeBookComment($commentId);
                            header('Location:index.php?action=admin');
                            $_SESSION['flash']['success'] = 'Le commentaire a bien été supprimé !';
                        }
                    }
                    else
                    {
                        throw new \Exception('Identifiant de commentaire invalide');
                    }
                    
                }
                elseif (($_GET['action'] == 'editEpisode') && ((isset($_SESSION['userAdmin'])) && ($_SESSION['userAdmin']) == 1))
                {
                    $this->editEpisodeControl->displayEditEpisode($errors);
                }
                elseif (($_GET['action'] == 'messaging'))
                {
                    if((isset($_SESSION['userAdmin'])) && ($_SESSION['userAdmin']) == 1)
                    {
                        $this->messagingControl->displayMessaging();
                    }
                    else
                    {
                        header('Location:index.php?action=connexion');
                    }
                }
                elseif ($_GET['action'] == 'deleteMessage')
                {
                    $id = intval($this->getParameter($_GET, 'id'));

                    if ($id > 0)
                    {
                        $this->messagingControl->removeMessage($id);
                        header('Location:index.php?action=messaging');
                        $_SESSION['flash']['success'] = 'Le message a bien été supprimé !';
                    }
                    else
                    {
                        throw new \Exception('Identifiant de message invalide');
                    }
                }
                elseif (($_GET['action'] == 'editMessaging'))
                {
                    if((isset($_SESSION['userAdmin'])) && ($_SESSION['userAdmin']) == 1)
                    {
                        $idMessage = intval($this->getParameter($_GET, 'id'));
                        if ($idMessage > 0)
                        {
                            $this->editMessagingControl->displayEditMessaging($idMessage);
                            if (isset($_POST['formTreatMessage']))
                            {
                                $this->editMessagingControl->treatMessage($idMessage);
                                header('Location:index.php?action=messaging');
                                $_SESSION['flash']['success'] = 'Le message a bien été traité et sauvegardé !';
                            }
                        }
                        else
                        {
                            throw new \Exception('Identifiant de message invalide');
                        }
                    }
                    else
                    {
                        header('Location:index.php?action=connexion');
                    }
                }
                elseif (($_GET['action'] == 'profilAdmin') && ((isset($_SESSION['userAdmin'])) && ($_SESSION['userAdmin']) == 1))
                {
                    $this->profilAdminControl->displayProfilAdmin($errors);
                }
                elseif ($_GET['action'] == 'deconnect')
                {
                    session_start();
                    session_destroy();
                    header('Location:index.php');
                    session_start();
                    $_SESSION['flash']['success'] = 'Vous êtes bien déconnecté de votre espace membre !';
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
                    $author = htmlspecialchars($this->getParameter($_POST, 'author'));
                    $bookComment = htmlspecialchars($this->getParameter($_POST, 'bookComment'));
                    $bookId = $this->getParameter($_POST, 'id');
                    if((isset($_SESSION['userPseudo'])) && ($_SESSION['userPseudo'] == $author))
                    {
                        $this->bookControl->addBookComment($author, $bookComment, $bookId);
                        header("Location:index.php?action=book&id=$bookId");
                        $_SESSION['flash']['success'] = 'Votre commentaire a bien été posté !';
                    }
                    else
                    {
                        header("Location:index.php?action=book&id=$bookId");
                        $_SESSION['flash']['error'] = 'Ce pseudo n\'est pas valide !';
                    }
                }
                elseif ($_GET['action'] == 'signaleBookComment')
                {
                    $id = intval($this->getParameter($_GET, 'id'));
                    $bookId = intval($this->getParameter($_GET, 'bookId'));
                    $flag = intval($this->getParameter($_GET, 'flag'));
                    if ($id > 0)
                    {
                        if ($flag == 1)
                        {
                            header("Location:index.php?action=book&id=$bookId");
                            $_SESSION['flash']['signale'] = 'Ce commentaire a déja été signalé !';
                        }
                        else
                        {
                            $this->bookControl->signalBookComment($id, $bookId);
                            $_SESSION['flash']['signale'] = 'Nous avons pris en compte votre signalement !';
                            header("Location:index.php?action=book&id=$bookId");
                        }
                    }
                    else
                    {
                        throw new \Exception('Identifiant de roman invalide');
                    }
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
                        $this->episodeControl->displayEpisode($errors, $episodeId);
                    }
                    else
                    {
                        throw new \Exception('Identifiant d\'épisode invalide');
                    }
                }
                elseif ($_GET['action'] == 'episodeComment')
                {
                    $author = htmlspecialchars($this->getParameter($_POST, 'author'));
                    $episodeComment = htmlspecialchars($this->getParameter($_POST, 'episodeComment'));
                    $episodeId = $this->getParameter($_POST, 'id');
                    if((isset($_SESSION['userPseudo'])) && ($_SESSION['userPseudo'] == $author))
                    {
                        $this->episodeControl->addEpisodeComment($author, $episodeComment, $episodeId);
                        header("Location:index.php?action=episode&id=$episodeId");
                        $_SESSION['flash']['success'] = 'Votre commentaire a bien été posté !';
                    }
                    else
                    {
                        header("Location:index.php?action=episode&id=$episodeId");
                        $_SESSION['flash']['error'] = 'Ce pseudo n\'est pas valide !';
                    }
                }
                elseif ($_GET['action'] == 'signaleEpisodeComment')
                {
                    $id = intval($this->getParameter($_GET, 'id'));
                    $episodeId = intval($this->getParameter($_GET, 'episodeId'));
                    $flag = intval($this->getParameter($_GET, 'flag'));
                    if ($id > 0)
                    {
                        if ($flag == 1)
                        {
                            header("Location:index.php?action=episode&id=$episodeId");
                            $_SESSION['flash']['signale'] = 'Ce commentaire a déja été signalé !';
                        }
                        else
                        {
                            $this->episodeControl->signalEpisodeComment($id, $episodeId);
                            $_SESSION['flash']['signale'] = 'Nous avons pris en compte votre signalement !';
                            header("Location:index.php?action=episode&id=$episodeId");
                        }
                    }
                    else
                    {
                        throw new \Exception('Identifiant d\épisode invalide');
                    }
                }
                elseif (($_GET['action'] == 'contact') && (isset($_SESSION['userPseudo'])))
                {
                    $this->contactControl->displayContact($errors);
                }
                elseif ($_GET['action'] == 'mentionsLegales')
                {
                    $this->mentionsLegalesControl->displayMentionsLegales();
                }
                elseif ($_GET['action'] == 'confidentialite')
                {
                    $this->confidentialiteControl->displayConfidentialite();
                }
                elseif ($_GET['action'] == 'remerciements')
                {
                    $this->remerciementsControl->displayRemerciements();
                }
                else
                {
                    throw new \Exception('Action non valide !');
                }
                
            }
            else
            {
                session_start();
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
        $view->generateFrontendViews(array('errorMessage' => $errorMessage));
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
            return $array[$name];
        }
        else
        {
            throw new \Exception("Paramètre '$name' absent");
        }  
    }
}