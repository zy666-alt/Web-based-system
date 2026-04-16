<?php
include '_base.php';

// ----------------------------------------------------------------------------
// HANDLE POST
// ----------------------------------------------------------------------------

if (is_post()) {
    $id   = req('id');
    $unit = (int)req('unit');

    // create cart if not exists
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // update cart directly
    if ($unit <= 0) {
        unset($_SESSION['cart'][$id]);
    }
    else {
        $_SESSION['cart'][$id] = $unit;
    }

    redirect();
}

// ----------------------------------------------------------------------------
// GET PRODUCT
// ----------------------------------------------------------------------------

$id  = req('id');
$stm = $_db->prepare('SELECT * FROM product WHERE id = ?');
$stm->execute([$id]);
$p = $stm->fetch();

if (!$p) redirect('product_list.php');

// ----------------------------------------------------------------------------
// PAGE SETUP
// ----------------------------------------------------------------------------

$_title = 'Product | Detail';
include '_head.php';
?>

<style>
    #photo {
        display: block;
        border: 1px solid #333;
        width: 200px;
        height: 200px;
        object-fit: cover;
    }
</style>

<h2>Product Detail</h2>

<p>
    <img src="/products/<?= encode($p->photo) ?>" id="photo">
</p>

<table class="table detail">
    <tr>
        <th>Id</th>
        <td><?= encode($p->id) ?></td>
    </tr>
    <tr>
        <th>Name</th>
        <td><?= encode($p->name) ?></td>
    </tr>
    <tr>
        <th>Price</th>
        <td>RM <?= number_format($p->price, 2) ?></td>
    </tr>
    <tr>
        <th>Unit</th>
        <td>
            <?php
            $cart = $_SESSION['cart'] ?? [];
            $unit = $cart[$p->id] ?? '';
            ?>
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
                ], '- Select -', 'onchange="this.form.submit()"'); ?>
                <?= $unit !== '' && $unit > 0 ? '✅ Added to cart' : '' ?>
            </form>
        </td>
    </tr>
</table>

<p>
    <a href="product_list.php"><button type="button">List</button></a>
    <a href="cart.php"><button type="button">View Cart</button></a>
</p>

<?php include '_foot.php'; ?>
