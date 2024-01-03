<?php

session_start();
if (!isset($_SESSION['user_name'])) {
    header('location:login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user page</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">

        <div class="content">
            <img src="<?php echo 'uploads/' . $_SESSION["photo"]  ?>" style="width: 150px; z-index: 1;max-width:150px;max-height:200px;" alt="">
            <h1><?php echo $_SESSION["user_name"]; ?></h1>
            <h2>Welcome</h2>
            <p>This is user page</p>
            <a href="login.php" class="btn">login</a>
            <a href="signup.php" class="btn">signup</a>
            <a href="logout.php" class="btn">logout</a>
            <a href="deleteMy.php" class="btn">Delete My account</a>


        </div>
    </div>
</body>

</html>