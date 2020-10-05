
<?php

// require MySQL Connection
require ('../database/DBcontroler.php');

// require Product Class
require ('../database/Product.php');

// DBController object
$db = new DBcontroler();

// Product object
$product = new Product($db);

if (isset($_POST['itemid'])){
    $result = $product->get_product($_POST['itemid']);
    echo json_encode($result);
}