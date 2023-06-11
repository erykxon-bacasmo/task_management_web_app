<?php

	require "connection.php";

	header("Content-Type: application/xls");    
	header("Content-Disposition: attachment; filename=Task Data.xls");  
	header("Pragma: no-cache"); 
	header("Expires: 0");
 
 
	$output = "";
 
	$output .="
		<table>
			<thead>
				<tr>
					<th>ID</th>
					<th>Title</th>
					<th>Date</th>
					<th>Task</th>
					<th>Status</th>
				</tr>
			<tbody>
	";
    
    $sql = "SELECT * FROM task_data";
    $result = $conn->query($sql);
	while($fetch = $result->fetch_array()){
 
	$output .= "
				<tr>
					<td>".$fetch['id']."</td>
					<td>".$fetch['title']."</td>
					<td>".$fetch['date']."</td>
					<td>".$fetch['todo']."</td>
					<td>".$fetch['stats']."</td>
				</tr>
	";
	}
 
	$output .="
			</tbody>
 
		</table>
	";
 
	echo $output;
 
 
?>
