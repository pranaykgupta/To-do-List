<!DOCTYPE html>
<html>
<head>
	<title>To Do List</title>

<link rel="stylesheet" type="text/css" href="assets/css/todo.css">
<link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script>
	$('document').ready(
		$.ajax({
			type: "GET",
			url: 'get.php',
			success: function(data){
				data = JSON.parse(data);
				if(data['status'] == 200){
					data['messages'].forEach( (item, index) => {
						let el = document.createElement('li');
						el.setAttribute('data-id',item['id']);
						el.id = item['id'];
						if(item['complete'] == 1){
							el.classList.add('completed');
							console.log('fjlds');
						}
						el.innerHTML = `<span><i class="fas fa-trash"></i> </span>${item['data']}`;
						$('#todos').append(el);
					});	
				}else if(data['status'] == 400){
					$('#msg').html(`<h3>${data['messages']}</h3>`)
				}
				
			}
		})
	);
</script>

</head>
<body>
<div id="container">
	<div id="msg"></div>
	<h1 style="border-radius:20px">TO-DO LIST<i class="fas fa-plus"></i></h1>
		<input type="text" id="new" placeholder="Add New Todo" name="data"> 
	
<ul id="todos">	
	<!-- <li><span><i class="fas fa-trash"></i> </span><?php echo "dflkd"; ?></li> -->

</ul>
</div>
<script type="text/javascript" src="assets/js/todo.js"></script>
</body>
</html>