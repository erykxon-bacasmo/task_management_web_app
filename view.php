<?php

require "connection.php";

$sql = "SELECT * FROM task_data";
$result = $conn->query($sql);

// function for viewing individual data
$id = $_GET['id'];
$sql = "SELECT * FROM task_data WHERE id = '$id'";
$list = $conn->query($sql);
$rows = $list->fetch_assoc();

// function for clicking button mark as done
if(isset($_POST['mark'])){

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task</title>
    <link rel="stylesheet" href="stylesheet.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">

</head>
<body class="body">
    <h1>Task Management Web Application</h1><br><br>
    <button class="addBtn">Add Task</button><br><br>
    <!-- View pop uo modal -->
    <div class="view-modal" id="view-modal">
        <div class="view-content">
            <h2>Your Task</h2><br><br>
            <form action="" method="post">
                <Label>Title:</Label>
                <span><?php echo $rows['title']?></span><br><br>
                <Label>Date:</Label>
                <span><?php echo $rows['date']?></span><br><br>
                <Label>To Do:</Label>
                <textarea  readonly><?php echo $rows['todo']?></textarea><br><br>
                <Label>Status:</Label>
                <span><?php echo $rows['stats']?></span><br><br>
                <a href="status.php?id= <?php echo $rows['id']?>">Mark as Done</a>&nbsp; &nbsp;
                <a href="index.php">Close</a>
            </form>
        </div>
    </div>   
    <table id="example" class="table table-striped" style="width:80%; margin: auto;">
        <thead>
            <tr>
                <th>Title</th>
                <th>Date</th>
                <th>To do</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
                if($data = $result->num_rows > 0){
                    while($rows = $result->fetch_assoc()){?>
                    <tr>
                        <td><span><?php echo $rows['title']?></span></td>
                        <td><span><?php echo $rows['date']?></span></td>
                        <td><span><?php echo $rows['todo']?></span></td>
                        <td></td>
                        <td>
                            <form action="delete.php" method="post">
                                <a href="view.php?id= <?php echo $rows['id']?>">View</a>&nbsp;    
                                <button type="submit" name="delete" id="erase">Delete</button>
                            </form>
                        </td>
                    </tr>
                    <?php }
                } else {?>
                    <tr><td colspan="5">No Data Input</td></tr>
                <?php }
                ?>
        </tbody>
    </table>

           
    <footer>
        <h4>By: Erykxon Bacasmo</h4>
    </footer>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="script.js"></script>
</body>
</html>