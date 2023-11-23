<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style type="text/css">
        body {
            background-color: grey;
        }

        div {
            background-color: lightgray;
            margin: 5px;
            width: 50%;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        h2 {
            text-align: center;
            width: 60%;
        }

        p {
            width: 50%;
        }
    </style>
</head>

<body>

    <?php

    // Use Case #3
    // We are preparing three types of content for a website:

    // Articles
    // Ads
    // Vacancies
    // All of those have a title and text. When showing the title, they are modified as follows: articles remain as they are, ads are shown in all caps and vacancies are appended with " - apply now!". The original title should still be retrievable, so no modification is permanent.

    // Have an array with two articles, one ad and one vacancy. Use this array to show all content types (title + text).


    //défnir la class webPage
    class content
    {
        protected string $title;
        protected string $text;

        public function __construct(string $title, string $text)
        {
            $this->title = $title;
            $this->text = $text;
        }
        public function displayTitle()
        {
            return $this->title;
        }
        public function displayText()
        {
            return $this->text;
        }
    }

    // Class article qui hérite de la class content
    class article extends content
    {
        // Pas de modification nécessaire pour le titre d'un article
    }

    // Class ads qui hérite de la class content
    class ads extends content
    {
        //modifier le titre des ads pour qu'il soit en majuscule
        public function displayTitle()
        {
            return strtoupper($this->title);
        }
    }

    // Class vacancy qui hérite de la class content
    class vacancy extends content
    {
        //modifier le titre des vacancy  pour ajouter -apply now!
        public function displayTitle()
        {
            return $this->title . " -apply now!";
        }
    }


    // Création d'objets pour chaque type de contenu
    $article1 = new article("<h2 class='cat'>Cats will dominate the world, soon!</h2>", "<p>Don't underestimate the intelligence of our hairy animals! Intelligent,
machiavellian, aggressive, they have the power!</p>");
    $article2 = new article("<h2 class='singer'>Who is he?</h2>", "<p>The new frensh singer Alex Ception with this new single 'PHP c'est pour les singlés!', inspire by the De Palmas'song.</p>");
    $ad = new ads("<h2 class='spray'>Brush Cat</h2>", "<p>The spray to give your cat a nice brushing!</p>");
    $vacancy = new vacancy("<h2 class='robber'>Robber</h2>", "<p>If you are good at stealing hearts, ho! Hands pretty heart! We have a job for you!</p>");


    //stocker les objets dans un tableau
    $contents = [$article1, $article2, $ad, $vacancy];

    //afficher les titres et leur contenus modifiés pour chaque contenu

    foreach ($contents as $content) {
        echo "<div>";
        echo $content->displayTitle();
        echo $content->displayText();
        echo "</div>";
    }
    ?>
</body>

</html>