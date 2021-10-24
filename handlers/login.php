<?php
session_start();
echo 'Login Handler';
setcookie('isLoggedIn','true',time()+3600,'/');


require_once('../database.php');

$conn = getConnection();

$res = $conn->query('select * from users');

if ($res->num_rows > 0) {
    while ($row = $res->fetch_assoc()) {
        echo $row['name'];
    }
}
else{
    echo '0 res';
}
