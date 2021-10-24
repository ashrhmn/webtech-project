<?php

function hasEmptyStr($strings){
    $n = count($strings);
    for($i=0;$i<$n;++$i){
        if($strings[$i]==""){
            return true;
        }
    }
    return false;
}

if(isset($_POST['signup'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $name = $_POST['name'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    $gender = $_POST['gender'];
    $dateOfBirth = $_POST['dateOfBirth'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];

    if(hasEmptyStr([$username,$email,$password,$password2,$gender])){
        echo 'Invalid input';
        return;
    }
    
    if($password != $password2){
        echo 'Passwords do not match';
        return;
    }

    $sql = "INSERT INTO users(name, username, password, address, phone, gender, dateOfBirth) VALUES ('".$name."','".$username."','".$password."','".$address."','".$phone."','".$gender."','".$dateOfBirth."')";
    
    require_once('../database.php');
    
    if(mutate($sql)){
        header('location: ../html/login.php');
        return;
    }
    
    echo 'Sign Up Error';
    

    return;
}

echo 'Submit error';
