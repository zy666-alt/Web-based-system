<?php
include '../_base.php';

// ----------------------------------------------------------------------------
// CHECK LOGIN
// ----------------------------------------------------------------------------

if (!$_user || $_user->role != 'Member') {
    temp('info', 'Please login as member to checkout');
    redirect('/login.php');
}

// ----------------------------------------------------------------------------
// GET CART
// ----------------------------------------------------------------------------

$cart = get_cart();

if (!$cart) {
    temp('info', 'Your cart is empty');
    redirect('cart.php');
}

// ----------------------------------------------------------------------------
// PROCESS ORDER (SAVE ORDER)
// ----------------------------------------------------------------------------

if (is_post()) {

    // Example: save order to database (basic version)

    $user_id = $_user->id;

    $stm = $_db->prepare('INSERT INTO orders (user_id, created_at) VALUES (?, NOW())');
    $stm->execute([$user_id]);

    $order_id = $_db->lastInsertId();

    $stmItem = $_db->prepare('INSERT INTO order_items (order_id, product_id, unit, price) VALUES (?, ?, ?, ?)');

    $stmProduct = $_db->prepare('SELECT * FROM product WHERE id=?');

    foreach ($cart as $id => $unit) {

        $stmProduct->execute([$id]);
        $p = $stmProduct->fetch();

        if (!$p) continue;

        $stmItem->execute([
            $order_id,
            $id,
            $unit,
            $p->price
        ]);
    }

    // clear cart
    set_cart();

    temp('info', 'Order placed successfully!');
    redirect('order_success.php');
}

// ----------------------------------------------------------------------------
// PAGE
// ----------------------------------------------------------------------------

$_title = 'Checkout';
include '../_head.php';
?>

<h2>Checkout</h2>

<p>Confirm your order?</p>

<form method="post">
    <button type="submit">Confirm Order</button>
    <button type="button" data-get="cart.php">Back to Cart</button>
</form>

<?php include '../_foot.php'; ?>
