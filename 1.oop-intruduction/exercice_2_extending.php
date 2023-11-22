<?php

// EXERCISE 2
// TODO: Make class beer that extends from Beverage.
// TODO: Create the properties name (string) and alcoholPercentage (float).
// TODO: Foresee a construct that's allows us to use all the properties from beverage and that sets the values for name and alcoholpercentage.
// Remember for now we will use properties and methods that can be accessed from everywhere.
// TODO: Make a getAlcoholPercentage function which returns the alocoholPercentage.
// TODO: Instantiate an object which represents Duvel. Make sure that the color is set to blond, the price equals 3.5 euro and the temperature to cold automatically.
// TODO: Also the name equal to Duvel and the alcohol percentage to 8,5%
// TODO: Print the getAlcoholPercentage 2 times on the screen in two different ways, print the color on the screen and the getInfo.

declare(strict_types=1);

// Définition de la classe Beverage
class Beverage
{
    // Propriétés publiques de la classe Beverage
    public string $color;
    public float $price;
    public string $temperature;
    public function __construct(string $color, float $price, string $temperature = "cold")
    {
        $this->color = $color;
        $this->price = $price;
        $this->temperature = $temperature;
    }
    // Méthode qui retourne une phrase décrivant la boisson
    function getInfo()
    {
        return "This beverage is $this->temperature and $this->color.<br>";
    }
}
// Instanciation d'un objet représentant une boisson (cola)
$cola = new Beverage("black", 2);
echo $cola->getInfo();
echo $cola->temperature;

// Définition de la classe Beer qui étend la classe Beverage
class Beer extends Beverage
{
    // Propriétés publiques de la classe Beer
    public string $name;
    public float $alcoholPercentage;
    // Constructeur de la classe Beer
    public function __construct(string $name, float $alcoholPercentage, string $color, float $price, string $temperature = "cold")
    {
        // Appel du constructeur de la classe parente (Beverage) pour initialiser les propriétés de base
        parent::__construct($color, $price, $temperature);
        $this->name = $name;
        $this->alcoholPercentage = $alcoholPercentage;
    }
    // Méthode qui retourne le pourcentage d'alcool
    function getAlcoholPercentage()
    {
        return $this->alcoholPercentage;
    }
    // Méthode qui retourne une phrase décrivant la bière en utilisant les informations de la classe Beverage et ajoutant le nom et le pourcentage d'alcool
    public function getInfo(): string
    {
        return parent::getInfo() . " It's $this->name with $this->alcoholPercentage % alcohol.";
    }
}
// Instanciation d'un objet représentant la bière Duvel
$duvel = new Beer("Duvel", 8.5, "blond", 3.5);

// Affichage du pourcentage d'alcool de la bière en utilisant la méthode getAlcoholPercentage
echo '<pre>';
print_r($duvel->getAlcoholPercentage());
echo '</pre>';

// Affichage du pourcentage d'alcool de la bière directement
echo '<pre>';
print_r($duvel->alcoholPercentage);
echo '</pre>';

// Affichage de la couleur de la bière directement
echo '<pre>';
print_r($duvel->color);
echo '</pre>';

// Affichage des informations de la bière en utilisant la méthode getInfo
echo '<pre>';
print_r($duvel->getInfo());
echo '</pre>';

// Tentative pour provoquer une erreur en essayant d'appeler getAlcoholPercentage sur un objet de la classe Beverage
echo '<pre>';
print_r($cola->getAlcoholPercentage());
echo '</pre>';
