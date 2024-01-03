<?php
session_start();
require_once("Class.Tool.php");

if (!isset($_SESSION['admin_name'])) {
    header('location:login.php');
}

$conn = Database::connect();
$id = $_SESSION["id"];
$data = "select * from user where Id!='$id'";
$users = $conn->query($data);

Database::disconnect();
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin page</title>
    <link rel="stylesheet" href="style.css">
</head>
<style>
    tr,
    td {
        border: 1px solid black;
        padding: 10px;
    }

    input {
        padding: 10px;
        border: 1px solid red;
        cursor: pointer;
    }
</style>

<body>
    <div class="container">

        <div class="content">
            <img src="<?php echo 'uploads/' . $_SESSION["photo"]  ?>" style="width: 150px; z-index: 1;max-width:150px;max-height:200px;" alt="">
            <h2>Welcome:</h2> <?php echo "<h1> " . $_SESSION["user_name"] . "</h1>"; ?>

            <p>This is admin page</p>
            <a href="AddUser.php" class="btn">Add User</a>
            <a href="login.php" class="btn">login</a>
            <a href="signup.php" class="btn">signup</a>
            <a href="logout.php" class="btn">logout</a>
            <a href="deleteMy.php" class="btn">Delete My account</a>


        </div>
    </div>

    <!--First_Name,Last_Name,email,password,user_type,img-->
    <table>
        <tr>
            <th>#</th>
            <th>First_Name</th>
            <th>Last_Name</th>
            <th>Email</th>
            <th>Password</th>
            <th>img</th>
        </tr>
        <?php
        while ($user = $users->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>{$user['Id']}</td>";
            echo "<td>{$user['First_Name']}</td>";
            echo "<td>{$user['Last_Name']}</td>";
            echo "<td>{$user['email']}</td>";
            echo "<td>{$user['password']}</td>";
            echo "<td><img src='uploads/{$user['img']}'alt='' style='width: 150px; z-index: 1;max-width:150px;max-height:200px;'/></td>";
            echo "<td><form method='post'>";
            echo "<input type='hidden' value='{$user['Id']}' name='sid'/>";
            echo "<input type='submit' value='Edit' formaction='sedit.php'/> ";
            echo "<input type='submit' value='Delete' formaction='deleteuser.php' />";
            echo "<input type='submit' value='Edit Image' formaction='editImage.php' />";
            echo "</form></td>";
            echo "</tr>";
        }
        ?>


    </table>


</body>

</html>