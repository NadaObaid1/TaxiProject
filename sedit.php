<?php


session_start();
require_once("Class.Tool.php");
if (!isset($_SESSION['admin_name'])) {
    header('location:loginPage.php');
}



?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <title>Update User</title>
</head>

<body>
    <div class="container">
        <?php

        require_once("Class.Tool.php");

        $pdo = Database::connect();

        if (!empty($_POST['submit']) && $_POST['submit'] == 'Save') {

            $sID = Tools::cleanData($_POST['sid']);
            $select = "SELECT * FROM user WHERE Id = '$sID'";

            $result = $pdo->query($select);

            $bring = $result->fetch(PDO::FETCH_ASSOC);

            $cpassword = $bring["password"];

            $word = Tools::cleanData($_POST['spass']);

            if ($cpassword != $word)
                $spassword = md5(Tools::cleanData($_POST['spass']));
            else
                $spassword = Tools::cleanData($_POST['spass']);

            $sName = Tools::cleanData($_POST['sname']);
            $LName = Tools::cleanData($_POST['s1name']);

            $semail = Tools::cleanData($_POST['semail']);


            $sAdmin = Tools::cleanData($_POST['isAdmin']);



            $sql = "update user set First_Name=?,Last_Name=? ,email=?,password=?,user_type=? where Id=?";
            $result = $pdo->prepare($sql);
            try {
                $result->execute(array($sName, $LName, $semail, $spassword, $sAdmin, $sID));
                echo "<div class='alert alert-success alert-dismissable'>";
                echo "<a  class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
                echo "<strong>Success!</strong> Updated Successfully";
                echo "   <a href ='admin.php'>Go back</a>";
                echo "</div>";
            } catch (Exception $e) {
                echo "<div class='alert alert-danger alert-dismissable'>";
                echo "<a  class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
                echo "<strong>ERROR!</strong> {$e->getMessage()}</div>";
            }
        }

        $sql = "select * from user where Id=?";
        $result = $pdo->prepare($sql);
        $result->execute(array($_POST['sid']));
        $user = $result->fetch(PDO::FETCH_ASSOC);
        ?>


        <div>
            <form method="post">

                <div class="form-group">
                    <label class="control-label"> ID:</label>
                    <input readonly="readonly" type="text" name="sid" class="form-control" placeholder="User id" value="<?php echo $user['Id']; ?>">
                </div>
                <br />
                <div class="form-group">
                    <label class="control-label">First Name:</label>
                    <input type="text" name="sname" required class="form-control" value="<?php echo $user['First_Name']; ?>">
                </div>
                <br />
                <div class="form-group">
                    <label class="control-label">Last Name:</label>
                    <input type="text" name="s1name" required class="form-control" value="<?php echo $user['Last_Name']; ?>">
                </div>
                <br />
                <div class="form-group">
                    <label class="control-label"> Email:</label>
                    <input type="text" name="semail" class="form-control" value="<?php echo $user['email']; ?>">
                </div>
                <br />

                <div class="form-group">
                    <label class="control-label">password:</label>
                    <input type="password" name="spass" class="form-control" value="<?php echo $user['password']; ?>">
                </div>
                <br />


                <br />

                <div class="form-group">
                    <label for="gender">isAdmin:</label>
                    <select id="gender" name="isAdmin">
                        <option value="<?php echo $user['user_type']; ?>"><?php echo $user['user_type'] == 'user' ? "User" : "Admin" ?></option>
                        <option value="<?php echo $user['user_type'] == "user" ? "Admin" : "User"; ?>"><?php echo $user['user_type'] == "user" ? "Admin" : "User" ?></option>
                    </select>
                </div>
                <br />

                <div class="form-group">
                    <input type="submit" name="submit" value="Save">
                </div>
            </form>
        </div>




</body>

</html>