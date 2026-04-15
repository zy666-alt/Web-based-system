<?php
include '_base.php';

// ----------------------------------------------------------------------------

if (is_post()) {
    $email = req('email');
    $password = req('password');

    // Validate: email
    if ($email == '') {
        $_err['email'] = 'Required';
    }
    else if (!is_email($email)) {
        $_err['email'] = 'Invalid email';
    }

    // Validate: password
    if ($password == '') {
        $_err['password'] = 'Required';
    }

    // Login customer (Drinking System)
    if (!$_err) {
        $stm = $_db->prepare('
            SELECT * FROM customer
            WHERE email = ? AND password = SHA1(?)
        ');
        $stm->execute([$email, $password]);
        $c = $stm->fetch();

        if ($c) {
            temp('info', 'Login successfully');
            login($c);   // store session user
        }
        else {
            $_err['password'] = 'Email or password not matched';
        }
    }
}

// ----------------------------------------------------------------------------

$_title = 'Drink System Login';
include '_head.php';
?>

<form method="post" class="form">
    <label>Email</label>
    <?= html_text('email', 'maxlength="100"') ?>
    <?= err('email') ?>

    <label>Password</label>
    <?= html_password('password', 'maxlength="100"') ?>
    <?= err('password') ?>

    <section>
        <button>Login</button>
        <button type="reset">Reset</button>
    </section>
</form>

<?php include '_foot.php'; ?>
