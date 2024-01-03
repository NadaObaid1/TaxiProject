<?php
require_once("Class.Tool.php");
if (isset($_POST['submit'])) {
    $conn = Database::connect();
    $first_name = Tools::cleanData($_POST['First_Name']);
    $last_name = Tools::cleanData($_POST['Last_Name']);
    $email = Tools::cleanData($_POST['email']);
    $pass = md5(Tools::cleanData($_POST['password']));
    $cpass = md5(Tools::cleanData($_POST['psw-repeat']));


    $file_name = $_FILES['photo']['name'];

    $tmp_file = $_FILES['photo']['tmp_name'];
    $ext = explode(".", $file_name);
    $extention = end($ext);
    $array_extention = array("png", "jpg", "jpeg", "PNG", "JPG", "JPEG");
    $target = "uploads/";
    if (!in_array($extention, $array_extention)) {
        Tools::printError('Extention not allow!!! just jpg or png or jpeg');
    }

    $file_name = $email . "." . $extention;

    move_uploaded_file($tmp_file, $target . $file_name);

    $user_type = $_POST['user_type'];
    $select = "select * from user where email='$email'";
    $result = $conn->query($select);
    if ($result->rowCount() > 0) {
        header("location:AddUser.php?errore=1");
    } else {
        if ($pass != $cpass) {
            header("location:AddUser.php?errorc=1");
        } else {
            $insert = "insert into user(First_Name,Last_Name,email,password,user_type,img) values('$first_name','$last_name','$email','$pass','$user_type','$file_name')";
            $conn->query($insert);
            header('location:AddUser.php?succes=1');
        }
    }
};
?>



<!DOCTYPE html>
<html>

<head>
    <title>Add User</title>
    <style>
        body {
            font-family: Arial;
        }

        * {
            box-sizing: border-box
        }


        input[type=text],
        input[type=password] {
            width: 100%;
            padding: 15px;
            margin: 5px 0 22px 0;
            display: inline-block;
            border: none;
            background: #f1f1f1;
            border-radius: 5px;
        }

        input[type=text]:focus,
        input[type=password]:focus {
            background-color: #ddd;
            outline: none;
        }

        hr {
            border: 1px solid #f1f1f1;
            margin-bottom: 25px;
        }


        .form-container form .form-btn {
            background-color: #6a91cc;
            color: white;
            padding: 14px 20px;
            margin: 8px;
            border: none;
            cursor: pointer;
            opacity: 0.9;
            border-radius: 5px;
        }

        .form-container form .form-btn:hover {
            opacity: 1;
        }

        .container {
            padding: 16px;
        }

        .form-container select {
            width: 100%;
            padding: 15px;
            background: #eee;
            border: none;
        }
    </style>
</head>


<body>
    <?php

    if (isset($_GET["errore"])) {
        Tools::printError("email is found...");
    }
    if (isset($_GET["errorc"])) {
        Tools::printError("passsword not mathed...");
    }
    if (isset($_GET["succes"])) {
        Tools::printSuccess("تمت عملية الاضافة بنجاح والحمدلله");
    }
    ?>
    <div class="form-container">
        <form action="" method="post" enctype="multipart/form-data">
            <h1>Sign Up</h1>
            <hr>

            <label for="text"><b>First_Name</b></label>
            <input type="text" placeholder="First_Name" name="First_Name" required>

            <label for="text"><b>Last_Name</b></label>
            <input type="text" placeholder="Last_Name" name="Last_Name" required>

            <label for="email"><b>Email</b></label>
            <input type="text" placeholder="Enter Email" name="email" required>
            <label for="img">Inter Your Image</label>
            <input id="img" type="file" name="photo" required></br>
            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="password" required>

            <label for="psw-repeat"><b>Repeat Password</b></label>
            <input type="password" placeholder="Repeat Password" name="psw-repeat" required>

            <select name="user_type">
                <option value="user">user </option>
                <option value="admin">admin</option>
            </select><br><br>

            </label>
            <input type="submit" name="submit" value="Add User" class="form-btn">
            <a href="admin.php">go to Home page </a>

        </form>
    </div>
</body>

</html>