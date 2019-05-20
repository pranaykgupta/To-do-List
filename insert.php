<?php 
	include 'connect.php';

	if(isset($_POST['data'])){
		$data = $_POST['data'];
	
	$stmt = $db->prepare("INSERT INTO `todos` (`id`, `data`) VALUES (NULL, ?)");
	$stmt->bind_param('s',$data);
	$stmt->execute();
	$stmt->close();
}
	

?>