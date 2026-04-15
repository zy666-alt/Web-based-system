<?php
include '../_base.php';

// ----------------------------------------------------------------------------

if (!$_user) {
    temp('info', 'Please login first');
    redirect('/login.php');
}

// ----------------------------------------------------------------------------

$_title = 'Customer | Search';
include '../_head.php';

// ----------------------------------------------------------------------------

$q = req('q');
$rows = [];

if ($q != '') {

    $stm = $_db->prepare("
        SELECT * 
        FROM user
        WHERE name LIKE ?
           OR email LIKE ?
        ORDER BY name
    ");

    $stm->execute(["%$q%", "%$q%"]);
    $rows = $stm->fetchAll();
}
?>

<h2>Search Customer</h2>

<!-- SEARCH FORM -->
<form method="get">
    <input type="text" name="q" value="<?= $q ?>" placeholder="Search name or email">
    <button type="submit">Search</button>
</form>

<br>

<?php if ($q == ''): ?>
    <p>Please enter a keyword.</p>

<?php elseif (!$rows): ?>
    <p>No customer found.</p>

<?php else: ?>

<table class="table">
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Phone_number</th>
        <th>Adress_line1</th>
        <th>Address_line2</th>
      <th>city</th>
      <th>state</th>
      <th>Post_code</th>
      <th>Register_Date</th>
      <th>Password</th>
    </tr>

    <?php foreach ($rows as $c): ?>
    <tr>
        <td><?= $c->name ?></td>
        <td><?= $c->email ?></td>
        <td><?= $c->phone_number ?></td>
        <td><?= $c->ddress_line1 ?></td>
         <td><?= $c->ddress_line2 ?></td>
         <td><?= $c->city?></td>
         <td><?= $c->state?></td>
         <td><?= $c->post_code ?></td>
         <td><?= $c->register_date ?></td>
         <td><?= $c->password ?></td>

        <td>
            <button data-get="customer_detail.php?id=<?= $c->id ?>">
                View
            </button>
        </td>
    </tr>
    <?php endforeach; ?>

</table>

<?php endif; ?>

<?php include '../_foot.php'; ?>
