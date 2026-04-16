<?php
require '_base.php';

if (empty($_SESSION['customer'])) {
    header('Location: Login.php');
    exit;
}

$_title = 'Customer Profile';
include '_head.php';

$customer = $_SESSION['customer'];
?>

<h2>Customer Details</h2>

<div class="customer-box">
    <table class="customer-table">
        <tr>
            <th>Customer ID</th>
            <td><?= htmlspecialchars($customer->ID ?? '') ?></td>
        </tr>
        <tr>
            <th>Name</th>
            <td><?= htmlspecialchars($customer->Name ?? '') ?></td>
        </tr>
        <tr>
            <th>Email</th>
            <td><?= htmlspecialchars($customer->Email ?? '') ?></td>
        </tr>
        <tr>
            <th>Phone Number</th>
            <td><?= htmlspecialchars($customer->Phone_number ?? '') ?></td>
        </tr>
        <tr>
            <th>Gender</th>
            <td><?= htmlspecialchars($customer->Gender ?? '') ?></td>
        </tr>
        <tr>
            <th>Address Line 1</th>
            <td><?= htmlspecialchars($customer->Address_line1 ?? '') ?></td>
        </tr>
        <tr>
            <th>Address Line 2</th>
            <td><?= htmlspecialchars($customer->Address_line2 ?? '') ?></td>
        </tr>
        <tr>
            <th>City</th>
            <td><?= htmlspecialchars($customer->City ?? '') ?></td>
        </tr>
        <tr>
            <th>State</th>
            <td><?= htmlspecialchars($customer->State ?? '') ?></td>
        </tr>
        <tr>
            <th>Post Code</th>
            <td><?= htmlspecialchars($customer->Post_code ?? '') ?></td>
        </tr>
        <tr>
            <th>Register Date</th>
            <td><?= htmlspecialchars($customer->Register_Date ?? '') ?></td>
        </tr>
    </table>

    <div class="customer-actions">
        <a class="btn" href="profile.php">Update Profile</a>
        <a class="btn" href="password.php">Change Password</a>
        <a class="btn" href="cart.php">View Cart</a>
        <a class="btn" href="order_history.php">Order History</a>
    </div>
</div>

<?php include '_foot.php'; ?>
