<?php
include '_base.php';
auth_admin();

$id = req('id');

// get order
$stm = $_db->prepare("SELECT * FROM orders WHERE id=?");
$stm->execute([$id]);
$order = $stm->fetch();

if (!$order) {
    redirect('order_list_admin.php');
}

if (is_post()) {
    $status = req('status');

    $stm = $_db->prepare("
        UPDATE orders SET status = ?
        WHERE id = ?
    ");
    $stm->execute([$status, $id]);

    temp('info', 'Order updated');
    redirect('order_list_admin.php');
}
?>

<h2>Update Order #<?= $order->id ?></h2>

<form method="post">
    <select name="status">
        <option <?= $order->status=='Pending'?'selected':'' ?>>Pending</option>
        <option <?= $order->status=='Paid'?'selected':'' ?>>Paid</option>
        <option <?= $order->status=='Shipped'?'selected':'' ?>>Shipped</option>
        <option <?= $order->status=='Cancelled'?'selected':'' ?>>Cancelled</option>
    </select>

    <button type="submit">Update</button>
</form>
