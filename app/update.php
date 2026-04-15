<?php
include '../_base.php';

// ----------------------------------------------------------------------------
// CHECK LOGIN (optional admin protection)
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
    redirect('list.php');
}

// ----------------------------------------------------------------------------
// HANDLE UPDATE
// ----------------------------------------------------------------------------

if (is_post()) {

    $name  = req('name');
    $price = req('price');
    $photo = $_FILES['photo'] ?? null;

    // validation
    if ($name == '') {
        $_err['name'] = 'Required';
    }

    if ($price == '') {
        $_err['price'] = 'Required';
    }
    else if (!is_numeric($price)) {
        $_err['price'] = 'Must be a number';
    }

    // photo upload (optional)
    $filename = $p->photo;

    if ($photo && $photo['error'] == 0) {

        $ext = strtolower(pathinfo($photo['name'], PATHINFO_EXTENSION));
        $filename = uniqid() . '.' . $ext;

        move_uploaded_file(
            $photo['tmp_name'],
            "../products/$filename"
        );
    }

    // update DB
    if (!$_err) {

        $stm = $_db->prepare("
            UPDATE product
            SET name = ?, price = ?, photo = ?
            WHERE id = ?
        ");

        $stm->execute([$name, $price, $filename, $id]);

        temp('info', 'Product updated successfully');
        redirect('list.php');
    }
}

// ----------------------------------------------------------------------------

$_title = 'Product | Update';
include '../_head.php';
?>

<h2>Update Product</h2>

<form method="post" enctype="multipart/form-data">

    <label>Name</label><br>
    <input type="text" name="name" value="<?= $p->name ?>">
    <?= err('name') ?>

    <br><br>

    <label>Price (RM)</label><br>
    <input type="text" name="price" value="<?= $p->price ?>">
    <?= err('price') ?>

    <br><br>

    <label>Current Photo</label><br>
    <img src="/products/<?= $p->photo ?>" width="120">

    <br><br>

    <label>Change Photo</label><br>
    <input type="file" name="photo">

    <br><br>

    <button type="submit">Update</button>
    <button type="button" data-get="list.php">Back</button>

</form>

<?php include '../_foot.php'; ?>
