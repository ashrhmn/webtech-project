<?php 
    if(count($equipments)==0){
        echo 'No equipments found';
        return;
    }

?>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Count</th>
        <th>Action</th>
    </tr>
    <?php
    
    for($i=0;$i<count($equipments);++$i){
        ?>

        <tr>
            <td><?=$equipments[$i]['id']?></td>
            <td><?=$equipments[$i]['name']?></td>
            <td><?=$equipments[$i]['count']?></td>
            <td>
                <a href="">Edit</a>
                <a href="<?= "/../../../../../controllers/admin/deleteEquipment.php?id=" . $equipments[$i]['id'] ?>">Delete</a>
            </td>
        </tr>

        <?php
    }

    ?>
</table>