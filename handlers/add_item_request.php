<?php
namespace handlers;

session_start();

$sessionFile = file_get_contents(__DIR__ . '/../sessions/'. session_id());
unserialize($sessionFile);

// maipulate session cart
if (array_key_exists($_POST['name'], $_SESSION['shopping_cart']['selected'])) {
    $quatity = ++$_SESSION['shopping_cart']['selected'][$_POST['name']]['quatity'];
    $_SESSION['shopping_cart']['selected'][$_POST['name']]['total'] = number_format($_POST['price'], 2, '.', ',') * $quatity;
} else {
    $_SESSION['shopping_cart']['selected'][$_POST['name']] = array(
        'name' => $_POST['name'],
        'price' => $_POST['price'],
        'quatity' => 1,
        'total' => number_format($_POST['price'], 2, '.', ',')
    );
}

// session serialization to file
$serializedSession = serialize($_SESSION['shopping_cart']);
file_put_contents(__DIR__ . '/../sessions/'. session_id(), $serializedSession) or die("Unable to open file!");

// redirect to shopping cart page.
require('redirect_header.php');
