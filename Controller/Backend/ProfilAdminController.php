<?php

namespace David\Projet4\Controller\Backend;

require_once 'Model/Frontend/ProfilManager.php';
require_once 'View/ControllerViews.php';

use David\Projet4\Model\Frontend\ProfilManager;
use David\Projet4\View\ControllerViews;

class ProfilAdminController
{
    private $profilAdmin;
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
    public function displayProfilAdmin()
    {
        $view = new ControllerViews("Backend/profilAdmin");
        $view->generateBackendViews(array('profilAdmin' => $this->profilAdmin));
    }

    public function changeMdp($pseudo, $pass)
    {
        $this->dataUser->updateMdp($pseudo, $pass);
        return $pass;
    }
}