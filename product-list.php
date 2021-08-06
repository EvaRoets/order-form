<?php
// Makes PHP behave in a more strict way
declare(strict_types=1);

// Enable error messages
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

$products1 = new Products("Goldfish Walker", 34.99);
$products2 = new Products("Shoe Umbrella", 8.95);
$products3 = new Products("Diet Water", 1.8);
$products4 = new Products("Gas Powered Flashlight", 14.5);
$products5 = new Products("Permeable Shower Curtain", 12.95);

$products6 = new Products("Time", 1);
$products7 = new Products("Sunny Days", 2);
$products8 = new Products("Purpose of Life", 3);
$products9 = new Products("Inner Peace", 4);
$products10 = new Products("Wisdom", 5);