<?php
if (isset($_POST['action']) == "addToCart") {
    $id = $_POST['id'];
    $productName = $_POST['productName'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $res = 0;
    $cart = [
        'id' => $id,
        'productName' => $productName,
        'price' => $price,
        'quantity' => $quantity
    ];
    if (isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id]['quantity'] += $quantity;
        echo  $res = 1;
    } else {
        $_SESSION['cart'][$id] = $cart;
        echo $res = 1;
    }
}