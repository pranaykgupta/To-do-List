<?php 
	include 'connect.php';
	
		$data = $_POST['todo'];
				 
		  $checkRecord = mysqli_query($db,"SELECT * FROM `todos` WHERE data=".$data);
		  $totalrows = mysqli_num_rows($checkRecord);
		  if($totalrows > 0){
		    // Delete record
		    $query = "DELETE FROM todos WHERE data=".$data;
		    mysqli_query($db,$query);
		    
		  }
	
?>