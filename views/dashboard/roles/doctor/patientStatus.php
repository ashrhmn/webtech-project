<?php



require_once(__DIR__ . '../../../../../repository/UserRepo.php');
$id = '';
$patients = getAllPatients();
$availablePatientIds = getPatientId($id);
?>
<table border="1" align="center" class="styled-table">
    <thead>
        <tr>
            <th colspan="10" align="center">Patient Status</th>
        </tr>
    </thead>
    <tbody>
        <tr class="active-row">
            <th>ID</th>
            <th>Name</th>
            <th>Status</th>
            <th>Action</th>
            <style>
                .styled-table {
                    border-collapse: collapse;
                    margin: 25px 0;
                    font-size: 0.9em;
                    font-family: sans-serif;
                    min-width: 400px;
                    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
                    margin-left: 500px;
                }

                .styled-table thead tr {
                    background-color: #009879;
                    color: #ffffff;
                    text-align: left;
                }

                .styled-table th,
                .styled-table td {
                    padding: 12px 15px;
                }

                .styled-table tbody tr {
                    border-bottom: 1px solid #dddddd;
                }

                .styled-table tbody tr:nth-of-type(even) {
                    background-color: #f3f3f3;
                }

                .styled-table tbody tr:last-of-type {
                    border-bottom: 2px solid #009879;
                }

                .styled-table tbody tr.active-row {
                    font-weight: bold;
                    color: #009879;
                }
            </style>
        </tr>
        <?php

        for ($i = 0; $i < count($patients); ++$i) {
        ?>
            <tr>
                <td><?= $patients[$i]['id'] ?></td>
                <td><?= $patients[$i]['name'] ?></td>
                <td><?= in_array($patients[$i]['id'], $availablePatientIds) ? 'Keep' : 'Discharge' ?></td>
                <td><a href="<?= "/app/controllers/admin/togglePatientAvailability.php?id=" . $patients[$i]['id'] ?>">Change</a></td>
                <style>
                    a:link,
                    a:visited {
                        margin: 2px;
                        padding: 2px;
                        color: white;
                        background-color: #1ebba3;
                        display: inline-block;
                        padding: 10px 20px;
                        border: 2px solid #099983;
                        text-decoration: none;
                        text-align: center;
                        font: 14px Arial, sans-serif;
                        border-radius: 25px;
                    }
                </style>
            </tr>
        <?php
        }

        ?>
    </tbody>
</table>
<p align="center"><a class="back" href="/app/views/dashboard/">Back</a></p>