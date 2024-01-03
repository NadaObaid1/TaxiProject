<?php
session_start();
require_once("Class.Tool.php");

$conn = Database::connect();
if (isset($_POST['submit'])) {
  $email = Tools::cleanData($_POST['email']);
  $pass = md5($_POST['psw']);



  $select = "select * from user where email='$email' && password='$pass'";
  $result = $conn->query($select);

  if ($result->rowCount() > 0) {
    $row = $result->fetch(PDO::FETCH_ASSOC);
    if ($row['user_type'] == 'admin') {
      $_SESSION['admin_name'] = $row['user_type'];
      $_SESSION["id"] = $row["Id"];
      $name = $row['First_Name'] . " " . $row["Last_Name"];
      $_SESSION['user_name'] = $name;
      $_SESSION["photo"] = $row["img"];
      header('location:admin.php');
    } elseif ($row['user_type'] == 'user') {
      $_SESSION["id"] = $row["Id"];
      $_SESSION["photo"] = $row["img"];
      $name = $row['First_Name'] . " " . $row["Last_Name"];
      $_SESSION['user_name'] = $name;
      header('location:user.php');
    }
  } else {
    header("location:login.php?Error=1");
  }
};
?>

<!DOCTYPE html>
<html>

<head>
  <title>Log in Page</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    body {
      font-family: Arial;
      border: 1px solid #ccc
    }



    .form-container input[type=text],
    input[type=password] {
      width: 100%;
      padding: 12px 20px;
      margin: 10px;
      display: inline-block;
      border: 1px solid #abb2b8;
      border-radius: 5px;
      box-sizing: border-box;
    }

    .form-container form .form-btn {
      background-color: #6a91cc;
      color: white;
      padding: 14px 20px;
      margin: 10px 0;
      border: none;
      cursor: pointer;
      width: 100%;
      border-radius: 5px;

    }

    .form-container form .form-btn:hover {
      opacity: 0.5;
    }



    .form-container form .form-btn {
      width: auto;
      padding: 10px 18px;
    }

    hr {
      border: 1px solid #f1f1f1;
      margin-bottom: 25px;
    }

    .form-container {
      padding: 16px;
    }

    span.psw {
      float: right;
      padding-top: 16px;
    }
  </style>
</head>


<body>
  <div class="form-container">
    <form action="" method="post">

      <h1>Login Page</h1>
      <hr>
      <?php
      if (isset($_GET["Error"])) {
        Tools::printError("Error in login");
      }
      ?>

      <label for="email"><b>email</b></label>
      <input type="text" placeholder="Enter email" name="email" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>
      <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
      </label>
      <br>

      <input type="submit" name="submit" value="log in" class="form-btn">
      <p>don't have an account?<a href="signup.php">sign up now</a></p>


    </form>
  </div>
</body>

</html>