<?php
// This file is your starting point (= since it's the index)
// It will contain most of the logic, to prevent making a messy mix in the html

// This line makes PHP behave in a more strict way
declare(strict_types=1);

// Enable error messages
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

// We are going to use session variables so we need to enable sessions
session_start();
// Add classes
require "Products.php";
require "Orders.php";

// Use this function when you need to need an overview of these variables
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

whatIsHappening();

// Provide some products (you may overwrite the example)
$products1 = new Products("Goldfish Walker", 34.99);
$products2 = new Products("Shoe Umbrella", 8.95);
$products3 = new Products("Diet Water", 1.8);
$products4 = new Products("Gas Powered Flashlight", 14.5);
$products5 = new Products("Permeable Shower Curtain", 12.95);

$products6 = new Products("Time", 1);
$products7 = new Products("Sunny Days", 2);
$products8 = new Products("Purpose of Life", 3);
$products9 = new Products("Inner Peace", 5);
$products10 = new Products("Wisdom", 5);

$products1 = [
    $products1,
    $products2,
    $products3,
    $products4,
    $products5,
];

$products2 = [
    $products6,
    $products7,
    $products8,
    $products9,
    $products10,
];

$totalValue = 0;

function validate()
{
    // This function will send a list of invalid fields back
    $invalidFields = [];
    if (empty($_POST["email"])) {
        //if (!isset($_POST["email"])) {
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
    // Validation (step 2)
    $invalidFields = validate();
    if (!empty($invalidFields)) {
        // Handle errors
        // Check required fields are not empty
        if (in_array("email", $invalidFields)) {
            $errorMsg = "Please fill out your e-mail address.";
            $errorMsg .= "<br>";

        } // Check Email address is valid
        elseif (in_array("emailInvalid", $invalidFields)) {
            $errorMsg = "Invalid e-mail format.";
            $errorMsg .= "<br>";
        }
        if (in_array("street", $invalidFields)) {
            $errorMsg .= "Please fill out your street.";
            $errorMsg .= "<br>";
        }
        if (in_array("streetnumber", $invalidFields)) {
            $errorMsg .= "Please fill out your street number.";
            $errorMsg .= "<br>";
        }
        if (in_array("city", $invalidFields)) {
            $errorMsg .= "Please fill out your city.";
            $errorMsg .= "<br>";
        }
        if (in_array("zipcode", $invalidFields)) {
            $errorMsg .= "Please fill out your zip code.";
            $errorMsg .= "<br>";
        } //check zip code are only numbers
        elseif (in_array("zipcodeInvalid", $invalidFields)) {
            $errorMsg .= "Zip code can only have numeric values.";
        }
        //Show any problems (empty or invalid data) with the fields at the top of the form. Tip: use the bootstrap alerts for inspiration.
        return "<div class='alert alert-danger'>" . $errorMsg . "</div>";

    } elseif (empty($invalidFields)) {
        //Form related tasks (step 1)
        //display selected products and address data (alert box - bootstrap): message
        $productNumbers = array_keys($_POST["products"]); //TODO check how to look thru class array
        $productNames = [];
        foreach ($productNumbers as $productNumber) {
            $productNames[] = $products[$productNumber]->name;
            $totalValue = $totalValue + $products[$productNumber]->price;
        }

        $email = htmlspecialchars($_POST["email"]);
        $street = htmlspecialchars($_POST["street"]);
        $streetNumber = htmlspecialchars($_POST["street"]);
        $zipcode = htmlspecialchars($_POST["zipcode"]);
        $city = htmlspecialchars($_POST["city"]);

        $message = "You picked the following useless products : <br> " . implode(", ", $productNames);
        $message .= "<br>";
        $message .= "Your email address : " . $email;
        $message .= "<br>";
        $message .= "Your address : " . $street . " " . $streetNumber . ", " . $zipcode . " " . $city;

        //On submit save data in session
        $_SESSION["email"] = $email;
        $_SESSION["street"] = $street;
        $_SESSION["streetnumber"] = $streetNumber;
        $_SESSION["city"] = $city;
        $_SESSION["zipcode"] = $zipcode;

        unset($email, $street, $streetNumber, $city, $zipcode, $products);
        return "<div class='alert alert-success'>" . $message . "</div>";
    }

}

//replace this if by an actual check
$formSubmitted = !empty($_POST); // Check if form is empty
$confirmationMsg = [];
if ($formSubmitted) {
    $confirmationMsg = handleForm($products1, $totalValue);
}

require "form-view.php"; // includes and evaluates the specified file

//STEP 4 EXPANDING DUE TO SUCCESS
//TODO Find commented navigation and activate it. Tweak the content for your own store
//TODO make navigation toggle between the two product categories

//Nice-to-have features
//TODO Show the expected delivery time in the confirmation message (2h by default).
//TODO A user can opt for express delivery (5$ for delivery in 45min).

//TODO Show statistics about how much money has been spent. This info should be kept (can you use the session or cookies for this?) when the browser closes.
//TODO Include the most popular product (by this user) and amount of products bought by this user.

//TODO Add a color schema and a suitable font
//TODO improve validation with html and JS

//TODO Allow user to specify how much he or she wants to buy of a certain products


