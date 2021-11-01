<?php

include(__DIR__ . '/../secureRoute.php');
?>

<?php

require_once(__DIR__ . '../../../../../../repository/EquipmentRepo.php');

$equipments = getAllEquipments();

// print_r($equipments);

?>
<h4>Equipments</h4>
<a href="?tab=equipments&subTab=list">List</a>
<a href="?tab=equipments&subTab=new">Add New</a>

<?php

echo '<br>';
if (isset($_GET['subTab'])) {
    include($_GET['subTab'] . '.php');
    return;
}

include('list.php');
