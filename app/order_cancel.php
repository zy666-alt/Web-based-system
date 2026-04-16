<?php
include '_base.php';

if (is_post()) {

    $order_id = req('order_id');
    $user_id  = $_SESSION['user']['id']; // logged-in member

    // Check order belongs to user + not already processed
    $stm = $_db->prepare("
        SELECT * FROM orders 
        WHERE id = ? AND user_id = ?
    ");
    $stm->execute([$order_id, $user_id]);
    $order = $stm->fetch();

    if (!$order) {
        temp('info', 'Order not found');
        redirect('order_list.php');
    }

    if ($order['status'] != 'Pending') {
        temp('info', 'Cannot cancel this order');
        redirect('order_list.php');
    }

    // Cancel order
    $stm = $_db->prepare("
        UPDATE orders 
        SET status = 'Cancelled' 
        WHERE id = ?
    ");
    $stm->execute([$order_id]);

    temp('info', 'Order cancelled successfully');
    redirect('order_list.php');
}

redirect('order_list.php');
