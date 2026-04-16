<?php
include '../_base.php';

// ----------------------------------------------------------------------------

$_title = 'Product | Search';
include '../_head.php';

// ----------------------------------------------------------------------------

$q = req('q');   // search keyword
$rows = [];

if ($q != '') {

    $stm = $_db->prepare("
        SELECT * 
        FROM product
        WHERE name LIKE ?
        ORDER BY name
    ");

    $stm->execute(["%$q%"]);
    $rows = $stm->fetchAll();
}
?>

<h2>Search Product</h2>

<!-- SEARCH FORM -->
<form method="get">
    <input type="text" name="q" value="<?= $q ?>" placeholder="Search drink...">
    <button type="submit">Search</button>
</form>

<br>

<!-- RESULTS -->
<?php if ($q == ''): ?>
    <p>Please enter a keyword.</p>

<?php elseif (!$rows): ?>
    <p>No product found.</p>

<?php else: ?>

<table class="table">
    <tr>
        <th>Photo</th>
        <th>Name</th>
        <th>Price (RM)</th>
        <th>Description</th>
    </tr>

    <?php foreach ($rows as $p): ?>
    <tr>
        <td>
            <img src="/products/<?= $p->photo ?>" width="60">
        </td>

        <td><?= $p->name ?></td>

        <td><?= number_format($p->price, 2) ?></td>

        <td>
            <button data-get="detail.php?id=<?= $p->id ?>">
                View
            </button>

            <button data-post="cart.php?id=<?= $p->id ?>&unit=1">
                Add
            </button>
        </td>
    </tr>
    <?php endforeach; ?>

</table>

<?php endif; ?>

<?php include '../_foot.php'; ?>
