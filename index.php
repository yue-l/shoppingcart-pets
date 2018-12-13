<?php
namespace test;
// helper class import
require(__DIR__ . '/helpers/CustomDataProcessor.php');
use helpers\CustomDataProcessor;

// env settings
session_start();

// original array copied from task description

// added error reporting to only show error
error_reporting(E_ERROR);
$products = array(
    array(“name” => “Sledgehammer”, “price” => 125.75),
    array(“name” => “Axe”, “price” => 190.50),
    array(“name” => “Bandsaw”, “price” => 562.13),
    array(“name” => “Chisel”, “price” => 12.9),
    array(“name” => “Hacksaw”, “price” => 18.45)
);

$resultProducts = CustomDataProcessor::standardizeRawData($products);
// cart session

if ($_SESSION['shopping_cart'] == null) {
    $_SESSION['shopping_cart'] = array(
        'selected' => array(),
    );
    $serializedSession = serialize($_SESSION['shopping_cart']);
    // error handling on sessions folder writeable
    if (!file_put_contents(__DIR__ . '/sessions/'. session_id(), $serializedSession)) {
        die("Unable to open file! Please set 'sessions' folder is_writeable");
    }
} else {
    $sessionFile = file_get_contents(__DIR__ . '/sessions/'. session_id());
    unserialize($sessionFile);
}

// view rendering process
require(__DIR__ . '/views/page.php');
?>
