<?php

namespace Projet4\View;

class ControllerViews
{
    private $file;
    private $title;

    public function __construct($action)
    {
        $this->file = "View/" . $action . "View.php";
    }

    /**
     * Generate and display Frontend views
     *
     * @param [mixed] $data
     * @return void
     */
    public function generateFrontendViews($data)
    {
        $content = $this->generateFile($this->file, $data);
        $navbar = $this->generateFile("View/Frontend/navbar.php", $data);
        $footer = $this->generateFile("View/Frontend/footer.php", $data);
        $view = $this->generateFile('View/Frontend/template.php', array('title' => $this->title, 'navbar' => $navbar, 'content' => $content, 'footer' => $footer));

        echo $view;
    }

    /**
     * Generate and display Backend views
     *
     * @param [mixed] $data
     * @return void
     */
    public function generateBackendViews($data)
    {
        $content = $this->generateFile($this->file, $data);
        $navbar = $this->generateFile("View/Backend/navbarAdmin.php", $data);
        $view = $this->generateFile('View/Backend/template.php', array('title' => $this->title, 'navbar' => $navbar, 'content' => $content));

        echo $view;
    }

    /**
     * Generate a view file and return the result
     *
     * @param [string] $file
     * @param [mixed] $data
     * @return void
     */
    private function generateFile($file, $data)
    {
        if (file_exists($file))
        {
            extract($data);
            ob_start();
            require $file;
            return ob_get_clean();
        }
        else
        {
            throw new \Exception('Fichier' . $file . 'introuvable');
        }
    }
}
