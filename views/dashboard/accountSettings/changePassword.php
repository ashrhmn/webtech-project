<?php

echo 'Change Password';

?>

<form action="../../../controllers/AccountSettings/changePassword.php" method="POST">
    <table>
        <tr>
            <td>Old Password : </td>
            <td>
                <input type="password" name="oldPassword">
            </td>
        </tr>
        <tr>
            <td>New Password : </td>
            <td>
                <input type="password" name="newPassword">
            </td>
        </tr>
        <tr>
            <td>Confirm New Password : </td>
            <td>
                <input type="password" name="newPassword2">
            </td>
        </tr>
        <tr>
            <td align="center" colspan="2"><input type="submit" name="savePasswordChanges" value="Save Changes"></td>
        </tr>
    </table>
</form>