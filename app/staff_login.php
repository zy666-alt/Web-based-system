<?php
include '_base.php';

$_err = [];

if (is_post()) {
    $email = req('email');
    $password = req('password');

    // Validate email
    if ($email == '') {
        $_err['email'] = 'Required';
    } 
    else if (!is_email($email)) {
        $_err['email'] = 'Invalid email';
    }

    // Validate password
    if ($password == '') {
        $_err['password'] = 'Required';
    }

    // Login admin
    if (!$_err) {
        $stm = $_db->prepare('
        SELECT * FROM admin WHERE email = ?
        ');
        $stm->execute([$email]);
        $u = $stm->fetch();

        if ($u) {
            $_SESSION['role'] = 'admin';
            temp('info', 'Login successful');
            login($u);

            header('Location: admin_dashboard.php'); // admin page
            exit;
        } 
        else {
            $_err['password'] = 'Not matched';
        }
    }
}

$_title = 'Admin Login';
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
