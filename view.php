<?php

require "connection.php";

$sql = "SELECT * FROM task_data";
$result = $conn->query($sql);

// function for viewing individual data
$id = $_GET['id'];
$sql = "SELECT * FROM task_data WHERE id = '$id'";
$list = $conn->query($sql);
$rows = $list->fetch_assoc();

// function for clicking button complete
if(isset($_POST['check'])){
    $status = $_POST['stats'];
    
    if ($status == 'Completed'){ 
    ?>
        <script>
            alert("Already Completed");
            window.location= "index.php";
        </script>
    <?php }

}

// other function for clicking button
if(isset($_POST['complete'])){
    $id = $_POST['check'];

    $sql = "UPDATE task_data SET stats = 'Completed' WHERE id = '$id'";
    $result = $conn->query($sql);
    
    echo "<script>alert('Your Task Completed!')</script>";
    echo "<script>window.location='index.php'</script>";
}

// close
if(isset($_POST['close'])) {
    header("location: index.php");
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">

</head>
<body class="body">
    <h1 class="title">Task Management Web Application</h1><br><br>
    <div class="top-button">
        <button class="addBtn"><i class="fa fa-plus"></i> Add Task </button>&nbsp;&nbsp;
        <a href="export.php" type="button" class="expBtn"><i class="fa fa-file-export"></i> Export Data </a>&nbsp;
    </div>

    <!-- View pop uo modal -->
    <div class="view-modal" id="view-modal">
        <div class="view-content">
            <h2>Your Task</h2><br><br>
            <form action="" method="post">
                <Label>Title:</Label>
                <span><?php echo $rows['title']?></span><br><br>
                <Label>Date:</Label>
                <span><?php echo $rows['date']?></span><br><br>
                <Label>Task:</Label>
                <textarea  readonly><?php echo $rows['todo']?></textarea><br><br>
                <Label>Status:</Label>
                <input type="text" name="stats" value="<?php echo $rows['stats']?>" readonly><br><br>
                <button type="submit" name="complete"><i class="fa fa-check"></i>Complete</button>
                <input type="hidden" name="check" value="<?php echo $rows['id']?>">
                <button type="submit" name="close">Close</button>
                <!-- <a href="status.php?id= <?php echo $rows['id']?>" id="mark">Mark as Done</a>&nbsp; &nbsp;
                <a href="index.php">Close</a> -->
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