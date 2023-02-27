<?php
session_start();
$id = $_POST["item_id"];
$item = $_SESSION["items"]["todo"];
