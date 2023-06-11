<?php

require "connection.php";

// viewing data
$sql = "SELECT * FROM task_data";
$result = $conn->query($sql);

// delete function
$id = $_GET['id'];
$sql = "SELECT * FROM task_data WHERE id = '$id'";
$list = $conn->query($sql);
$rows = $list->fetch_assoc();

if(isset($_POST['delete'])){
    $id = $_POST['del'];

    $sql = "DELETE FROM task_data WHERE id = '$id'";
    $result = $conn->query($sql);

    echo"<script>alert('Deleted Successfully')</script>";
    echo"<script>window.location='index.php'</script>";
}

// cancel
if(isset($_POST['cancel-del'])){
    header("location: index.php");
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">

</head>
<body class="body">
    <h1 class="title">Task Management Web Application</h1><br><br>
    <button class="addBtn"><i class="fa fa-plus"></i> Add Task </button>&nbsp;&nbsp;
    <a href="export.php" type="button" class="expBtn"><i class="fa fa-file-export"></i> Export Data </a>&nbsp;

    <!-- delete form -->
    <form action="" method="post">
        <div class="delete-modal" id="delete-modal">
            <div class="delete-content">
                <h3>Are you sure you want to delete this data?</h3>
                <button type="submit" name="delete" id="erase">Yes</button>
                <button name="cancel-del" id="cancel-del">No</button>
                <input type="hidden" name="del" value="<?php echo $rows['id']?>">
            </div>
        </div>    
    </form>

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
                        <td><span><?php echo $rows['stats']?></span></td>
                        <td>
                            <form action="delete.php" method="post">
                                <a href=""><i class="fa fa-eye"></i>View</a>&nbsp;
                                <a href=""><i class="fa fa-trash"></i>Delete</a>
                            </form>
                        </td>
                    </tr>
                    <?php }
                } else {?>
                    <tr><td colspan="5">No Data Input</td></tr>
                <?php }
                ?>
        </tbody>
    </table><br><br>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="script.js"></script>
</body>
    <footer>
        <h4>By: Erykxon Bacasmo</h4>
        <div class="contact">
            <h5>For More Info:</h5>
            <a href="https://erykxon-bacasmo.github.io/my_Portfolio/"><i class="fa fa-globe" aria-hidden="true"></i>&nbsp;My Webpage</a>&nbsp; &nbsp;
            <p><i class="fa-solid fa-phone"></i>&nbsp;09663750139</p>        
        </div>
    </footer>
</html>