<table border="1">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Count</th>
    </tr>
    <?php
    
    for($i=0;$i<count($equipments);++$i){
        ?>

        <tr>
            <td><?=$equipments[$i]['id']?></td>
            <td><?=$equipments[$i]['name']?></td>
            <td><?=$equipments[$i]['count']?></td>
        </tr>

        <?php
    }

    ?>
</table>