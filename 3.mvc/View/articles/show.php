<?php require 'View/includes/header.php' ?>

<?php // Use any data loaded in the controller here 
$articleDetails
?>

<section>
    <h1><?= $articleDetails->title ?></h1>
    <p><?= $articleDetails->formatPublishDate() ?></p>
    <p><?= $articleDetails->description ?></p>


    <a href="index.php?page=articles-show&id=<?= $previousArticleId ?>">Previous article</a>



    <a href="index.php?page=articles-show&id=<?= $nextArticleId ?>">Next article</a>

</section>

<?php require 'View/includes/footer.php' ?>