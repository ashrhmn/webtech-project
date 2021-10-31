<?php

include(__DIR__.'/../secureRoute.php');
?>

<hr>

<?php

require_once(__DIR__.'../../../../../../repository/UserRepo.php');

$allUsers = getAllUser();

?>

<form action="#" method="POST">
    <input type="submit" name="userList" value="User List">
    <input type="submit" name="addUser" value="Add User">
    <br><br>
    <?php

if(isset($_POST['userList'])){
    include('userList.php');
    return;
}

if(isset($_POST['addUser'])){
    include('addUser.php');
    return;
}

include('userList.php');

?>
</form>