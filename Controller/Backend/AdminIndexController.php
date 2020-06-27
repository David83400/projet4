<?php

namespace David\Projet4\Controller\Backend;

require_once 'Model/Backend/AdminIndexManager.php';
require_once 'View/ControllerViews.php';

use David\Projet4\Model\Backend\AdminIndexManager;
use David\Projet4\View\ControllerViews;

class AdminIndexController
{
    private $admin;
    private $episodes;

    public function __construct()
    {
        $this->episodes = new AdminIndexManager();
    }
    
    /**
     * display the administration page
     *
     * @return void
     */
    public function displayAdminIndex()
    {
        $episodes = $this->episodes->getEpisodes();
        $view = new ControllerViews("Backend/admin");
        $view->generateBackendViews(array('admin' => $this->admin, 'episodes' => $episodes));
    }

    /**
     * Delete the episode selected
     *
     * @param [int] $id
     * @return void
     */
    public function removeEpisode($id)
    {
        $this->episodes->deleteEpisode($id);
    }
}