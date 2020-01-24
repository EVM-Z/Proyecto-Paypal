<?php

if (!isset($_POST['producto'], $_POST['precio'])) {
    exit("Hubo un error");
}

use PayPal\Api\Payer;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Details;
use PayPal\Api\Amount;

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

$listaArticulos = new ItemList();
$listaArticulos->setItems(array($articulo));

$detalles = new Details();
$detalles->setShipping($envio)
        ->setSubtotal($precio);

// Cantidad a pagar
$cantidad = new Amount();
$cantidad->setCurrency('MXN')
        ->setTotal($precio)
        ->setDetails($detalles);

?>