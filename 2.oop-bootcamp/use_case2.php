<?php

// Use Case #2
// Consider the same basket as in use case 1. The shop owner wants to have a way to have 50% off every fruit. Can you find a way to implement the discount once, and re-use it efficiently for every fruit?




class cart
{
    public float $quantities;
    public float $price;

    public function __construct(float $quantities, float $price)
    {
        $this->quantities = $quantities;
        $this->price = $price;
    }
    //méthode pour appliquer une réduction
    public function apply_reduction($discount)
    {
        //utilisation pour appliquer une réduction en poucentage
        $this->quantities *= (1 - $discount);
    }
    public function apply_taxes($taxes)
    {
        return $this->quantities * $this->price * (1 + $taxes);
    }
}
$bananas = new cart(6, 1);
$apples = new cart(3, 1.5);
$wine = new cart(2, 10);

$fruitsTaxes = 0.06;
$wineTaxes = 0.21;

$discount = 0.5;

//appliquer la réduction aux fruits
$bananas->apply_reduction($discount);
$apples->apply_reduction($discount);

$apply_taxesFruits = $bananas->apply_taxes($fruitsTaxes) + $apples->apply_taxes($fruitsTaxes);
$apply_taxesWine = $wine->apply_taxes($wineTaxes);
$apply_taxes = $apply_taxesFruits + $apply_taxesWine;

echo "total price : " . number_format($apply_taxes, 2);
