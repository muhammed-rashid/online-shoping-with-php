<?php
include('database/DBcontroler.php');
include('database/product.php');
include('database/cart.php');
include('database/wishlist.php');


$db = new DBcontroler();


$product = new product($db);
$data = $product->getData();
shuffle($data);

$cart = new cart($db);
$wish_list = new wishlist($db);

?>