<?php

declare(strict_types=1);

// EXERCISE 7

// Copy your solution from exercise 6
// TODO: Make a static property in the Beverage class that can only be accessed from inside the class called address which has the value "Melkmarkt 9, 2000 Antwerpen".
// TODO: Print the address without creating a new instant of the beverage class 2 times in two different ways.



// Définition de la classe Beverage
class Beverage
{
    // Propriétés privées de la classe Beverage
    private string $name;
    private string $color;
    private float $price;
    private string $adress;
    private string $temperature;


    // Définition de la constante BAR_NAME avec la valeur 'Het Vervolg'
    const BAR_NAME = 'Het Vervolg';

    // Constructeur de la classe Beverage
    public function __construct(string $name, string $color, float $price, string $adress, string $temperature = "cold")
    {
        // Initialisation de la propriété name avec la valeur passée en paramètre
        $this->name = $name;
        // Initialisation de la propriété color avec la valeur passée en paramètre
        $this->color = $color;
        // Initialisation de la propriété price avec la valeur passée en paramètre
        $this->price = $price;
        // Initialisation de la propriété adress avec la valeur passée en paramètre
        $this->adress = $adress;
        // Initialisation de la propriété temperature avec la valeur passée en paramètre
        $this->temperature = $temperature;
    }
    // Méthode pour obtenir la valeur de la constante BAR_NAME
    public function getBarName()
    {
        // Retourne la valeur de la constante BAR_NAME
        return self::BAR_NAME;
    }
    public function getAdress()
    {
        return $this->adress;
    }
}

// Définition de la classe Beer qui étend la classe Beverage
class Beer extends Beverage
{
    // Propriété privée de la classe Beer
    private float $alcoholPercentage;

    // Constructeur de la classe Beer
    public function __construct(string $name, float $alcoholPercentage, string $color, float $price, string $adress)
    {
        // Appel du constructeur de la classe parente (Beverage)
        parent::__construct($name, $color, $price, $adress);

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
$beverage = new Beverage('Some Name', 'Some Color', 2.5, 'Melkmarkt 9, 2000 Anvers');


echo '<pre>';
echo $beverage->getAdress();
echo '</pre>';
