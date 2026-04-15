<?php
include '../_base.php';

// ----------------------------------------------------------------------------
// CHECK LOGIN (ADMIN ONLY)
// ----------------------------------------------------------------------------

if (!$_user || $_user->role != 'Admin') {
    temp('info', 'Admin only');
    redirect('/login.php');
}

// ----------------------------------------------------------------------------
// GET PRODUCT ID
// ----------------------------------------------------------------------------

$id = req('id');

$stm = $_db->prepare('SELECT * FROM product WHERE id = ?');
$stm->execute([$id]);
$p = $stm->fetch();

if (!$p) {
    temp('info', 'Product not found');
    redirect('list.php');
}

// ----------------------------------------------------------------------------
// DELETE CONFIRMATION
// ----------------------------------------------------------------------------

if (is_post()) {

    // OPTIONAL: delete image file
    if ($p->photo && file_exists("../products/$p->photo")) {
        unlink("../products/$p->photo");
    }

    // delete product from DB
    $stm = $_db->prepare('DELETE FROM product WHERE id = ?');
    $stm->execute([$id]);

    temp('info', 'Product deleted successfully');
    redirect('list.php');
}

// ----------------------------------------------------------------------------

$_title = 'Product | Delete';
include '../_head.php';
?>

<h2>Delete Product</h2>

<p style="color:red;">
    ⚠️ Are you sure you want to delete this product?
</p>

<table class="table detail">
    <tr>
        <th>Id</th>
        <td><?= $p->id ?></td>
    </tr>

    <tr>
        <th>Name</th>
        <td><?= $p->name ?></td>
    </tr>

    <tr>
        <th>Price</th>
        <td>RM <?= number_format($p->price, 2) ?></td>
    </tr>

    <tr>
        <th>Photo</th>
        <td>
            <img src="/products/<?= $p->photo ?>" width="120">
        </td>
    </tr>
</table>

<form method="post">
    <button type="submit" style="background:red;color:white;">
        Yes, Delete
    </button>

    <button type="button" data-get="list.php">
        Cancel
    </button>
</form>

<?php include '../_foot.php'; ?>
