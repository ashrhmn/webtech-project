<?php

require_once(__DIR__ . '../../../../../../repository/EmployeeRepo.php');

$bills = getAllBill();

?>
<form action="/app/controllers/employee/createOrder.php" method="POST">
    <label for="patientId">Patient Id</label>
    <input type="number" name="patientId">
    <label for="billId">Bill Id</label>
    <input type="number" name="billId">
    <label for="paidAmount">Paid Amount</label>
    <input type="number" name="paidAmount">
    <input type="submit" name="submit" value="Create Order">
</form>

<?php
include(__DIR__.'/../billList/index.php');
?>

<table border="1" id="orders">
    <thead>
        <tr>
            <th>ID</th>
            <th>Patient Name</th>
            <th>Username</th>
            <th>Email</th>
            <th>Address</th>
            <th>Phone</th>
            <th>Gender</th>
            <th>Date Of Birth</th>
        </tr>
    </thead>
    <tbody></tbody>
</table>



<script>
    $(document).ready(() => {

        const updateTable = (data) => {
            $('#orders tbody tr').remove()
            let table = document.getElementById('orders').getElementsByTagName('tbody')[0];

            for (let patient of data) {
                let row = table.insertRow()
                for (let property in patient) {
                    if (!['password', 'profilePicture', 'role'].includes(property)) {
                        let cell = row.insertCell();
                        cell.innerHTML = patient[property]
                    }
                }
            }
        }


        const fetchData = () => {
            var xmlhttp = new XMLHttpRequest();
            var url = "/app/controllers/employee/patientList.php";
            xmlhttp.open("GET", url, true);
            xmlhttp.setRequestHeader("Content-type", "application/json");
            xmlhttp.send();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
					console.log(this.responseText);
                    updateTable(JSON.parse(this.responseText))
                }
            }
        }

        fetchData()
    })
</script>