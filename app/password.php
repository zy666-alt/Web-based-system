if (is_post()) {

    $current = req('current_password');
    $new     = req('new_password');
    $confirm = req('confirm_password');

    // validation
    if ($current == '') {
        $_err['current_password'] = 'Required';
    }

    if ($new == '') {
        $_err['new_password'] = 'Required';
    }
    else if (strlen($new) < 6) {
        $_err['new_password'] = 'Must be at least 6 characters';
    }

    if ($confirm == '') {
        $_err['confirm_password'] = 'Required';
    }
    else if ($new != $confirm) {
        $_err['confirm_password'] = 'Passwords do not match';
    }

    if (!$_err) {

        // get user password from DB
        $stm = $_db->prepare("SELECT password FROM users WHERE id = ?");
        $stm->execute([$user_id]);
        $user = $stm->fetch();

        // check current password
        if (!password_verify($current, $user['password'])) {
            $_err['current_password'] = 'Incorrect current password';
        }
        else {
            // update password
            $hash = password_hash($new, PASSWORD_DEFAULT);

            $stm = $_db->prepare("UPDATE users SET password = ? WHERE id = ?");
            $stm->execute([$hash, $user_id]);

            temp('info', 'Password updated successfully');
            redirect('profile.php');
        }
    }
}
