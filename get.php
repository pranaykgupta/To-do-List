<?php 
    include 'connect.php';
    $response = array();
    $message = array();
    $dummy = array();
    $sql = 'SELECT `id`,`data`,`complete` FROM `todos` WHERE 1';
    $result = mysqli_query($db,$sql);
    if(mysqli_num_rows($result) == 0){
        $message = 'No todos';
        $status = 400;
    }else{
        $status = 200;
        while($row = mysqli_fetch_array($result)){
            $dummy['data'] = stripcslashes($row['data']);
            $dummy['id'] = $row['id'];
            $dummy['complete'] = $row['complete'];
            $message[] = $dummy;
        }
    }
    $response['status'] = $status;
    $response['messages'] = $message;
    echo json_encode($response);

?>