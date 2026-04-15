<?php
include '../_base.php';

// ----------------------------------------------------------------------------
// CHECK LOGIN
// ----------------------------------------------------------------------------

if (!$_user) {
    temp('info', 'Please login first');
    redirect('/login.php');
}

// ----------------------------------------------------------------------------
// GET USER ORDERS
// ----------------------------------------------------------------------------

$user_id = $_user->id;

$stm = $_db->prepare("
    SELECT * 
    FROM orders 
    WHERE user_id = ? 
    ORDER BY created_at DESC
");
$stm->execute([$user_id]);
$orders = $stm->fetchAll();

// ----------------------------------------------------------------------------

$_title = 'Order | History';
include '../_head.php';
?>

<h2>Order History</h2>

<?php if (!$orders): ?>
    <p>No orders found.</p>
<?php else: ?>

<?php foreach ($orders as $o): ?>

    <h3>Order #<?= $o->id ?> (<?= $o->created_at ?>)</h3>

    <table class="table">
        <tr>
            <th>Product</th>
            <th>Unit</th>
            <th>Price (RM)</th>
            <th>Subtotal (RM)</th>
        </tr>

        <?php
        $stmItem = $_db->prepare("
            SELECT oi.*, p.name, p.photo
            FROM order_items oi
            JOIN product p ON p.id = oi.product_id
            WHERE oi.order_id = ?
        ");
        $stmItem->execute([$o->id]);
        $items = $stmItem->fetchAll();

        $total = 0;
        ?>

        <?php foreach ($items as $i): ?>
            <?php
                $subtotal = $i->unit * $i->price;
                $total += $subtotal;
            ?>
            <tr>
                <td>
                    <img src="/products/<?= $i->photo ?>" width="50">
                    <?= $i->name ?>
                </td>
                <td><?= $i->unit ?></td>
                <td><?= number_format($i->price, 2) ?></td>
                <td><?= number_format($subtotal, 2) ?></td>
            </tr>
        <?php endforeach; ?>

        <tr>
            <th colspan="3" class="right">Total</th>
            <th><?= number_format($total, 2) ?></th>
        </tr>
    </table>

<?php endforeach; ?>

<?php endif; ?>

<?php include '../_foot.php'; ?>
