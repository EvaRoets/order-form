<?php

// This file is your starting point (= since it's the index)
// It will contain most of the logic, to prevent making a messy mix in the html

// This line makes PHP behave in a more strict way
declare(strict_types=1);

// TODO enable error messages
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

// We are going to use session variables so we need to enable sessions
session_start();

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
    var_dump("</pre>");
}
whatIsHappening();

//provide some products (you may overwrite the example)
$products = [
    ["name" => "Goldfish Walker", "price" => 34.99],
    ["name" => "Shoe Umbrella", "price" => 8.95],
    ["name" => "Diet Water", "price" => 1.8],
    ["name" => "Gas Powered Flashlight", "price" => 14.5],
    ["name" => "Permeable Shower Curtain", "price" => 14.5],

];

$totalValue = 0;

function validate()
{
    // This function will send a list of invalid fields back
    return [];
}

function handleForm($products)
{
    // TODO: form related tasks (step 1)
    //TODO check if form is correctly submitted
//    if (isset ($_POST["submit"])){
//        echo "Submit button is clicked.";
//
//    } else {
//        echo "Data is not submitted";
//    }

    //TODO on submit save data in session
    $email = $_POST["email"];
    $street = $_POST["street"];
    $streetnumber = $_POST["streetnumber"];
    $city = $_POST["city"];
    $zipcode = $_POST["zipcode"];

    //TODO display selected products and address data (alert box - bootstrap): message
    $productNumbers= array_keys($_POST["products"]);
    $productNames = [];
    foreach ($productNumbers as $productNumber) {
        $productNames[] = $products[$productNumber]["name"];
    }

    $message = "You picked the following useless products : <br> " . implode(", ", $productNames);
    $message .= "<br>";
    $message .= "Your email address : " . $email;
    $message .= "<br>";
    $message .= "Your address : " . $street . " " . $streetnumber . ", " . $zipcode . " " . $city;
    return $message;

    // Validation (step 2)
    $invalidFields = validate();
    if (!empty($invalidFields)) {
        // TODO: handle errors
    } else {
        // TODO: handle successful submission
    }
}

// TODO: replace this if by an actual check
$formSubmitted = !empty($_POST); // Check if form is empty
$confirmationMessage = "";
if ($formSubmitted) {
    $confirmationMessage = handleForm($products);
}

$form_view = require "form-view.php"; // includes and evaluates the specified file
echo $form_view;

//STEP 2 VALIDATION
//TODO check Required fields are not empty
//TODO check Zip code are only numbers
//TODO check Email address is valid
//TODO Show any problems (empty or invalid data) with the fields at the top of the form. Tip: use the bootstrap alerts for inspiration.
//TODO Show previous values in case of invalid form


//STEP 3 SAVE DATA TO IMPROVE UX
//TODO Check out the possibilities of the PHP session and cookies.
//TODO prefill the address (after the first usage), as long as the browser isn't closed. Which of these techniques is the better choice here?
//TODO check any legal requirements when using cookies

//STEP 4 EXPANDING DUE TO SUCCESS
//TODO Read about get_variables and what you can do with it.
//TODO Find commented navigation and activate it. Tweak the content for your own store
//TODO Make a second category of products in a new array

// Time
// Manners
// Sunny Days
// Purpose of Life
// Inner Peace
// Wisdom

//TODO make navigation toggle between the two product categories

//Nice-to-have features
//TODO Show the expected delivery time in the confirmation message (2h by default).
//TODO A user can opt for express delivery (5$ for delivery in 45min).

//TODO Show statistics about how much money has been spent. This info should be kept (can you use the session or cookies for this?) when the browser closes.
//TODO Include the most popular product (by this user) and amount of products bought by this user.

//TODO Add a color schema and a suitable font
//TODO improve validation with html and JS

//TODO Allow user to specify how much he or she wants to buy of a certain products
