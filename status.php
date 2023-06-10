<?php

require "connection.php";

$id = $_GET['id'];

$sql = "UPDATE task_data SET stats = 'Completed' WHERE id = '$id'";
$conn->query($sql);

header("location: index.php");

?>