<?php

namespace David\Projet4\View;

class ControllerViews
{
    // nom du fichier associé à la vue
    private $file;
    // titre de la vue définie dans le fichier view
    private $title;

    public function __construct($action)
    {
        //détermination du nom du fichier view à partir du paramètre action
        $this->file = "View/" . $action . "View.php";
    }

    /**
     * Generate and display views
     *
     * @param [mixed] $data
     * @return void
     */
    public function generate($data)
    {
        //génération de la partie spécifique de la vue
        $content = $this->generateFile($this->file, $data);
        // génération du template commun utilisant la partie spécifique
        $view = $this->generateFile('View/template.php', array('title' => $this->title, 'content' => $content));
        // renvoi de la view au navigateur
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
            // rend les éléments du tableau $data accessible dans la view
            extract($data);
            // démarrage de la temporisation de sortie
            ob_start();
            // inclut le fichier view. Son résultat est placé dans le tampon de sortie
            require $file;
            // arrêt de la temporisation et renvoi du tampon de sortie
            return ob_get_clean();
        }
        else
        {
            throw new \Exception('Fichier' . $file . 'introuvable');
        }
    }
}
