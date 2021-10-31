<?php

include(__DIR__.'/../secureRoute.php');
?>

<hr>

<?php

require_once(__DIR__.'../../../../../../repository/UserRepo.php');

$allUsers = getAllUser();

?>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Username</th>
        <th>Email</th>
        <th>Name</th>
        <th>Role</th>
        <th>Address</th>
        <th>Gender</th>
        <th>Date Of Birth</th>
        <th>Phone</th>
    </tr>
    
    <?php

for($i=0;$i<count($allUsers);++$i){
    ?>
        <tr>
            <td><?=$allUsers[$i]['id']?></td>
            <td><?=$allUsers[$i]['username']?></td>
            <td><?=$allUsers[$i]['email']?></td>
            <td><?=$allUsers[$i]['name']?></td>
            <td><?=$allUsers[$i]['role']?></td>
            <td><?=$allUsers[$i]['address']?></td>
            <td><?=$allUsers[$i]['gender']?></td>
            <td><?=$allUsers[$i]['dateOfBirth']?></td>
            <td><?=$allUsers[$i]['phone']?></td>
        </tr>
    <?php
}
?>
</table>