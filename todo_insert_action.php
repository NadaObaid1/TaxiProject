<?php
session_start();
$_SESSION['items'] [] = [
    "title" => $_POST["title"],
    "description" => $_POST["description"],
    "status" => "todo" ,
    "created_at" =>date("y-m-d h:m:s")
    ];
 header ("Location:TODo.php");
?>