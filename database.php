<?php


function getConnection(){
    $db_host = 'ashrhmn.com';
    $db_port = 3306;
    $db_name = 'dcms';
    $db_user = 'dcms';
    $db_password = 'ash';
    $connection = new mysqli($db_host,$db_user,$db_password,$db_name,$db_port);
    if($connection->connect_error){
        die('Connection Failed'.$connection->connect_error);
    }
    return $connection;
}

function mutate($sql){
    $con = getConnection();
    if($con->query($sql)===TRUE){
        return true;
    }
    echo '<script>alert("'.$con->error.'")</script>';
    return false;
}

function query($sql){
    $con = getConnection();
    return $con->query($sql);
}