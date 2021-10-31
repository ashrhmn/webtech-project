<?php
require_once('header.php');
print_r($user);
?>
<h1>Welcome <?= $user['name'] ?></h1>
<a href="../../controllers/logout.php">Logout</a>
<br>
<form action="#" method="POST">
    <input type="submit" name="editProfile" value="Edit Profile">
    <input type="submit" name="changePassword" value="Change Password">
    <input type="submit" name="manageSession" value="Manage Session">
    <div>
        <?php
            if (isset($_POST['editProfile'])) {
                include('accountSettings/editProfile.php');
            }
            if (isset($_POST['changePassword'])) {
                include('accountSettings/changePassword.php');
            }
            if (isset($_POST['manageSession'])) {
                include('accountSettings/manageSession.php');
            }
            if(isset($_POST['editProfile']) || isset($_POST['changePassword']) || isset($_POST['manageSession'])){
                ?><input type="submit" name="close" value="Close"><?php
            }
        ?>
    </div>
</form>
<?php
include('./roles/' . strtolower($user['role']) . '/dashboard.php');
return;