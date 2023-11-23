<?php

declare(strict_types=1);

// EXERCISE 3
// TODO: Copy the code of exercise 2 to here and delete everything related to cola.
// TODO: Make all properties private.
// TODO: Make all the other prints work without error.
// TODO: After fixing the errors. Change the color of Duvel to light instead of blond and also print this new color on the screen after all the other things that were already printed (to be sure that the color has changed).
// TODO: Create a new private method in the Beer class called beerInfo which returns "Hi i'm Duvel and have an alcochol percentage of 8.5 and I have a light color."
// Make sure that you use the variables and not just this text line.
// TODO: Print this method on the screen on a new line.


class Beverage
{
    // Propriétés privées de la classe Beverage
    private string $name;
    private string $color;
    private float $price;
    private string $temperature;

    public function __construct(string $name, string $color, float $price, string $temperature = "cold")
    {
        // Initialisation des propriétés
        $this->name = $name;
        $this->color = $color;
        $this->price = $price;
        $this->temperature = $temperature;
    }

    // Méthode qui affiche des informations sur la boisson
    public function getInfo()
    {
        echo "This beverage is $this->temperature and $this->color.<br>";
    }
    // Méthode qui retourne la valeur de la propriété name
    public function getName()
    {
        return $this->name;
    }
    // Méthode qui retourne la valeur de la propriété temperature
    public function getTemperature()
    {
        return $this->temperature;
    }
    //méthode qui permet d'obtenir la valeur d'une propriété privée depuis l'extérieur de la classe.
    public function getColor()
    {
        return $this->color;
    }
    //méthode qui permet de modifier la valeur d'une propriété privée depuis l'extérieur de la classe.
    public function setColor(string $color)
    {
        $this->color = $color;
    }
}
// Classe Beer qui étend la classe Beverage
class Beer extends Beverage
{
    // Propriété privée de la classe Beer
    private float $alcoholPercentage;

    // Constructeur de la classe Beer
    public function __construct(string $name, float $alcoholPercentage, string $color, float $price)
    {
        // Appel du constructeur de la classe parente (Beverage) pour initialiser les propriétés de base
        parent::__construct($name, $color, $price);

        $this->alcoholPercentage = $alcoholPercentage;
    }

    // Méthode qui retourne le pourcentage d'alcool
    public function getAlcoholPercentage()
    {
        return $this->alcoholPercentage . "%";
    }

    // Méthode qui affiche des informations spécifiques à la bière en utilisant les méthodes de la classe Beverage
    public function beerInfo()
    {
        // Appel de la méthode getInfo de la classe parente (Beverage)
        parent::getInfo();
        echo "Hi, I'm " . $this->getName() . " and have an alcohol percentage of " . $this->getAlcoholPercentage() . " and I have a " . $this->getColor() . " color.";
    }
}
// Instanciation d'un objet représentant la bière Duvel
$duvel = new Beer("Duvel", 8.5, "blond", 3.5);

// Affichage du pourcentage d'alcool de la bière
echo '<pre>';
print_r($duvel->getAlcoholPercentage());
echo '</pre>';
// Affichage de la couleur de la bière
echo '<pre>';
print_r($duvel->getColor());
echo '</pre>';
// Affichage des informations spécifiques à la bière en utilisant la méthode beerInfo
echo '<pre>';
echo '<pre>';
print_r($duvel->beerInfo());
echo '</pre>';

// Modification de la couleur de la bière en utilisant la méthode setColor
$duvel->setColor("light");
// Affichage de la nouvelle couleur de la bière
echo '<pre>';
print_r($duvel->getColor());
echo '</pre>';
// Affichage des informations spécifiques à la bière après la modification de la couleur
echo '<pre>';
print_r($duvel->beerInfo());
echo '</pre>';
