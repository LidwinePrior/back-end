<?php

// Use Case #1
// A basket contains the following things:

// Banana's (6 pieces, costing €1 each)
// Apples (3 pieces, costing €1.5 each)
// Bottles of wine (2 bottles, costing €10 each)
// Without using classes, do the following in your code:

// Calculate the total price
// Calculate how much of the total price is tax (fruit goes at 6%, wine is 21%)
// Next, do the same with classes. What style do you prefer? Do you notice any difference in time needed to code, structure or readability? From now on, if nothing is stated specifically, it's recommended to use classes.




//WHITOUT CLASSES

//articles et quantités

$banana = 6;
$apple = 3;
$wine = 2;

//prix par article

$bananaPrice = 1;
$appelePrice = 1.5;
$winePrice = 10;

//taxes

$fruitsTaxes = 0.06;
$wineTaxes = 0.21;

//calculer le prix total avec les taxes
//le 1 représente le prix initial de l'article avant la taxe
$totalPriceFruits = ($banana * $bananaPrice + $apple * $appelePrice) * (1 + $fruitsTaxes);
$totalPriceWine = ($wine * $winePrice) * (1 + $wineTaxes);
$totalPrice = $totalPriceFruits + $totalPriceWine;

//le number_format et le 2 est utilisé pour formater le prix en une chaîne de caractères avce 2 chiffres après la virgule
echo "1. total price : " . number_format($totalPrice, 2) . "<br>";


//WITH CLASSES

//définir la class cart
class cart
{
    //propriétés de la classe (quantité, prix)
    public float $quantities;
    public float $price;

    //constructeur de la classe pour initialiser les propriétés lors de la création de l'objet
    public function __construct(float $quantities, float $price)
    {
        $this->quantities = $quantities;
        $this->price = $price;
    }
    //méthode pour calculer le prix total avec les taxes
    public function totalPrice($taxes)
    {
        return $this->quantities * $this->price * (1 + $taxes);
    }
}
//créer l'objet de la class cart pour représenter les différents articles dans le panier
//articles avec quantités et prix
$bananas = new cart(6, 1);
$apples = new cart(3, 1.5);
$wine = new cart(2, 10);

//taxes
$fruitsTaxes = 0.06;
$wineTaxes = 0.21;

//calculer prix total avec taxes pour les fruits
$totalPriceFruits = $bananas->totalPrice($fruitsTaxes) + $apples->totalPrice($fruitsTaxes);
//calculer prix total avec taxes pour le vin
$totalPriceWine = $wine->totalPrice($wineTaxes);
//prix total
$totalPrice = $totalPriceFruits + $totalPriceWine;

//afficher le prix avec précision de 2 décimal
echo "2. total price : " . number_format($totalPrice, 2);
