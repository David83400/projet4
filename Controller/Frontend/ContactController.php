<?php

namespace Projet4\Controller\Frontend;

require_once 'Model/Frontend/ContactManager.php';
require_once 'View/ControllerViews.php';

use Projet4\Model\Frontend\ContactManager;
use Projet4\View\ControllerViews;

/**
  * Manage the contact page ond the form to send message
  *
  * @author  David Roche <davidroche83400@gmail.com
  *
*/
class ContactController
{
    private $contactMessage;

    public function __construct()
    {
        $this->contactMessage = new ContactManager();
    }

    /**
     * display the contact page
     *
     * @param [string] $errors
     * @return void
     */
    public function displayContact($errors)
    {
        if(isset($_POST['contactForm']))
        {
            $errors = $this->sendMessage();
        }
        $view = new ControllerViews('Frontend/contact');
        $view->generateFrontendViews(array('errors' => $errors));
    }

    /**
     * Method to send a message
     *
     * @return [string]
     */
    public function sendMessage()
    {
        $errors = array();
        $userId = $_SESSION['userId'];
        $pseudo =  htmlspecialchars($_POST['pseudo']);
        $email =  htmlspecialchars($_POST['email']);
        $message =  htmlspecialchars($_POST['message']);
        if ((!empty($_POST['pseudo'])) && (!empty($_POST['email'])) && (!empty($_POST['message'])))
        {
            if ((($_POST['pseudo'] == $_SESSION['userPseudo'])) && ($_POST['email'] == $_SESSION['userEmail']))
            {
                if(empty($errors))
                {
                    $this->contactMessage->addMessage($userId, $message);
                    $_SESSION['flash']['success'] = 'Votre message a bien été envoyé !';
                }
            }
            else
            {
                $errors['pseudo'] = "Pseudo ou email non valide !";
            }
        }
        else
        {
            $errors['message'] = "Veuillez remplir tous les champs !";
        }
        return $errors;
    }
}