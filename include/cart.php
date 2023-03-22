<?php
if (!empty($_POST)) {
    if (isset($_POST)) {
        $id = $_POST['id'];
    }
}
$action = (isset($_POST['action'])) ? $_POST['action'] : 'addToCart';
$quantity = (isset($_POST['quantity'])) ? $_POST['quantity'] : 1;
if ($action == "addToCart") {
    $id = $_POST['id'];
    $productName = $_POST['productName'];
    $raw_price = str_replace(',', '', $_POST['price']);
    $quantity = $_POST['quantity'];
    $status = 0;
    $price = explode(" ", $raw_price)[0];
    $data = executeResult("SELECT * FROM product where id_product=$id");
    $cart = [
        'id' => $id,
        'productName' => $productName,
        'image' => $data[0]['anh_sanpham'],
        'price' => $price,
        'quantity' => $quantity,
        'sltk' => $data[0]['soluong'],

    ];
    if (isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id]['quantity'] += $quantity;
        return  $status = 1;
    } else {
        $_SESSION['cart'][$id] = $cart;
        return $status = 1;
    }
}
if ($action == 'update') {
    $_SESSION['cart'][$id]['quantity'] = $quantity;
}
if ($action == 'delete') {
    unset($_SESSION['cart'][$id]);
    echo "okko";
}