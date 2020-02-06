<?php 
	if($_SERVER["REQUEST_METHOD"] == "POST"){
	include 'connect.php';
	$response = array();
	if(isset($_POST['data'])){
	$data = addslashes(htmlentities($_POST['data']));
	
	$sql = "INSERT INTO `todos` (`data`) VALUES ('$data')";
	if($data == ''){
		$response['status'] = 400;
		$response['message'] = "write something";
	}else{
		$result = mysqli_query($db,$sql);
	if($result){
		$response['status'] = 200;		
		$response['message'] = "To-do Added";
	}else{
		$response['status'] = 400;
		$response['message'] = "There was some problem in adding todo";
	}
	}
	
	echo json_encode($response);
	}
}
	

?>