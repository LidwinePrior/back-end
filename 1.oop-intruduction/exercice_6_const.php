<?php

declare(strict_types=1);

// Définition de la classe Beverage
class Beverage
{
    // Propriétés privées de la classe Beverage
    private string $name;
    private string $color;
    private float $price;
    private string $temperature;

    // Définition de la constante BAR_NAME avec la valeur 'Het Vervolg'
    const BAR_NAME = 'Het Vervolg';

    // Constructeur de la classe Beverage
    public function __construct(string $name, string $color, float $price, string $temperature = "cold")
    {
        // Initialisation de la propriété name avec la valeur passée en paramètre
        $this->name = $name;
        // Initialisation de la propriété color avec la valeur passée en paramètre
        $this->color = $color;
        // Initialisation de la propriété price avec la valeur passée en paramètre
        $this->price = $price;
        // Initialisation de la propriété temperature avec la valeur passée en paramètre
        $this->temperature = $temperature;
    }
    // Méthode pour obtenir la valeur de la constante BAR_NAME
    public function getBarName()
    {
        // Retourne la valeur de la constante BAR_NAME
        return self::BAR_NAME;
    }
}

// Définition de la classe Beer qui étend la classe Beverage
class Beer extends Beverage
{
    // Propriété privée de la classe Beer
    private float $alcoholPercentage;

    // Constructeur de la classe Beer
    public function __construct(string $name, float $alcoholPercentage, string $color, float $price)
    {
        // Appel du constructeur de la classe parente (Beverage)
        parent::__construct($name, $color, $price);

        // Initialisation de la propriété alcoholPercentage avec la valeur passée en paramètre
        $this->alcoholPercentage = $alcoholPercentage;
    }

    // Méthode pour obtenir la valeur de la constante BAR_NAME (héritée de la classe Beverage)
    public function getBarName()
    {
        // Retourne la valeur de la constante BAR_NAME
        return self::BAR_NAME;
    }
}

// Créer une instance de Beverage
$beverage = new Beverage('Some Name', 'Some Color', 2.5);

// Affichage de la constante BAR_NAME directement
echo '<pre>';
echo Beverage::BAR_NAME;
echo '</pre>';

// Afficher la valeur de la constante en utilisant la méthode getBarName de la classe Beverage
echo '<pre>';
echo $beverage->getBarName();
echo '</pre>';

// Créer une instance de Beer
$beer = new Beer('Duvel', 8.5, 'Blond', 3.5);

// Afficher la valeur de la constante en utilisant la méthode getBarName de la classe Beer
echo '<pre>';
echo $beer->getBarName();
echo '</pre>';
