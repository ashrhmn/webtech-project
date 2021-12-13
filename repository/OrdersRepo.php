<?php

require_once('database.php');

function getAllOrders()
{
    return queryToAssocArray('select o.id as id, p.name as patientName, p.phone as phone,(b.testPrice*b.numOfTests) as BillAmount, o.paidAmount as paidAmount, ((b.testPrice*b.numOfTests)-o.paidAmount) as dueAmount from orders o left join users p on p.id=o.patientId left join bills b on b.id=o.billId');
}

function deleteOrderById($id)
{
    return isPreparedStatementExecuted('delete from orders where id=?', 'i', $id);
}

function createOrder($patientId, $billId, $paidAmount)
{
    return isPreparedStatementExecuted('insert into orders (patientId, billId, paidAmount) values(?,?,?)', 'iii', $patientId, $billId, $paidAmount);
}
