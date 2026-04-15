if (is_post()) {

    $email = req('email');
    $new   = req('new_password');
    $confirm = req('confirm_password');

    if ($email == '') {
        $_err['email'] = 'Required';
    }
    else if (!is_email($email)) {
        $_err['email'] = 'Invalid email';
    }

    if ($new == '') {
        $_err['new_password'] = 'Required';
    }
    else if (strlen($new) < 6) {
        $_err['new_password'] = 'Minimum 6 characters';
    }

    if ($confirm == '') {
        $_err['confirm_password'] = 'Required';
    }
    else if ($new != $confirm) {
        $_err['confirm_password'] = 'Passwords do not match';
    }

    if (!$_err) {

        // check user exists
        $stm = $_db->prepare("SELECT id FROM users WHERE email = ?");
        $stm->execute([$email]);
        $user = $stm->fetch();

        if (!$user) {
            $_err['email'] = 'Email not found';
        }
        else {
            // update password
            $hash = password_hash($new, PASSWORD_DEFAULT);

            $stm = $_db->prepare("UPDATE users SET password = ? WHERE email = ?");
            $stm->execute([$hash, $email]);

            temp('info', 'Password reset successful');
            redirect('login.php');
        }
    }
}
