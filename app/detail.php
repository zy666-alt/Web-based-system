<?php
include '../_base.php';

// ----------------------------------------------------------------------------

if (is_post()) {
    // after user change option in drop down list
    $id=req('$id');     //hidden field
    $unit=req('unit'); //drop down list
    update_cart($id,$unit); 
    redirect();
}

$id  = req('id');
$stm = $_db->prepare('SELECT * FROM product WHERE id = ?');
$stm->execute([$id]);
$p = $stm->fetch();
if (!$p) redirect('list.php');

// ----------------------------------------------------------------------------

$_title = 'Product | Detail';
include '../_head.php';
?>

<style>
    #photo {
        display: block;
        border: 1px solid #333;
        width: 200px;
        height: 200px;
    }
</style>

<p>
    <img src="/products/<?= $p->photo ?>" id="photo">
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
        <td>RM <?= $p->price ?></td>
    </tr>
    <tr>
        <th>Unit</th>
        <td>
            <!--retreive cart from session -->
            <?php
            $cart = get_cart();
            $id = $p->id;
            $unit = $cart[$id] ?? 0;
            ?>
            <form method="post">
                <!-- to generate drop down list + hidden field ✅ -->
                 <?= html_hidden('id') ?>
                 <?= html_select('unit',$_units,'') ?>
                 <?= $unit ? '✅':' ' ?>
            </form>
        </td>
    </tr>
</table>

<p>
    <button data-get="list.php">List</button>
</p>

<script>
    // trigger submit action when user change option in ddl
    $('select').on('change', e=>e.target.form.submit());
</script>

<?php
include '../_foot.php';
