<?php 
	if($_SERVER["REQUEST_METHOD"] == "POST"){
	include 'connect.php';
	$response = array();
	$id = htmlentities($_POST['todo']);			 
	$checkRecord = mysqli_query($db,"SELECT `id` FROM `todos` WHERE id=".$id);
	$totalrows = mysqli_num_rows($checkRecord);
	if($totalrows > 0){
	// Delete record
	$query = "DELETE FROM todos WHERE `id`=".$id;
	if(mysqli_query($db,$query)){
		$message = "Deleted";
		$status = 200;
		}else{
			$status = 400;
			$message = "query failed";
		}
	}else{
		$status = 400;
		$message = "TOdo not found";
	}
	$response['status'] = $status;
	$response['message'] = $message;
	echo json_encode($response);
	}
	
?>