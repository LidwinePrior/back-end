<?php

declare(strict_types=1);

//La classe Article définit la structure d'un article avec des propriétés comme le titre, la description et la date de publication.
class Article
{
    public int $id;
    public string $title;
    public ?string $description;
    public ?string $publishDate;

    // Le constructeur de la classe Article
    public function __construct(int $id, string $title, ?string $description, ?string $publishDate)
    {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->publishDate = $publishDate;
    }

    //a méthode formatPublishDate est une fonctionnalité ajoutée à la classe Article pour formater la date selon un format spécifié.
    public function formatPublishDate($format = 'd-m-Y')
    {
        // TODO: return the date in the required format
        return date($format, strtotime($this->publishDate));
    }
}
