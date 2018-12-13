<?php
/**
 * Redirect to shopping cart page.
 * @var $theProtocolPrefix          holder for explode return for PHP5.3 issues
 * @var $protocol                   holder for url redirect
 */
$theProtocolPrefix = explode('/', $_SERVER['SERVER_PROTOCOL']);
$protocol = strtolower($theProtocolPrefix[0]) . '://';
header('Location: ' . $protocol . $_SERVER['HTTP_HOST']);
