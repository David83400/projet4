<?php

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

    // Génère et affiche la vue
    public function generate($data)
    {
        //génération de la partie spécifique de la vue
        $content = $this->generateFile($this->file, $data);
        // génération du template commun utilisant la partie spécifique
        $view = $this->generateFile('View/template.php', array('title' => $this->title, 'content' => $content));
        // renvoi de la view au navigateur
        echo $view;
    }

    // génère un fichier view et renvoie le résultat produit
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
            throw new Exception('Fichier' . $file . 'introuvable');
        }
    }
}
