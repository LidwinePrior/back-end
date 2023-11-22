<?php

declare(strict_types=1);

// EXERCISE 5

// Copy the class of exercise 1.
// TODO: Change the properties to private
class Beverage
{
    private string $color;
    private float $price;
    private string $temperature;
    public function __construct(string $color, float $price, string $temperature = "cold")
    {
        $this->color = $color;
        $this->price = $price;
        $this->temperature = $temperature;
    }
    function getPrice()
    {
        return $this->price;
    }
    function setPrice(float $price)
    {
        return  $this->price = $price;
    }
    function getInfo()
    {
        return "This beverage is $this->temperature and $this->color.<br>";
    }
}
$cola = new Beverage("black", 2);

echo $cola->getInfo();

$cola->setPrice(3.5);

echo '<pre>';
echo ($cola->getPrice() . "€");
echo '</pre>';





// TODO: Fix the errors without using getter and setter functions.
// TODO: Change the price to 3.5 euro and print it also on the screen on a new line.
