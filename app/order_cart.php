<?php
include '../_base.php';

// ----------------------------------------------------------------------------
// HANDLE POST (update cart / clear cart)
// ----------------------------------------------------------------------------

if (is_post()) {

    $btn = req('btn');

    // CLEAR CART
    if ($btn == 'clear') {
        set_cart();
        redirect('?');
    }

    // UPDATE CART (from dropdown change)
    $id   = req('id');
    $unit = req('unit');

    update_cart($id, $unit);

    redirect();
}

// ----------------------------------------------------------------------------
// PAGE SETUP
// ----------------------------------------------------------------------------

$_title = 'Order | Shopping Cart';
include '../_head.php';
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

$cart = get_cart();
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
        <td><?= $p->id ?></td>
        <td><?= $p->name ?></td>
        <td class="right"><?= number_format($p->price, 2) ?></td>

        <td>
            <form method="post">
                <!-- FIXED: pass product id -->
                <?= html_hidden('id', $p->id) ?>

                <!-- FIXED: show current unit -->
                <?= html_select('unit', $_units, $unit) ?>
            </form>
        </td>

        <td class="right">
            <?= number_format($subtotal, 2) ?>
            <br>
            <img src="/products/<?= $p->photo ?>" class="popup">
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

    <!-- CLEAR CART -->
    <button data-post="?btn=clear" data-confirm="Clear cart?">Clear</button>

    <!-- CHECKOUT -->
    <?php if ($_user?->role == 'Member'): ?>
        <button data-post="checkout.php">Checkout</button>
    <?php else: ?>
        Please <a href="/login.php">login</a> as member to checkout
    <?php endif; ?>

<?php endif; ?>
</p>

<script>
// auto submit when unit changes
$('select').on('change', e => e.target.form.submit());
</script>

<?php include '../_foot.php'; ?>
