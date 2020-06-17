<?php

namespace David\Projet4\Controller\Frontend;

require_once 'Model/ProfilManager.php';
require_once 'View/ControllerViews.php';

use David\Projet4\Model\ProfilManager;
use David\Projet4\View\ControllerViews;

class ProfilController
{
    private $profil;
    private $dataUser;
    
    public function __construct()
    {
        $this->dataUser = new ProfilManager();
    }
    /**
     * display the profil page
     *
     * @return void
     */
    public function displayProfil()
    {
        $view = new ControllerViews("Frontend/profil");
        $view->generate(array('profil' => $this->profil));
    }

    public function changeMdp($pseudo, $pass)
    {
        $this->dataUser->updateMdp($pseudo, $pass);
        return $pass;
    }
}