<?php

declare(strict_types=1);

namespace App\Controller;
//Le contrôleur HomepageController gère la page d'accueil.
class HomepageController
{
    //La méthode index charge la vue correspondante
    public function index()
    {
        // Usually, any required data is prepared here
        // For the home, we don't need to load anything

        // Load the view
        require 'View/home.php';
    }
}
