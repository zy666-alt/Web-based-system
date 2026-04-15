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
// HANDLE INSERT
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

    if (!$photo || $photo['error'] != 0) {
        $_err['photo'] = 'Photo required';
    }

    // if no error, insert
    if (!$_err) {

        // upload image
        $ext = strtolower(pathinfo($photo['name'], PATHINFO_EXTENSION));
        $filename = uniqid() . '.' . $ext;

        move_uploaded_file(
            $photo['tmp_name'],
            "../products/$filename"
        );

        // insert DB
        $stm = $_db->prepare("
            INSERT INTO product (name, price, photo)
            VALUES (?, ?, ?)
        ");

        $stm->execute([$name, $price, $filename]);

        temp('info', 'Product added successfully');
        redirect('list.php');
    }
}

// ----------------------------------------------------------------------------

$_title = 'Product | Insert';
include '../_head.php';
?>

<h2>Add New Product</h2>

<form method="post" enctype="multipart/form-data">

    <label>Name</label><br>
    <input type="text" name="name" value="<?= req('name') ?>">
    <?= err('name') ?>

    <br><br>

    <label>Price (RM)</label><br>
    <input type="text" name="price" value="<?= req('price') ?>">
    <?= err('price') ?>

    <br><br>

    <label>Photo</label><br>
    <input type="file" name="photo">
    <?= err('photo') ?>

    <br><br>

    <button type="submit">Insert</button>
    <button type="button" data-get="list.php">Back</button>

</form>

<?php include '../_foot.php'; ?>
