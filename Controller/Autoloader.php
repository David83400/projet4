<?php

namespace Projet4\Controller;

/**
  * Manage the autoloader
  *
  * @author  David Roche <davidroche83400@gmail.com
  *
*/
class Autoloader
{
    /**
     * Method to charge classes automatically
     *
     * @return void
     */
    static function register()
    {
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }

    /**
     * method to set up autoloader
     *
     * @param [string] $class
     * @return void
     */
    static function autoload($class)
    {
        $class = str_replace(__NAMESPACE__ . '\\', '', $class);
        $class = str_replace('\\', '/', $class);
        require_once 'Controller/' . $class . '.php';
    }
}