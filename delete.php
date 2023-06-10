<?php

require "connection.php";

if(isset($_POST['delete'])){
    $id = $_POST['del'];

    $sql = "DELETE FROM task_data WHERE id = '$id'";
    $conn->query($sql);

    echo"<script>alert('Deleted Successfully')</script>";
    echo"<script>window.location='index.php'</script>";
}

if(isset($_POST['cancel-del'])){
    header("location: index.php");
}

?>