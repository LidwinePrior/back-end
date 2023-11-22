<?php

declare(strict_types=1);

// EXERCISE 4

// Copy the code of exercise 3 to here and delete everything related to cola.
// TODO: Make all properties protected.
class Beverage
{
    protected string $name;
    protected string $color;
    protected float $price;
    protected string $temperature;

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
}
class Beer extends Beverage
{
    private float $alcoholPercentage;

    public function __construct(string $name, float $alcoholPercentage, string $color, float $price)
    {
        parent::__construct($name, $color, $price);

        $this->alcoholPercentage = $alcoholPercentage;
    }


    public function beerInfo()
    {
        parent::getInfo();
        echo "Hi, je suis " . $this->name . " et j'ai un pourcentage d'alcool de " . $this->alcoholPercentage . "% et ma couleur est " . $this->color . ".";
    }

    public function getColor()
    {
        return $this->color;
    }
    public function setColor(string $color)
    {
        $this->color = $color;
    }
}

$duvel = new Beer("Duvel", 8.5, "blond", 3.5);


$duvel->beerInfo();


//changer la couleur grace a set
echo '<pre>';
print_r($duvel->getColor());
echo '</pre>';

$duvel->setColor("light");

echo '<pre>';
print_r($duvel->getColor());
echo '</pre>';




// TODO: Make all the other prints work without error without changing the beverage class.
// TODO: Don't call getters in de child class.

// USE TYPEHINTING EVERYWHERE!
