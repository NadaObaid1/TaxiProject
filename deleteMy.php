<?php
session_start();
require_once("Class.Database.php");
$id = $_SESSION['id'];
Database::connect()->query("DELETE FROM user WHERE Id='$id'");
Database::disconnect();
header('location:logout.php');
