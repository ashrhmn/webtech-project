<?php

echo 'New Equipment';

?>

<form action="../../../../../controllers/admin/addEquipment.php" method="POST">
    <table>
        <tr>
            <td>Equipment Name</td>
            <td><input type="text" name="equipmentName"></td>
        </tr>
        <tr>
            <td>Count</td>
            <td><input type="number" step="1" name="equipmentCount"></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" name="addEquipment" value="Add"></td>
        </tr>
    </table>
</form>