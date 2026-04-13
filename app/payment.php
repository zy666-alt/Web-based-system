<?php
include '_base.php';

$order_id = $_GET['order_id'] ?? 0;

// get order total
$stm = $_db->prepare("SELECT total FROM orders WHERE order_id = ?");
$stm->execute([$order_id]);
$order = $stm->fetch();

if (!$order) 
  temp('error','Invalid order');
exit;

if (is_post()) {
    $method = req('method');

    // insert payment
    $stm = $_db->prepare("
        INSERT INTO payment (order_id, total_amount, method, status, payment_date)
        VALUES (?, ?, ?, 'Paid', NOW())
    ");
    $stm->execute([$order_id, $order->total_amount, $method]);

    // update order status
    $stm = $_db->prepare("UPDATE order 
                          SET status='Paid' 
                          WHERE order_id=?");
    $stm->execute([$order_id]);
    exit;
}
?>

<h2>Payment</h2>

<p>Total: RM <?= $order->total_amount ?></p>

<form method="post">
    <label>Select Payment Method:</label><br>

    <input type="radio" name="method" value="Cash" required> Cash<br>
    <input type="radio" name="method" value="Online"> Online Banking<br>

    <br>
    <button>Confirm Payment</button>
</form>
