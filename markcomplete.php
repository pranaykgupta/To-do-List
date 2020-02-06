<?php 
	if($_SERVER["REQUEST_METHOD"] == "POST"){
	include 'connect.php';
	$response = array();
	if(isset($_POST['id'])){
    $id = htmlentities($_POST['id']);
    
    $sql1 = "SELECT `id`, `complete` FROM `todos` WHERE `id`= '$id'";
    $result = mysqli_query($db,$sql1);
    if(mysqli_num_rows($result)==1){
        $row = mysqli_fetch_array($result);
        if($row['complete'] == 0){
            $sql = "UPDATE `todos` SET `complete`=1 WHERE `id` = '$id'";
        }else{
            $sql = "UPDATE `todos` SET `complete`=0 WHERE `id` = '$id'";
        }
        $result = mysqli_query($db,$sql);
        if($result){
            $response['status'] = 200;
            $response['message'] = 'Done';
        }else{
            $response['status'] = 400;
            $response['message'] = 'Something wrong';
        }
    }else{
        $response['status'] = 400;
        $response['message'] = 'To Do NOt found';
    }
	echo json_encode($response);
	}
}
	

?>