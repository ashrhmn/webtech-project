<?php

echo 'Edit Profile';

require_once('../../repository/AuthRepo.php');

$user = getLoggedInUser();

if(!$user){
    echo 'Not authenticated';
    return;
}

?>

<form action="../../controllers/saveProfileEdits.php">
    <table>
        <tr>
            <td></td>
        </tr>
    </table>
</form>