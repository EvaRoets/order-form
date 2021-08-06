<?php ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" type="text/css"
          rel="stylesheet"/>
<!--    <link rel="stylesheet" href="reset.css">-->
    <link rel="stylesheet" href="../css/style.css">
    <title>Useless and priceless things</title>
</head>
<body>

<div class="container">
    <h1>Place your order</h1>

    <?php if (!empty($confirmationMsg)) { ?>
        <div class="<?php if ($confirmationMsg[$invalidFields]) {
            echo 'alert-danger';
        } else {
            echo 'alert-success';
        } ?>">
            <?= $confirmationMsg ?>
        </div>
    <?php } ?>

    <nav>
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link active" href="..?products1">Useless things</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="..?products2">Priceless things</a>

            </li>
        </ul>
    </nav>

    <form method="post">

        <fieldset>
<!--            <legend>Products</legend>-->
            <?php if ($uselessProductsSelected) : ?>
                <?php foreach ($products1 as $i => $product): ?>
                    <label>
                        <input type="checkbox"
                               value="1"
                               name="products[<?= $i ?>]"/>
                        <?= $product->name ?> - <?= $product->formattedPrice() ?></label><br/>
                <?php endforeach; ?>
            <?php else : ?>
                <?php foreach ($products2 as $i => $product): ?>
                    <label>
                        <input type="checkbox"
                               value="1"
                               name="products[<?= $i ?>]"/>
                        <?= $product->name ?> - <?= $product->formattedPrice() ?></label><br/>
                <?php endforeach; ?>
            <?php endif; ?>
        </fieldset>

        <fieldset>
            <legend>Address</legend>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="email">E-mail</label>
                    <input type="email" id="email" name="email" class="form-control"
                           value="<?php
                           if (isset($_SESSION)) {
                               echo $_SESSION["email"];
                           } else {
                               echo "";
                           } ?>"/>
                </div>
                <div></div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="street">Street</label>
                    <input type="text" name="street" id="street" class="form-control"
                           value="<?php
                           if (isset($_SESSION["street"])) {
                               echo $_SESSION["street"];
                           } else {
                               echo "";
                           } ?>"/>
                </div>

                <div class="form-group col-md-6">
                    <label for="streetnumber">Street number</label>
                    <input type="text" id="streetnumber" name="streetnumber" class="form-control"
                           value="<?php
                           if (isset($_SESSION["streetnumber"])) {
                               echo $_SESSION["streetnumber"];
                           } else {
                               echo "";
                           } ?>"/>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="city">City</label>
                    <input type="text" id="city" name="city" class="form-control"
                           value="<?php
                           if (isset($_SESSION["city"])) {
                               echo $_SESSION["city"];
                           } else {
                               echo "";
                           } ?>"/>
                </div>

                <div class="form-group col-md-6">
                    <label for="zipcode">Zipcode</label>
                    <input type="text" id="zipcode" name="zipcode" class="form-control"
                           value="<?php
                           if (isset($_SESSION["zipcode"])) {
                               echo $_SESSION["zipcode"];
                           } else {
                               echo "";
                           } ?>"/>
                </div>
            </div>

        </fieldset>
        <div class="divbtn">
        <button type="submit" class="btn">Order!</button>
        </div>
    </form>

</div>
</body>
</html>