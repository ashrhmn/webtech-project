<?php
session_start();

if (isset($_POST['login'])) {

    $usernameOrEmail = $_POST['usernameOrEmail'];
    $password = $_POST['password'];

    if ($usernameOrEmail == "" || $password == "") {
        echo 'Invalid username/email and/or password';
        return;
    }
    require_once('../repository/database.php');

    $sql = "select * from  users where username='" . $usernameOrEmail . "' or email='" . $usernameOrEmail . "'";
    $result = query($sql);

    if ($result != false && $result->num_rows > 0) {
        if ($row = $result->fetch_assoc()) {
            if ($row['password'] == $password) {
                //Login Succcessful
                // echo 'Logged in succ';

                $token = base64_encode(random_bytes(37));
                setcookie('token', $token, time() + (365 * 24 * 3600), '/');
                if (mutate("insert into session (username,token) values('" . $row['username'] . "','" . $token . "')")) {
                    header('location: ../views/dashboard.php');
                } else {
                    echo 'Error creating session, internal error';
                    return;
                }
                return;
            } else {
                echo 'Wrong Password';
                return;
            }
        }
    }
    echo 'User not found with the username or email';
    return;
}

echo 'Error form submission';
return;

echo 'Login Handler';
setcookie('isLoggedIn', 'true', time() + 3600, '/');



$conn = getConnection();

$res = $conn->query('select * from users');

if ($res->num_rows > 0) {
    while ($row = $res->fetch_assoc()) {
        echo $row['name'];
    }
} else {
    echo '0 res';
}
