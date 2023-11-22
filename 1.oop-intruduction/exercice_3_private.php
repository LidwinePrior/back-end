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
    private string $name;
    private string $color;
    private float $price;
    private string $temperature;

    public function __construct(string $name, string $color, float $price, string $temperature = "cold")
    {
        $this->name = $name;
        $this->color = $color;
        $this->price = $price;
        $this->temperature = $temperature;
    }

    public function getInfo()
    {
        echo "This beverage is $this->temperature and $this->color.<br>";
    }
    public function getName()
    {
        return $this->name;
    }
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
class Beer extends Beverage
{
    private float $alcoholPercentage;

    public function __construct(string $name, float $alcoholPercentage, string $color, float $price)
    {
        parent::__construct($name, $color, $price);

        $this->alcoholPercentage = $alcoholPercentage;
    }


    public function getAlcoholPercentage()
    {
        return $this->alcoholPercentage . "%";
    }

    public function beerInfo()
    {
        parent::getInfo();
        echo "Hi, I'm " . $this->getName() . " and have an alcohol percentage of " . $this->getAlcoholPercentage() . " and I have a " . $this->getColor() . " color.";
    }
}

$duvel = new Beer("Duvel", 8.5, "blond", 3.5);

echo '<pre>';
print_r($duvel->getAlcoholPercentage());
echo '</pre>';

echo '<pre>';
print_r($duvel->getColor());
echo '</pre>';

echo '<pre>';
print_r($duvel->beerInfo());
echo '</pre>';

//changer la couleur grace a set
$duvel->setColor("light");
echo '<pre>';
print_r($duvel->getColor());
echo '</pre>';

echo '<pre>';
print_r($duvel->beerInfo());
echo '</pre>';



// TODO: Make all the other prints work without error.

// Make sure that you use the variables and not just this text line.



// USE TYPEHINTING EVERYWHERE!