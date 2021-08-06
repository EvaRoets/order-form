<?php
// Makes PHP behave in a more strict way
declare(strict_types=1);

// Enable error messages
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

// Array products1
$product1 = new Product("Goldfish Walker", 34.99);
$product2 = new Product("Shoe Umbrella", 8.95);
$product3 = new Product("Diet Water", 1.8);
$product4 = new Product("Gas Powered Flashlight", 14.5);
$product5 = new Product("Permeable Shower Curtain", 12.95);

// Array products2
$product6 = new Product("Time", 1);
$product7 = new Product("Sunny Days", 2);
$product8 = new Product("Purpose of Life", 3);
$product9 = new Product("Inner Peace", 4);
$product10 = new Product("Wisdom", 5);