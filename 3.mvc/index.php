<?php
// Activation des types stricts pour une programmation plus robuste
declare(strict_types=1);

// Configuration pour afficher les erreurs pendant le développement
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);


require_once 'vendor\autoload.php';
//charger les varaibales d'envirronement à partir du fichier .env dans le répertoire courant
Dotenv\Dotenv::createUnsafeImmutable(__DIR__)->load();
// include all your model files here
// require 'Model/Article.php';
// //include all your controllers here
// require 'Controller/HomepageController.php';
// require 'Controller/ArticleController.php';

use App\Controller\ArticleController;
use App\Controller\HomepageController;

$articleController = new ArticleController();
// echo $articleController->index();
$homeController = new HomepageController();
// echo $homeController->index();


// Get the current page to load
// If nothing is specified, it will remain empty (home should be loaded)
$page = $_GET['page'] ?? null;
// Load the controller
// It will *control* the rest of the work to load the page
// Chargement du contrôleur approprié en fonction de la page demandée
switch ($page) {
    case 'articles':
        // Instanciation du contrôleur ArticleController et appel de sa méthode index
        ($articleController)->index();
        break;
        // Si la page demandée est 'articles-show'
    case 'articles-show':
        // Vérifiez si un identifiant d'article est passé en paramètre dans l'URL
        $articleID = $_GET['id'] ?? null;
        // Vérifiez si l'identifiant d'article est valide
        if ($articleID !== null && is_numeric($articleID)) {
            // Instanciation du contrôleur ArticleController et appel de sa méthode show avec l'identifiant d'article
            (new App\Controller\ArticleController())->show($articleID);
        } else {
            // Si l'identifiant d'article n'est pas valide, redirigez l'utilisateur vers une page d'erreur ou la page d'accueil
            header('Location: index.php');
            exit();
        }
        break;
    case 'home':
        // Par défaut, si la page n'est pas spécifiée ou si elle est 'home'
    default:
        // Instanciation du contrôleur HomepageController et appel de sa méthode index
        ($homeController)->index();
}
