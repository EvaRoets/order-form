<?php // This files is mostly containing things for your view / html ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" type="text/css"
          rel="stylesheet"/>
    <title>Things you don't need</title>
</head>
<body>

<div class="container">
    <h1>Place your order</h1>

    <?php if (!empty($confirmationMsg)) { ?>
        <div class="<?php if ($confirmationMsg[$invalidFields]) {echo 'alert-danger'; } else { echo 'alert-success'; } ?>">
            <?= $confirmationMsg ?>
        </div>
    <?php } ?>



    <nav>
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link active" href="index.php?order=products1">Things you don't need</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?order=products2">Things you can't buy</a>
            </li>
        </ul>
    </nav>


    <form method="post">
        <fieldset>
            <legend>Products</legend>
            <?php foreach ($products as $i => $product): ?>
                <label>
                    <?php // <?p= is equal to <?php echo ?>
                    <input type="checkbox" value="1" name="products[<?php echo $i ?>]"/> <?php echo $product->name?>
                    -
                    &euro;<?= number_format($product->price, 2) ?></label><br/>
            <?php endforeach; ?>
        </fieldset>

        <fieldset>
            <legend>Address</legend>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="email">E-mail:</label>
                    <input type="email" id="email" name="email" class="form-control" value="<?php if(isset($_SESSION["email"])){echo $_SESSION["email"];} else {echo "";} ?>"/>
                </div>
                <div></div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="street">Street:</label>
                    <input type="text" name="street" id="street" class="form-control" value="<?php if(isset($_SESSION["street"])){echo $_SESSION["street"];} else {echo "";} ?>"/>
                </div>

                <div class="form-group col-md-6">
                    <label for="streetnumber">Street number:</label>
                    <input type="text" id="streetnumber" name="streetnumber" class="form-control" value="<?php if(isset($_SESSION["streetnumber"])){echo $_SESSION["streetnumber"];} else {echo "";} ?>"/>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="city">City:</label>
                    <input type="text" id="city" name="city" class="form-control" value="<?php if(isset($_SESSION["city"])){echo $_SESSION["city"];} else {echo "";} ?>"/>
                </div>
                <div class="form-group col-md-6">
                    <label for="zipcode">Zipcode</label>
                    <input type="text" id="zipcode" name="zipcode" class="form-control" value="<?php if(isset($_SESSION["zipcode"])){echo $_SESSION["zipcode"];} else {echo "";} ?>"/>
                </div>
            </div>

        </fieldset>

        <button type="submit" class="btn btn-primary">Order!</button>
    </form>

    <footer>You already ordered <strong>&euro; <?php echo $totalValue ?></strong> in useless products.</footer>
</div>
<style>
    footer {
        text-align: center;
    }
</style>
</body>
</html>