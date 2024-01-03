<?php

require_once("Class.Database.php");
$id = $_POST['sid'];
Database::connect()->query("DELETE FROM user WHERE Id='$id'");
Database::disconnect();
header('location:admin.php');
