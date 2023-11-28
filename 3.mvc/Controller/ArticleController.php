<?php

declare(strict_types=1);

namespace App\Controller;

use PDO;
use Exception;
use App\Model\Article;

//Le contrôleur ArticleController gère les actions liées aux articles, telles que l'affichage de la liste des articles (index) et l'affichage détaillé d'un article (show).
class ArticleController
{
    //La méthode index récupère les articles
    public function index()
    {
        // Load all required data
        $articles = $this->getArticles();

        // Load the view
        require 'View/articles/index.php';
    }



    // Note: this function can also be used in a repository - the choice is yours
    private function getArticles()
    {
        // TODO: prepare the database connection
        try {
            $bdd = new PDO('mysql:host=' . $_ENV["HOST"] . ';dbname=' . $_ENV["DBNAME"] . ';charset=utf8', $_ENV["USER"], $_ENV["PASSWORD"]);
            $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
        // Note: you might want to use a re-usable databaseManager class - the choice is yours
        // TODO: fetch all articles as $rawArticles (as a simple array)
        $sql = "SELECT * FROM articles";
        $result = $bdd->query($sql);

        // Récupération des résultats dans un tableau associatif
        $rawArticles = $result->fetchAll(PDO::FETCH_ASSOC);

        // Conversion des articles en objets de la classe Article
        $articles = [];
        foreach ($rawArticles as $rawArticle) {
            // On convertit un article d'un tableau "dumb" en une classe beaucoup plus flexible
            // We are converting an article from a "dumb" array to a much more flexible class
            $articles[] = new Article($rawArticle['id'], $rawArticle['title'], $rawArticle['description'], $rawArticle['publish_date']);
        }

        return $articles;
    }



    // Méthode pour récupérer un article par son identifiant dans un tableau
    private function getArticleById($articleId, $articles)
    {
        // Parcours du tableau d'articles
        foreach ($articles as $article) {
            // Vérification si l'identifiant de l'article correspond à l'identifiant recherché
            if ($article->id == $articleId) {
                // Retourne l'article trouvé
                return $article;
            }
        }
        // Retourne null si l'article n'est pas trouvé
        return null;
    }



    //La méthode show affiche les détails d'un article via son ID.
    public function show($articleId)
    {
        // Récupérer tous les articles
        $articles = $this->getArticles();

        // Chercher l'article avec l'identifiant correspondant
        $articleDetails = $this->getArticleById($articleId, $articles);

        // Vérifier si l'article a été trouvé
        if ($articleDetails === null) {
            // Gérer le cas où l'article n'est pas trouvé, par exemple, rediriger l'utilisateur ou afficher une erreur
            header("Location: index.php");
            exit();
        }
        // Récupérer les IDs de l'article précédent et suivant
        $previousArticleId = $this->getPreviousArticleId($articleId, $articles);
        $nextArticleId = $this->getNextArticleId($articleId, $articles);

        // Utilisez $articleDetails, $previousArticleId et $nextArticleId pour afficher les détails de l'article
        require 'View/articles/show.php';
    }



    // Méthode pour récupérer l'ID de l'article précédent
    private function getPreviousArticleId($currentArticleId, $articles)
    {
        // Recherche de l'index de l'article actuel dans le tableau d'articles
        $index = array_search($currentArticleId, array_column($articles, 'id'));
        // Vérification si l'article actuel n'est pas le premier dans le tableau
        if ($index !== false && $index > 0) {
            // Retourne l'ID de l'article précédent
            return $articles[$index - 1]->id;
        }
        // Retourne null si l'article actuel est le premier dans le tableau ou n'est pas trouvé
        return null;
    }



    // Méthode pour récupérer l'ID de l'article suivant
    private function getNextArticleId($currentArticleId, $articles)
    {
        // Recherche de l'index de l'article actuel dans le tableau d'articles
        $index = array_search($currentArticleId, array_column($articles, 'id'));
        // Vérification si l'article actuel n'est pas le dernier dans le tableau
        if ($index !== false && $index < count($articles) - 1) {
            // Retourne l'ID de l'article suivant        
            return $articles[$index + 1]->id;
        }
        // Retourne null si l'article actuel est le dernier dans le tableau ou n'est pas trouvé
        return null;
    }
}
