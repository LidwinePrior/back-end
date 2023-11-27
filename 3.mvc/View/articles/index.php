<?php require 'View/includes/header.php' ?>

<?php // Use any data loaded in the controller here 
//Les vues sont responsables de l'affichage des données. Elles utilisent les données fournies par les contrôleurs pour générer la page HTML.
// View/articles/index.php affiche la liste des articles.
?>

<section>
    <h1>Articles</h1>
    <ul>
        <?php foreach ($articles as $article) : ?>

            <li><a href="index.php?page=articles-show&id=<?php echo $article->id ?>"><?= $article->title ?> (<?= $article->formatPublishDate() ?>)</a></li>
        <?php endforeach; ?>
    </ul>
</section>
<?php require 'View/includes/footer.php' ?>