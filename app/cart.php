<?php
include '_base.php';

// ----------------------------------------------------------------------------
// HANDLE POST
// ----------------------------------------------------------------------------

if (is_post()) {

    $btn = req('btn');

    // clear cart
    if ($btn == 'clear') {
        $_SESSION['cart'] = [];
        redirect('?');
    }

    // update one item
    $id   = req('id');
    $unit = (int)req('unit');

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    if ($unit <= 0) {
        unset($_SESSION['cart'][$id]);
    }
    else {
        $_SESSION['cart'][$id] = $unit;
    }

    redirect();
}

// ----------------------------------------------------------------------------
// PAGE SETUP
// ----------------------------------------------------------------------------

$_title = 'Order | Shopping Cart';
include '_head.php';
?>

<style>
.popup {
    width: 80px;
    height: 80px;
    object-fit: cover;
    border: 1px solid #333;
    border-radius: 5px;
}
</style>

<h2>Shopping Cart</h2>

<table class="table">
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Price (RM)</th>
        <th>Unit</th>
        <th>Subtotal (RM)</th>
    </tr>

<?php
$count = 0;
$total = 0;

$cart = $_SESSION['cart'] ?? [];
$stm = $_db->prepare('SELECT * FROM product WHERE id=?');

if ($cart):
    foreach ($cart as $id => $unit):

        $stm->execute([$id]);
        $p = $stm->fetch();

        if (!$p) continue;

        $subtotal = $p->price * $unit;
        $count += $unit;
        $total += $subtotal;
?>
    <tr>
        <td><?= encode($p->id) ?></td>
        <td><?= encode($p->name) ?></td>
        <td class="right"><?= number_format($p->price, 2) ?></td>

        <td>
            <?php $unit = $cart[$p->id] ?? ''; ?>
            <form method="post">
                <input type="hidden" name="id" value="<?= encode($p->id) ?>">
                <?php html_select('unit', [
                    0 => 0,
                    1 => 1,
                    2 => 2,
                    3 => 3,
                    4 => 4,
                    5 => 5,
                    6 => 6,
                    7 => 7,
                    8 => 8,
                    9 => 9,
                    10 => 10
                ], null, 'onchange="this.form.submit()"'); ?>
            </form>
        </td>

        <td class="right">
            <?= number_format($subtotal, 2) ?>
            <br>
            <img src="/products/<?= encode($p->photo) ?>" class="popup">
        </td>
    </tr>
<?php
    endforeach;
endif;
?>

    <tr>
        <th colspan="3"></th>
        <th class="right"><?= $count ?></th>
        <th class="right">RM<?= number_format($total, 2) ?></th>
    </tr>
</table>

<p>
<?php if ($cart): ?>

    <form method="post" style="display:inline;">
        <input type="hidden" name="btn" value="clear">
        <button type="submit" onclick="return confirm('Clear cart?')">Clear</button>
    </form>

    <?php if (($_SESSION['role'] ?? '') == 'customer'): ?>
        <a href="checkout.php"><button type="button">Checkout</button></a>
    <?php else: ?>
        Please <a href="customer_login.php">login</a> as member to checkout
    <?php endif; ?>

<?php else: ?>
    <p>Your cart is empty.</p>
<?php endif; ?>
</p>

<?php include '_foot.php'; ?>
