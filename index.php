<?php

// Makes PHP behave in a more strict way
declare(strict_types=1);

// Enable error messages
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

// Enable sessions
session_start();

// Add classes
require "php/Product.php";
require "php/Order.php";
require "php/product-list.php";

// Enable overview of these variables
function whatIsHappening()
{
    var_dump("<pre>");
    echo '<h2>$_GET</h2>';
    var_dump($_GET);
    echo '<h2>$_POST</h2>';
    var_dump($_POST);
    echo '<h2>$_COOKIE</h2>';
    var_dump($_COOKIE);
    echo '<h2>$_SESSION</h2>';
    var_dump($_SESSION);
    echo '<h2>$_SERVER</h2>';
    var_dump($_SERVER["REQUEST_URI"]);
    var_dump("</pre>");
}
//whatIsHappening();
//
// List products
$products1 = [
    $product1,
    $product2,
    $product3,
    $product4,
    $product5,
];

$products2 = [
    $product6,
    $product7,
    $product8,
    $product9,
    $product10,
];

$totalValue = 0;

if (isset($_GET['products1'])) {
    $uselessProductsSelected = true;
    $products = $products1;
} else {
    $uselessProductsSelected = false;
    $products = $products2;
}

// Validate submitted field values
function validate(): array
{
    // Create and return invalid fields array
    $invalidFields = [];
    if (empty($_POST["email"])) {
        array_push($invalidFields, "email");
    }
    if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        array_push($invalidFields, "emailInvalid");
    }
    if (empty($_POST["street"])) {
        array_push($invalidFields, "street");
    }
    if (empty($_POST["streetnumber"])) {
        array_push($invalidFields, "streetnumber");
    }
    if (empty($_POST["city"])) {
        array_push($invalidFields, "city");
    }
    if (empty($_POST["zipcode"])) {
        array_push($invalidFields, "zipcode");
    }
    if (!is_numeric($_POST["zipcode"])) {
        array_push($invalidFields, "zipcodeInvalid");
    }
    return $invalidFields;
}

function handleForm($products, &$totalValue)
{
    // Validation (return invalidly submitted fields)
    $invalidFields = validate();
    // Handle errors caused by invalidly submitted fields
    if (!empty($invalidFields)) {
        if (in_array("email", $invalidFields)) {
            $errorMsg = "Please fill out your e-mail address.";
            $errorMsg .= "<br>";
        } // Check if email address is valid
        elseif (in_array("emailInvalid", $invalidFields)) {
            $errorMsg = "Invalid e-mail format.";
            $errorMsg .= "<br>";
        }
        if (in_array("street", $invalidFields)) {
            $errorMsg = "Please fill out your street.";
            $errorMsg .= "<br>";
        }
        if (in_array("streetnumber", $invalidFields)) {
            $errorMsg = "Please fill out your street number.";
            $errorMsg .= "<br>";
        }
        if (in_array("city", $invalidFields)) {
            $errorMsg = "Please fill out your city.";
            $errorMsg .= "<br>";
        }
        if (in_array("zipcode", $invalidFields)) {
            $errorMsg = "Please fill out your zip code.";
            $errorMsg .= "<br>";
        } // Check if zip code consists of only numbers
        elseif (in_array("zipcodeInvalid", $invalidFields)) {
            $errorMsg = "Zip code can only have numeric values.";
        }
        // Display any empty or invalid data with corresponding error message
        return [
            "order" => null,
            "message" => "<div class='alert alert-danger'>" . $errorMsg . "</div>",
        ];

    } else{
        // Loop through product arrays
        $productNumbers = array_keys($_POST["products"]);
        $orderedProducts = [];
        foreach ($productNumbers as $productNumber) {
            $orderedProducts[] = $products[$productNumber];
        }

        // Set address data
        $order = new Order ($_POST["email"], $_POST["street"], (int)$_POST["streetnumber"], (int)$_POST["zipcode"], $_POST["city"], $orderedProducts);

        // Save data in session on submit to keep it displayed after error message
        $_SESSION["email"] = $order->getEmail();
        $_SESSION["street"] = $order->getStreet();
        $_SESSION["streetnumber"] = $order->getStreetNumber();
        $_SESSION["city"] = $order->getCity();
        $_SESSION["zipcode"] = $order->getZipCode();

        // Return selected products and address data
        return [
            "order" => $order,
            "message" => "<div class='alert alert-success'>" . $order->confirmationMsg() . "</div>",
        ];
    }
}

// Check if form is not empty when submitted
$formSubmitted = !empty($_POST);
$confirmationMsg = [];
if ($formSubmitted) {
    $result = handleForm($products, $totalValue);
    $confirmationMsg = $result["message"];
    $order = $result["order"];
}

// Includes and evaluates the specified file
require "php/form-view.php";

//Nice-to-have features
//TODO Show the expected delivery time in the confirmation message (2h by default).
//TODO A user can opt for express delivery (5$ for delivery in 45min).

//TODO Show statistics about how much money has been spent. This info should be kept (can you use the session or cookies for this?) when the browser closes.
//TODO Include the most popular product (by this user) and amount of products bought by this user.

//TODO Add a color schema and a suitable font
//TODO improve validation with html and JS

//TODO Allow user to specify how much he or she wants to buy of a certain products
