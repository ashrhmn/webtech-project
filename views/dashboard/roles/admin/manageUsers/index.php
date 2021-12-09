<?php

include(__DIR__ . '/../secureRoute.php');
?>

<?php

require_once(__DIR__ . '../../../../../../repository/UserRepo.php');

$allUsers = getAllUser();

?>

<style>
    .nav>input {
        padding: 10px 80px;
        margin: 20px 30px;
        border: 0px;
        font-size: 24px;
        color: #fff;
        border-radius: 5px;
        background-color: #196ff1;
        cursor: pointer;
    }

    .nav>input:hover {
        background-color: #0a5099;
        transition: all linear 0.25s;
    }

    .nav {
        width: 100%;
        display: flex;
        justify-content: center;
    }

    .dataView{
        display: flex;
        width: 100%;
        justify-content: center;
    }
</style>

<form class="nav" action="#" method="POST">
    <input type="submit" name="userList" value="User List">
    <input type="submit" name="addUser" value="Add User">
    <br><br>
</form>
<div class="dataView">
    <?php

    if (isset($_POST['userList'])) {
        include('userList.php');
        return;
    }

    if (isset($_POST['addUser'])) {
        include('addUser.php');
        return;
    }

    include('userList.php');

    ?>
</div>