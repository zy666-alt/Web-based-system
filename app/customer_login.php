<?php
include '_base.php';

// ----------------------------------------------------------------------------

$_err = [];

if (is_post()) {
    $email = req('email');
    $password = req('password');

    // Validate: email
    if ($email == ''){
      $_err['email'] ='Required';
    }
    else if (!is_email($email)) {
        $_err['email'] = 'Invalid email';
    }

    // Validate: password
    if ($password == '') {
        $_err['password'] = 'Required';
    }

    // Login user
    if (!$_err) {
        $stm = $_db->prepare('
            SELECT * FROM customer
            WHERE email = ? AND password = SHA1(?)
        ');
        $stm->execute([$email, $password]);
        $u = $stm->fetch();

      //if user found
        if ($u)  {
            $_SESSION['role'] = 'customer';
            temp('info', 'Login successfully');
            login($u);

            header('Location: index.php');
            exit;
        }
        else {
            $_err['password'] = 'Not matched';
        }
    }
}

// ----------------------------------------------------------------------------

$_title = 'Customer Login';
include '_head.php';
?>

<form method="post" class="form">
    <label for="email">Email</label>
    <?= html_text('email', 'maxlength="100"') ?>
    <?= err('email') ?>

    <label for="password">Password</label>
    <?= html_password('password', 'maxlength="100"') ?>
    <?= err('password') ?>

    <section>
        <button>Login as Customer</button>
        <button type="reset">Reset</button>
    </section>
</form>

<?php
include '_foot.php';
