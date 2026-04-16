<?php
include '_base.php';
auth_user(); // must login

// get cart from session
$cart = $_SESSION['cart'] ?? [];

if (!$cart) {
    temp('info', 'Cart is empty');
    redirect('cart.php');
}

// calculate total
$total = 0;
foreach ($cart as $id => $qty) {
    $stm = $_db->prepare("SELECT price FROM product WHERE id = ?");
    $stm->execute([$id]);
    $p = $stm->fetch();

    $total += $p->price * $qty;
}

// insert order
$stm = $_db->prepare("
    INSERT INTO orders (user_id, total)
    VALUES (?, ?)
");
$stm->execute([$_user->id, $total]);

$order_id = $_db->lastInsertId();

// insert order items
foreach ($cart as $id => $qty) {

    $stm = $_db->prepare("SELECT price FROM product WHERE id = ?");
    $stm->execute([$id]);
    $p = $stm->fetch();

    $stm = $_db->prepare("
        INSERT INTO order_items (order_id, product_id, price, qty)
        VALUES (?, ?, ?, ?)
    ");
    $stm->execute([$order_id, $id, $p->price, $qty]);
}

// clear cart
unset($_SESSION['cart']);

temp('info', 'Order placed successfully!');

// go to payment page
redirect("payment.php?id=$order_id");
