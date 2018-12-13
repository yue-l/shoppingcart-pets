<?php
namespace views;

/**
 * shopping cart application view
 */
?>
<!DOCTYPE html>
<html>
    <head>
        <title>ezyVet Shopping Cart</title>
        <style>
        table, th, td {
            border: 1px solid black;
        }
        </style>
    </head>
<body>
    <?php
    // products partial view
    require(__DIR__ . '/products.php');
    ?>
    <?php
    // shopping cart partial view
    require(__DIR__ . '/shoppingcart.php');
    ?>
</body>
