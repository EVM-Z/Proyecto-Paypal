<?php

if (!isset($_POST['producto'], $_POST['precio'])) {
    exit("Hubo un error");
}

use PayPal\Api\Payer;
use PayPal\Api\Item;

require 'config.php';

$produto = htmlspecialchars($_POST['producto']);
$precio = htmlspecialchars($_POST['precio']);
$precio = (int) $precio;
var_dump($precio);
$envio = 0;
$total = $precio + $envio;

$compra = new Payer();
$compra->setPaymentMethod('paypal');

$articulo = new Item();
$articulo->setName($produto)
        ->setCurrency('MXN')
        ->setQuantity(1)
        ->setPrice($precio);

echo $articulo->getQuantity();

?>