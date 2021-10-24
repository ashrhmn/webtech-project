<?php
session_start();

if (isset($_POST['login'])) {

    $usernameOrEmail = $_POST['usernameOrEmail'];
    $password = $_POST['password'];

    if ($usernameOrEmail == "" || $password == "") {
        echo 'Invalid username/email and/or password';
        return;
    }
    require_once('../database.php');

    $sql = "select * from  users where username='" . $usernameOrEmail . "' or email='" . $usernameOrEmail . "'";
    $result = query($sql);

    if ($result != false && $result->num_rows > 0) {
        if ($row = $result->fetch_assoc()) {
            if ($row['password'] == $password) {
                //Login Succcessful
                echo 'Logged in succ';

                $token = base64_encode(random_bytes(37));
                setcookie('token', $token, time() + (365 * 24 * 3600), '/');
                if (mutate("insert into session (username,token) values('" . $row['username'] . "','" . $token . "')")) {
                    switch ($row['role']) {
                        case 'Admin':
                            header('location: ../roles/admin/dashboard.php');
                            break;
                        case 'Doctor':
                            header('location: ../roles/doctor/dashboard.php');
                            break;
                        case 'Employee':
                            header('location: ../roles/employee/dashboard.php');
                            break;
                        case 'Patient':
                            header('location: ../roles/patient/dashboard.php');
                            break;
                        default:
                            echo 'Invalid role, contact admins';
                            return;
                            break;
                    }
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
