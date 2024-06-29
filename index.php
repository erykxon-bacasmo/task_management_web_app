<?php

require "connection.php";

$sql = "SELECT * FROM task_data";
$result = $conn->query($sql);

// add php function
if(isset($_POST['add'])){
    $title = $_POST['title'];
    $date = $_POST['date'];
    $todo = $_POST['todo'];

    $sql = "INSERT INTO task_data(`title`, `date`, `todo`, `stats`) VALUES('$title', '$date', '$todo', 'Not Complete')";
    $conn->query($sql);
    

    echo"<script>window.location='index.php'</script>";

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Management</title>
    <link rel="stylesheet" href="stylesheet.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'></link> 
</head>
<body class="body">
    <h1 class="title">Task Management Web Application</h1><br><br>
    <button class="addBtn" id="addBtn-modal"><i class="fa fa-plus"></i> Add Task </button>&nbsp;&nbsp;
    <a href="export.php" type="button" class="expBtn"><i class="fa fa-file-export"></i> Export Data </a>&nbsp;
    <!-- Add task pop-up -->
    <div class="modal" id="modal">
        <div class="add-content">
            <h2 class="h2">Add Task</h2><br><br>
            <form action="" method="post">
                <Label>Title:</Label>
                <input type="text" name="title" required><br><br>
                <Label>Date:</Label>
                <input type="date" name="date" required><br><br>
                <Label>Task:</Label>
                <textarea name="todo" required></textarea><br><br>
                <button type="submit" name="add" id="addBtn"><i class="fa fa-plus"></i> Add </button>
                <button id="cancel">Cancel</button>
            </form>
        </div>
    </div>
    <!-- data table -->
    <table id="example" class="table table-striped" style="width:80%; height:50%; margin: auto;">
        <thead>
            <tr>
                <th>Title</th>
                <th>Date</th>
                <th>Task</th>
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
                        <td><span><?php echo $rows['stats']?></span></td>
                        <td>
                            <a href="view.php?id= <?php echo $rows['id']?>"><i class="fa fa-eye"></i>View</a>&nbsp;
                            <a href="delete.php?id= <?php echo $rows['id']?>"><i class="fa fa-trash"></i>Delete</a>

                        </td>
                    </tr>
                    <?php }
                } else {?>
                    <tr><td colspan="5">No Data Input</td></tr>
                <?php }
                ?>
        </tbody>
    </table><br><br>
    <script>
        var addBtn = document.getElementById("addBtn");

        addBtn.onclick =function(){
            swal("Good job!", "You clicked the button!", "success");
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>    
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="script.js"></script>
</body>
    <!-- footer -->
    <footer>
        <h4>By: Erykxon Bacasmo</h4>
        <div class="contact">
            <h5>For More Info:</h5>
            <a href="https://erykxon-bacasmo.github.io/my_Portfolio/"><i class="fa fa-globe" aria-hidden="true"></i>&nbsp;My Webpage</a>&nbsp; &nbsp;
            <p><i class="fa-solid fa-phone"></i>&nbsp;09663750139</p>        
        </div>
    </footer>
</html>