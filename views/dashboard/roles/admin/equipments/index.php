<?php

include(__DIR__ . '/../secureRoute.php');
?>

<?php

require_once(__DIR__ . '../../../../../../repository/EquipmentRepo.php');

$equipments = getAllEquipments();

// print_r($equipments);

?>
<style>
    .dataView {
        display: flex;
        width: 100%;
        justify-content: center;
    }

    .nav>a {
        padding: 5px 30px;
        margin: 20px 30px;
        border: 0px;
        font-size: 16px;
        color: #fff;
        border-radius: 5px;
        background-color: #196ff1;
        cursor: pointer;
    }

    .nav>a:hover {
        background-color: #0a5099;
        transition: all linear 0.25s;
    }

    .nav {
        width: 100%;
        display: flex;
        justify-content: center;
    }
</style>
<div class="nav">
    <a href="?tab=equipments&subTab=list">List</a>
    <a href="?tab=equipments&subTab=new">Add New</a>
</div>
<div class="dataView">

    <?php

    echo '<br>';
    if (isset($_GET['subTab'])) {
        include($_GET['subTab'] . '.php');
        return;
    }

    include('list.php');
    ?>
</div>