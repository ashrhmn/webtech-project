<?php
$editing = isset($_GET['id']);
if ($editing) {
    require_once(__DIR__.'/../../../../../repository/EmployeeRepo.php');
    $id = $_GET['id'];
    $bill = getBillById($id);
}
?>

<html>

<body>
    <h1>BILL</h1>
    <form action="/app/controllers/employee/createBill.php" method="post">
        <label>Tests</label>
        <input type="text" name="test" value="<?=$editing?$bill['testName']:''?>">
        <label>Number of Test</label>
        <input type="number" name="numoftest" value="<?=$editing?$bill['numOfTests']:''?>">
        <label>Test Price</label>
        <input type="number" name="test_price" value="<?=$editing?$bill['testPrice']:''?>">
        <input type="submit" name="submit" value="Save">
    </form>
</body>

</html>