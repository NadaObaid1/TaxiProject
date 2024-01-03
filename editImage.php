<?php


session_start();
require_once("Class.Tool.php");
if (!isset($_SESSION["admin_name"])) {
    header('location:loginPage.php');
}



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Image</title>

</head>
<style>
    body {
        display: flex;
        justify-content: center;
        align-items: center;
    }
</style>

<body>
    <?php
    require_once("Class.Tool.php");

    if (!empty($_POST['submit']) && $_POST['submit'] == 'Save') {
        $sID = $_POST['sid'];

        $file_name = $_FILES['photo']['name'];
        $tmp_file = $_FILES['photo']['tmp_name'];
        $ext = explode(".", $file_name);
        $extention = end($ext);
        $array_extention = array("png", "jpg", "jpeg", "PNG", "JPG", "JPEG");
        $target = "uploads/";

        if (!in_array($extention, $array_extention)) {
            Tools::printError('Extention not allow!!! just jpg or png or jpeg');
        }
        $file_name = $sID . "." . $extention;
        move_uploaded_file($tmp_file, $target . $file_name);
        $conn = Database::connect();

        try {
            $sql = "update user set img='$file_name' where Id='$sID'";
            $_SESSION["photo"] =  $file_name;
            $conn->query($sql);
            header("location:admin.php");
        } catch (Exception $e) {
            echo "<div class='alert alert-danger alert-dismissable'>";
            echo "<a  class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
            echo "<strong>ERROR!</strong> Error</div>";
        }
    }
    ?>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label class="control-label">ID:</label>
            <input readonly="readonly" type="text" name="sid" class="form-control" value=<?php echo $_POST["sid"]; ?>>
        </div>
        <br />
        <div class="form-group">
            <label for="formGroupExampleInput">Select image:</label>
            <input type="file" name="photo" required class="form-control" id="formGroupExampleInput" placeholder="Example input">
        </div>

        <div class="form-group">
            <input type="submit" name="submit" value="Save">
        </div>
    </form>

</body>

</html>