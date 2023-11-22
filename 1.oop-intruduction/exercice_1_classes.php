<?php
// EXERCISE 1
// TODO: Create a class beverage.
// TODO: Create the properties color (string), price (float) and temperature (string) and also foresee a construct.
// TODO: Have a default value "cold" in the construct for temperature.
// Remember for now we will use properties and methods that can be accessed from everywhere.
// TODO: Make a getInfo function which returns "This beverage is <temperature> and <color>."
// TODO: Instantiate an object which represents cola. Make sure that the color is set to black, the price equals 2 euro and the temperature to cold automatically
//  print the getInfo on the screen.
// TODO: Print the temperature on the screen.

declare(strict_types=1);


//définir la classe Beverage
class Beverage
{
    // Propriétés publiques de la classe Beverage
    public string $color;
    public float $price;
    public string $temperature;

    // Constructeur de la classe Beverage avec une valeur par défaut "cold" pour temperature
    public function __construct(string $color, float $price, string $temperature = "cold")
    {
        // Initialisation de la propriété color avec la valeur passée en paramètre
        $this->color = $color;
        // Initialisation de la propriété price avec la valeur passée en paramètre
        $this->price = $price;
        // Initialisation de la propriété temperature avec la valeur passée en paramètre (ou "cold" par défaut)
        $this->temperature = $temperature;
    }

    // Méthode qui retourne une phrase décrivant la boisson
    function getInfo()
    {
        return "This beverage is" . $this->temperature . " and " . $this->color . ".<br>";
    }
}
// Instanciation d'un objet représentant une boisson (cola)
$cola = new Beverage("black", 2);

// Affichage des informations de la boisson en utilisant la méthode getInfo
echo $cola->getInfo();

// Affichage de la température de la boisson directement
echo $cola->temperature;
