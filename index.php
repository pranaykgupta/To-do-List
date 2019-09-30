<!DOCTYPE html>
<html>
<head>
	<title>To Do List</title>

<link rel="stylesheet" type="text/css" href="assets/css/todo.css">
<link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>


</head>
<body>
<div id="container">
	<?php 
	include 'connect.php';
	?>
	<h1 style="border-radius:20px">TO-DO LIST<i class="fas fa-plus"></i></h1>
		<input type="text" placeholder="Add New Todo" name="data"> 
	
<ul>
	<?php 
		$stmt = $db->prepare("SELECT * FROM `todos`");
		$stmt->bind_result($id,$data);
		$stmt->execute();
		while($stmt->fetch()){
	?>
	<li><span><i class="fas fa-trash"></i> </span><?php echo $data; ?></li>

<?php } ?>
	
</ul>
</div>
<script type="text/javascript" src="assets/js/todo.js"></script>
</body>
</html>