<?php

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <title>Document</title>

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>E-Taxi</title>
        <style>
            * {
                margin: 0;
                padding: 0;
                font-family: "Roboto", sans-serif;
            }

            body {
                background-image: url(img/slider-img.png);
                background-position: center;
                background-repeat: no-repeat;
                background-color: midnightblue;
                height: 100vh;

            }

            header {
                width: auto;
                margin-top: 2%;

            }


            .logo {

                color: rgb(249, 244, 244);
                margin-left: 5%;
                font-family: Georgia, 'Times New Roman', Times, serif;
            }

            .nav {
                text-align: right;
                float: right;
                width: 65%;
                font-size: 20px;
            }

            .list {
                list-style-type: none;
            }

            .list-item {
                display: inline-block;
            }

            .list-item1 {
                display: inline-block;
                border: 1px solid rgb(246, 243, 243);
            }

            .link-nav:hover {
                border: 1px solid rgb(246, 243, 243);
            }


            .link-nav {
                text-decoration: none;
                color: rgb(250, 247, 247);
                text-transform: capitalize;
                font-size: 16px;
                font-style: normal;
                padding: 5px 20px;

            }

            .text h1 {
                margin-top: 18%;
                text-align: center;
                color: rgb(6, 53, 94);

            }

            .text pre {
                margin-top: 18%;
                text-align: center;
                color: aliceblue;
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;

            }

            .buttons {
                margin-right: 70%;
            }

            .b1 {
                width: 300px;
                height: 50px;
                background-color: darkgoldenrod;
                border: solid;
                margin: 30px;
                padding: 20px 50px;
                border-radius: 50px;


            }

            .b2 {
                width: 300px;
                height: 50px;
                border: solid;
                margin: 30px auto;
                padding: 20px 50px;
                border-radius: 50px;

            }

            .b2:hover {
                background-color: darkgoldenrod;
            }

            .b1 a {
                font-family: cursive;
                text-decoration: none;
                padding: 20px;
            }

            .b2 a {
                font-family: cursive;
                text-decoration: none;
            }

            .Home {
                text-align: center;
                padding-top: 300px;
            }

            .main-title {
                color: white;
                text-transform: uppercase;
                font-size: 30px;
                font-weight: 50px;
                width: 50%;
                text-align: left;
                padding-left: 5px;
            }

            .main-description {
                color: white;
                width: 37%;
                font-size: 15px;

            }

            .header-content {
                background-image: url(img/home-img.png);
                background-position: right;
                background-repeat: no-repeat;
                background-color: midnightblue;
                height: 100vh;
            }

            .overlay {
                background-image: url(img/car.jpg);
                background-repeat: no-repeat;
                background-color: midnightblue;
                background-position: right;
            }

            .main {
                color: white;
                text-transform: uppercase;
                font-size: 30px;
                width: 50%;
                margin: left;
                height: 100vh;

            }
        </style>
    </head>

<body>
    <div class="contanier">
        <header>
            <div class="logo"> E-Taxi Office </div>
            <div class="nav">
                <ul class="list">
                    <li class="list-item1"><a class="link-nav" href="#Home">Home</a></li>
                    <li class="list-item"><a class="link-nav" href="#about">About Us</a></li>
                    <li class="list-item"><a class="link-nav" href="#Services">Services</a></li>
                    <li class="list-item"><a class="link-nav" href="#products">products</a></li>
                    <li class="list-item"><a class="link-nav" href="#contact">Contact</a></li>
                </ul>
            </div>
    </div>
    </header>

    <div class="text">
        <h1>WELCOME TO ELAXI</h1>
        <br>
        <pre>

                    This System boasting a range of benefits such as better fuel efficiency,
                    lower maintenance costs and time,
                    electric vehicles are becoming increasingly popular around the globe.</pre>

    </div>

    <div class="header-content">
        <div class="Home" id="Home">
            <h1 class="main-title">Welcome to our E-Taxi Office</h1>
            <p class="main-description">Share with us and enjoy your experience with E-Taxi Office</p>
            <div class="buttons">
                <form action="LogIn.html">
                    <button class="b1"><a href="login.php">LogIn</a></button>
                </form>

                <form action="SignUp.html">
                    <button class="b2"><a href="signup.php">SignUp</a></button>
                </form>

            </div>
        </div>
    </div>





</body>

</html>