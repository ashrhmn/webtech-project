<?php
include("nav.php");
// echo 'Home page';
?>

<!-- <br> -->
<!-- <h2>
    <center>Welcome to Homepage!</center>
</h2> -->
<header>
    <div class="wrapper">
        <div class="welcome-text">
            <h1>
                Welcome To <span>Homepage!</span></h1>
            <a href="#">Contact US</a>
        </div>
</header>

<style>
    html {
        background-color: #56baed;
    }

    body {
        font-family: "Poppins", sans-serif;
        height: 100vh;
        background: linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.8)), url(https://i.postimg.cc/nhdKPCMM/pexels-jiarong-deng-1034662.jpg);
        height: 100vh;
        -webkit-background-size: cover;
        background-size: cover;
        background-position: center center;
        position: relative;
    }

    * {
        margin: 0;
        padding: 0;
    }

    .wrapper {
        width: 1170px;
        margin: auto;
    }

    .welcome-text {
        /* position: absolute; */
        width: 600px;
        height: 300px;
        margin: 20% 30%;
        text-align: center;
        margin-left: 300px;
    }

    .welcome-text h1 {
        text-align: center;
        color: #fff;
        text-transform: uppercase;
        font-size: 60px;
    }

    .welcome-text h1 span {
        color: #00fecb;
    }

    .welcome-text a {
        border: 1px solid #fff;
        padding: 10px 25px;
        text-decoration: none;
        text-transform: uppercase;
        font-size: 14px;
        margin-top: 20px;
        display: inline-block;
        color: #fff;
    }

    .welcome-text a:hover {
        background: #fff;
        color: #333;
    }

    @media (max-width:600px) {
        .wrapper {
            width: 100%;
        }

        .welcome-text {
            width: 100%;
            height: auto;
            margin: 30% 0;
        }

        .welcome-text h1 {
            font-size: 30px;
        }
    }
</style>