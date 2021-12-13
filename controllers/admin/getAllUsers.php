<?php

$filter = '';

if (isset($_GET['filter'])) {
    $filter = $_GET['filter'];
}

require_once('../../repository/UserRepo.php');

$users = getAllUserFiltered('%' . $filter . '%');

echo json_encode($users);
