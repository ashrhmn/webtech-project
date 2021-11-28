<?php

echo 'Employee Dashboard'; 

?>
<html>
    <body>
        <h1>BILL</h1>
        <form action="../controller/handleBill.php" method="post">
            <label>Tests</label>
            <input type="text" name="test">
            <label>Number of Test</label>
            <input type="number" name="numoftest">
			<label>Test Price</label>
            <input type="number" name="test_price">
			<label>Total Price</label>
			<input type="number" name="total_price" value="">
			<input type="submit" name="submit" value="Enter">
        </form>
    </body>
</html>