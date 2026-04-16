<?php
include '../_base.php';

// ----------------------------------------------------------------------------

if (is_post()) {
    // php need to handle when JS ask /trigger to submit the form
    $id=req('id');//hidden field
    $unit=req('unit');//select (drop down list)
    //updated shopping cart- base file
    update_cart($id,$unit);
    redirect();

}

$arr = $_db->query('SELECT * FROM product');

// ----------------------------------------------------------------------------

$_title = 'Product | List';
include '../_head.php';
?>

<style>
    #products {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
    }

    .product {
        border: 1px solid #333;
        width: 200px;
        height: 200px;
        position: relative;
    }

    .product img {
        display: block;
        width: 100%;
        height: 100%;
        cursor: pointer;
    }

    .product form,
    .product div {
        position: absolute;
        background: #0009;
        color: #fff;
        padding: 5px;
        text-align: center;
    }

    .product form {
        inset: 0 0 auto auto;
    }

    .product div {
        inset: auto 0 0 0;
    }
</style>

<div id="products">
    <?php foreach ($arr as $p): ?>
        <!-- retreive session(cart) 
            call _base.php
            -->
            <?php
            $cart = get_cart();
            $id = $p->id;        //from product table
            $unit = $cart[$p ->id] ??0;
            ?>

        <div class="product">
            <form method="post">
                <!-- TODO ✅ -->
                 <?= $unit ? '✅' : ''?>
                 <?= html_hidden('id') ?>
                 <?= html_select('unit',$_units,'') ?>
            </form>
                
            <img src="/products/<?= $p->photo ?>"
                 data-get="/product/detail.php?id=<?= $p->id ?>">

            <div><?= $p->name ?> | RM <?= $p->price ?></div>
        </div>
    <?php endforeach ?>
</div>

<script>
    //when user select an option in ddl, ask js to submit the form
    $('select').on('change',e=>e.target.form.submit());
</script>

<?php
include '../_foot.php';
